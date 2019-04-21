<?php

abstract class Cliente extends Usuario{
    private $sexo;
    private $dataNascimento;

    abstract public function editarPerfil($informacoes);

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

    public function escolherPagamento($forma){

    }
    public function fecharConta(){

    }

    public function sair(){
        
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

} 
