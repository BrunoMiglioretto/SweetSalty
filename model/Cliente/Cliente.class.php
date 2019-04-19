<?php

abstract class Cliente extends Usuario{
    private $sexo;
    private $dataNascimento;
    private $mesa;

    abstract public function editarPerfil($informacoes);
    
    public function escolherMesa($mesaE){
        $conexao = new Conexao;
        $con = $conexao->conexaoPDO();
        $sql1 = "SELECT count(*) AS total FROM tb_mesa WHERE id_mesa =".$mesaE." and id_cadastro !=".$this->getIdUsuario();
        $mesasUsadas = $con->prepare($sql1);
        $mesasUsadas->execute();
        foreach($mesasUsadas as $c){}
        if($c["total"] == 0){
            $sql2 = "SELECT count(*) AS cadastros FROM tb_mesa WHERE id_cadastro =".$this->getIdUsuario();
            $cadastros = $con->prepare($sql2);
            $cadastros->execute();
            foreach($cadastros as $cad)
            if($cad["cadastros"] != 0)
                $this->mudarMesa($mesaE);
            else{
                $sql3 = "INSERT INTO tb_mesa SET id_cadastro = ".$this->getIdUsuario().", id_mesa = $mesaE";
                $mesaEscolhida = $con->prepare($sql3);
                $mesaEscolhida->execute();
            }
            $this->setMesa($mesaE);
            return true;
        }else
            return false;
    }

    private function mudarMesa($mesaE){
        $sql = "UPDATE tb_mesa SET id_mesa = $mesaE WHERE id_cadastro =".$this->getIdUsuario();
        $conexao = new Conexao;
        $con = $conexao->conexaoPDO();
        $mudar = $con->prepare($sql);
        $mudar->execute();
    }

    public function verificarSolicitacaoMesa(){
        $sql1 = "SELECT id_mesa FROM tb_mesa WHERE id_cadastro = ".$this->getIdUsuario();
        $conexao = new Conexao;
        $con = $conexao->conexaoPDO();
        $idMesa = $con->prepare($sql1);
        $idMesa->execute();
        foreach($idMesa as $idM){}

        // Ver se ele já solicitou e está agradando a resposta
        $sql2 = "SELECT `status` FROM tb_solicitacao_mesa WHERE id_mesa_solicitante =".$idM["id_mesa"];
        $solicitador = $con->prepare($sql2);
        $solicitador->execute();

        if($solicitador->rowCount() == 0){
            // Ver se ele é quem está sendo solicitado
            $sql3 = "SELECT `status` FROM tb_solicitacao_mesa WHERE id_mesa_solicitada = ".$idM["id_mesa"];
            $solicitado = $con->prepare($sql3);
            $solicitado->execute();
            if($solicitado->rowCount() == 0)
                return 1;

            foreach($solicitado as $soli){}
            if($soli["status"] == 0)
                return 2;
            else
                return 4;
        }else{
            foreach($solicitador as $dor){}
            if($dor["status"] == 0)
                return 3;
            else
                return 4;
        }
    }

