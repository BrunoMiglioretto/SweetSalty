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
