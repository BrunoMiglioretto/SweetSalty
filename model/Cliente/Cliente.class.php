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
            return 3;
        $sql2 = "SELECT count(*) AS tem FROM tb_mesa WHERE id_mesa = $mesaE AND id_cadastro !=".$this->getIdUsuario();
        $conexao = new Conexao;
        $con = $conexao->conexaoPDO();
        $mesaSolicitada = $con->prepare($sql2);
        $mesaSolicitada->execute();
        foreach($mesaSolicitada as $ms){}
        if($ms["tem"] == 1){
            $sql3 = "INSERT INTO tb_solicitacao_mesa SET id_cadastro_solicitante = ".$this->getIdUsuario().", id_mesa_solicitante = ".$this->getMesa().", id_mesa_solicitada = $mesaE, `status` = 0";
            $solicitarMesa = $con->prepare($sql3);
            $solicitarMesa->execute();
            return 1;
        }else
            return 2;
            
    }

    public function juntarMesas(){
        $sql1 = "SELECT id_mesa FROM tb_mesa WHERE id_cadastro =".$this->getIdUsuario();
        $conexao = new Conexao;
        $con = $conexao->conexaoPDO();
        $idMesa = $con->prepare($sql1);
        $idMesa->execute();
        foreach($idMesa as $idM){}

        $sql2 = "UPDATE tb_solicitacao_mesa SET `status` = 1 WHERE id_mesa_solicitada =".$idM["id_mesa"];
        $attSolicitacao = $con->prepare($sql2);
        $attSolicitacao->execute();

        $sql3 = "SELECT * FROM tb_solicitacao_mesa INNER JOIN tb_pedido 
                ON tb_solicitacao_mesa.id_cadastro_solicitante = tb_pedido.id_cadastro 
                WHERE tb_solicitacao_mesa.id_mesa_solicitada =".$idM["id_mesa"];
        $tbSolicitacao = $con->prepare($sql3);
        $tbSolicitacao->execute();

        foreach($tbSolicitacao as $tbs) {}

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
    
            $info[0] = 1;
            foreach($idP as $p){
                $info[1] = $p["id_pedido"];
            }
            return $info;
        }else{
            $sql3 = "SELECT id_pedido FROM tb_pedido WHERE id_cadastro =".$this->getIdUsuario();
            $idU = $con->prepare($sql3);
            $idU->execute();
            
            foreach($idU as $id){}
            $info[0] = 2;
            $info[1] = $id["id_pedido"];

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