    public function solicitarJuncaoMesas($mesaE){
        if($mesaE == $this->getMesa())
            return 1;
        $sql2 = "SELECT count(*) AS tem FROM tb_mesa WHERE id_mesa = $mesaE AND id_cadastro !=".$this->getIdUsuario();
        $conexao = new Conexao;
        $con = $conexao->conexaoPDO();
        $mesaSolicitada = $con->prepare($sql2);
        $mesaSolicitada->execute();
        foreach($mesaSolicitada as $ms){}
        if($ms["tem"] == 1){
            // Pega o id_cadastro da mesa do cliente solicitado
            $sqlSolicitacao = " SELECT tb_pedido.id_cadastro FROM tb_pedido INNER JOIN tb_mesa ON
                                tb_pedido.id_cadastro = tb_mesa.id_cadastro 
                                WHERE tb_mesa.id_mesa = $mesaE";
            $solicitacao = $con->prepare($sqlSolicitacao);
            $solicitacao->execute();
            foreach($solicitacao as $s){
                $idCadastroSolicitado = $s["id_cadastro"];
            }
            
            // Verifica se tem algum pedido já enviado para cozinha, tanto do solicitante como o solicitado
            $sqlPedidosEnviados = " SELECT count(*) AS total FROM tb_alimento_pedido INNER JOIN tb_pedido ON 
                                    tb_alimento_pedido.id_pedido = tb_pedido.id_pedido WHERE (id_cadastro = $idCadastroSolicitado OR 
                                    id_cadastro = ".$this->getIdUsuario().") AND situacao > 1";
            $pedidosEnviados = $con->prepare($sqlPedidosEnviados);
            $pedidosEnviados->execute();
            foreach($pedidosEnviados as $pe){}
            
            if($pe["total"] != 0)
                return 3;
            
            $sql3 = "INSERT INTO tb_solicitacao_mesa SET id_cadastro_solicitante = ".$this->getIdUsuario().", id_mesa_solicitante = ".$this->getMesa().", id_mesa_solicitada = $mesaE, `status` = 0";
            $solicitarMesa = $con->prepare($sql3);
            $solicitarMesa->execute();
            return 4;
        }else
            return 2;
            
    }

    public function juntarMesas($idPedido){
        // Pega o id_mesa do cliente na mesa solicitada
        $sql1 = "SELECT id_mesa FROM tb_mesa WHERE id_cadastro =".$this->getIdUsuario();
        $conexao = new Conexao;
        $con = $conexao->conexaoPDO();
        $idMesa = $con->prepare($sql1);
        $idMesa->execute();
        foreach($idMesa as $idM){}

        // Atualiza o status da solicitação
        $sql2 = "UPDATE tb_solicitacao_mesa SET `status` = 1 WHERE id_mesa_solicitada =".$idM["id_mesa"];
        $attSolicitacao = $con->prepare($sql2);
        $attSolicitacao->execute();

        // Pega o id_pedido do cliente da mesa solicitada
        $sql3 = "SELECT id_pedido FROM tb_solicitacao_mesa INNER JOIN tb_pedido 
                ON tb_solicitacao_mesa.id_cadastro_solicitante = tb_pedido.id_cadastro 
                WHERE tb_solicitacao_mesa.id_mesa_solicitada =".$idM["id_mesa"];
        $tbSolicitacao = $con->prepare($sql3);
        $tbSolicitacao->execute();

        foreach($tbSolicitacao as $tbs) {}

        // -- Juntar itens do produto -- //
        
        // Pega itens da mesa solicitada
        $sqlItensMesaSolicitada = "SELECT id_cardapio, quant FROM tb_alimento_pedido WHERE id_pedido =".$idPedido;
        $itensMesaSolicitada = $con->prepare($sqlItensMesaSolicitada);
        $itensMesaSolicitada->execute();

        // Coloca no pedido da mesa solicitante os pedidos da mesa solicitada 
        foreach($itensMesaSolicitada as $item){
            // Verifica se tem algum item em ambos os pedidos
            $sqlVerificarItem = "SELECT quant FROM tb_alimento_pedido WHERE id_pedido =".$tbs["id_pedido"]." and id_cardapio =".$item["id_cardapio"];
            $totalItens = $con->prepare($sqlVerificarItem);
            $totalItens->execute();

            foreach($totalItens as $ti){}
            
            if($totalItens->rowCount() == 1){
                // Deleta o item do pedido do cliente da mesa solicitada
                $sqlDeletaPedido = "DELETE FROM tb_alimento_pedido WHERE id_pedido = $idPedido and id_cardapio =".$item["id_cardapio"];
                $deletaPedido = $con->prepare($sqlDeletaPedido);
                $deletaPedido->execute();

                // Atualiza a quantidade no pedido do solicitante
                $somaQuant = $ti["quant"] + $item["quant"];

                $sqlAttQuant = "UPDATE tb_alimento_pedido SET quant = $somaQuant WHERE id_pedido = ".$tbs["id_pedido"];
                $AttQuant = $con->prepare($sqlAttQuant);
                $AttQuant->execute();
            }else{
                // Troca o id do pedido do item do cliente solicitado para o id do pedido do cliente solicitante
                $sqlTrocaIdPedido = "UPDATE tb_alimento_pedido SET id_pedido =".$tbs["id_pedido"]." WHERE id_pedido = ".$idPedido;
                $trocaIdPedido = $con->prepare($sqlTrocaIdPedido);
                $trocaIdPedido->execute();
            }
        }

        $sql5 = "SELECT subtotal FROM tb_pedido WHERE id_pedido =".$tbs["id_pedido"];
        $subtotal1 = $con->prepare($sql5);
        $subtotal1->execute();

        foreach($subtotal1 as $sub1){}

        $sql6 = "SELECT subtotal FROM tb_pedido WHERE id_pedido =".$idPedido;
        $subtotal2 = $con->prepare($sql6);
        $subtotal2->execute();

        foreach($subtotal2 as $sub2){}

        $soma = $sub1["subtotal"] + $sub2["subtotal"];

        $sql7 = "UPDATE tb_pedido SET subtotal = $soma WHERE id_pedido = ".$tbs["id_pedido"];
        $valorPedido = $con->prepare($sql7);
        $valorPedido->execute();

        return $tbs["id_pedido"];
    }

