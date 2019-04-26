<?php

abstract class Cliente extends Usuario{
    private $sexo;
    private $dataNascimento;

    abstract public function editarPerfil($informacoes);

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