    public function cancelarSolicitacao(){
        $sql = "DELETE FROM tb_solicitacao_mesa WHERE id_mesa_solicitante = ".$this->getMesa()." OR id_mesa_solicitada = ".$this->getMesa();
        $conexao = new Conexao;
        $con = $conexao->conexaoPDO();
        $cancelar = $con->prepare($sql);
        $cancelar->execute();
    }

    public function desfazerJuncaoMesas($idPedido){
        $sql1 = "SELECT * FROM tb_solicitacao_mesa WHERE id_mesa_solicitante =".$this->getMesa();
        $conexao = new Conexao;
        $con = $conexao->conexaoPDO();
        $situacao = $con->prepare($sql1);
        $situacao->execute();
        foreach($situacao as $solicitante){}
        
        $this->cancelarSolicitacao();

        // Situação 1 (Cliente que solicitou a junção)
        if($situacao->rowCount() == 1){
            $sql2 = "SELECT * FROM tb_mesa WHERE id_mesa =".$solicitante["id_mesa_solicitada"];
            $idSolicitado = $con->prepare($sql2);
            $idSolicitado->execute();
            
            foreach($idSolicitado as $idSo){
                $idS = $idSo["id_cadastro"]; // id do cliente solicitado
            }

            $sql3 = "SELECT id_pedido FROM tb_pedido WHERE id_cadastro = ".$idS;
            $idPedidoS = $con->prepare($sql3);
            $idPedidoS->execute();

            foreach($idPedidoS as $idPS){}

            // Deletar o pedido do solicitado
            $sql4 = "SELECT count(*) AS total FROM tb_alimento_pedido WHERE id_pedido = ".$idPS["id_pedido"];
            $alimentos = $con->prepare($sql4);
            $alimentos->execute();
            foreach($alimentos as $total){}
            if($total["total"] != 0){
                $sql5 = "DELETE FROM tb_alimento_pedido WHERE id_pedido =".$idPS["id_pedido"];
                $deleteA = $con->prepare($sql5);
                $deleteA->execute();
            }
            $sql6 = "DELETE FROM tb_pedido WHERE id_cadastro =".$idS;
            $deleteP = $con->prepare($sql6);
            $deleteP->execute();
            

            $sql7 = "UPDATE tb_pedido SET id_cadastro = $idS WHERE id_cadastro =".$this->getIdUsuario();
            $mudarPedido = $con->prepare($sql7);
            $mudarPedido->execute();

            // Cria um novo pedido para o solicitante
            date_default_timezone_set('America/Sao_Paulo');
			$hora = date("h:i");
			$data = date("Y-m-d");
			$sql8 = "INSERT INTO tb_pedido SET hora = '".$hora."', data_pedido = '".$data."', id_cadastro = ".$this->getIdUsuario().", subtotal = 0";
			$pedido = $con->prepare($sql8);
            $pedido->execute();
            
            $sql9 = "SELECT id_pedido FROM tb_pedido WHERE id_cadastro =".$this->getIdUsuario();
            $idP = $con->prepare($sql9);
            $idP->execute();
    
            foreach($idP as $p){
                $info = $p["id_pedido"];
            }
            return $info;
        }else{
            // -- Cliente que aceitou a junção -- //
            
            // Pega o id_pedido do cliente que aceitou a junção
            $sqlIdPedido = "SELECT id_pedido FROM tb_pedido WHERE id_cadastro =".$this->getIdUsuario();
            $idPedidoSolicitado = $con->prepare($sqlIdPedido);
            $idPedidoSolicitado->execute();
            foreach($idPedidoSolicitado as $ips){
                $idPedidoSo = $ips["id_pedido"];
            }

            // Deleta o pedido do cliente que aceitou a junção
            $sql4 = "SELECT count(*) AS total FROM tb_alimento_pedido WHERE id_pedido =".$idPedidoSo;
            $alimentos = $con->prepare($sql4);
            $alimentos->execute();
            foreach($alimentos as $total){}
            if($total["total"] != 0){
                $sql5 = "DELETE FROM tb_alimento_pedido WHERE id_pedido =".$idPedidoSo;
                $deleteA = $con->prepare($sql5);
                $deleteA->execute();
            }
            $sql6 = "DELETE FROM tb_pedido WHERE id_cadastro =".$this->getIdUsuario();
            $deleteP = $con->prepare($sql6);
            $deleteP->execute();

            // Cria um novo pedido para o solicitante
            date_default_timezone_set('America/Sao_Paulo');
			$hora = date("h:i");
			$data = date("Y-m-d");
			$sql8 = "INSERT INTO tb_pedido SET hora = '".$hora."', data_pedido = '".$data."', id_cadastro = ".$this->getIdUsuario().", subtotal = 0";
			$pedido = $con->prepare($sql8);
            $pedido->execute();
            
            $sql9 = "SELECT id_pedido FROM tb_pedido WHERE id_cadastro =".$this->getIdUsuario();
            $idP = $con->prepare($sql9);
            $idP->execute();

            foreach($idP as $p){
                $info = $p["id_pedido"];
            }
            return $info;
        }
    }

    public function pegarSolicitacao(){
        $sql = "SELECT * FROM tb_solicitacao_mesa INNER JOIN tb_cadastro 
                ON tb_solicitacao_mesa.id_cadastro_solicitante = tb_cadastro.id_cadastro
                WHERE id_mesa_solicitada = ".$this->getMesa()." OR id_mesa_solicitante = ".$this->getMesa();
        $conexao = new Conexao;
        $con = $conexao->conexaoPDO();
        $pegar = $con->prepare($sql);
        $pegar->execute();
        return $pegar;
    }

    public function escolherPagamento($forma){

    }
    public function fecharConta(){

    }

    public function desconectar(){
        $this->cancelarSolicitacao();
        $sql = "DELETE FROM tb_mesa WHERE id_cadastro =".$this->getIdUsuario();
        $conexao = new Conexao;
        $con = $conexao->conexaoPDO();
        $mesaE = $con->prepare($sql);
        $mesaE->execute();
    }

    public function getSexo(){
        return $this->sexo;
    }

    public function getDataNascimento(){
        return $this->dataNascimento;
    }
    
    public function setSexo($sexo){
        $this->sexo = $sexo;
    }

    public function setDataNascimento($dataNascimento){
        $this->dataNascimento = $dataNascimento;
    }

    public function getMesa(){
        return $this->mesa;
    }

    public function setMesa($mesa){
        $this->mesa = $mesa;
    }
} 
