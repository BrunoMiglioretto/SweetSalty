<?php

abstract class Cliente extends Usuario{
    private $sexo;
    private $dataNascimento;

    abstract public function editarPerfil($informacoes);
    
    public function escolherMesa($mesa){
        $conexao = new Conexao;
        $con = $conexao->conexaoPDO();
        $sql1 = "SELECT count(*) AS total FROM tb_mesa WHERE id_mesa =".$mesa." and id_cadastro !=".$this->getIdUsuario();
        $mesasUsadas = $con->prepare($sql1);
        $mesasUsadas->execute();
        foreach($mesasUsadas as $c){}
        if($c["total"] == 0){
            $sql2 = "SELECT count(*) AS cadastros FROM tb_mesa WHERE id_cadastro =".$this->getIdUsuario();
            $cadastros = $con->prepare($sql2);
            $cadastros->execute();
            foreach($cadastros as $cad)
            if($cad["cadastros"] != 0)
                $this->mudarMesa($mesa);
            else{
                $sql3 = "INSERT INTO tb_mesa SET id_cadastro = ".$this->getIdUsuario().", id_mesa = $mesa";
                $mesaEscolhida = $con->prepare($sql3);
                $mesaEscolhida->execute();
            }
            return true;
        }else
            return false;
    }

    private function mudarMesa($mesa){
        $sql = "UPDATE tb_mesa SET id_mesa = $mesa WHERE id_cadastro =".$this->getIdUsuario();
        $conexao = new Conexao;
        $con = $conexao->conexaoPDO();
        $mudar = $con->prepare($sql);
        $mudar->execute();
    }

    public function escolherPagamento($forma){

    }
    public function fecharConta(){

    }

    public function desconectar(){
        $sql = "DELETE FROM tb_mesa WHERE id_cadastro =".$this->getIdUsuario();
        $conexao = new Conexao;
        $con = $conexao->conexaoPDO();
        $mesa = $con->prepare($sql);
        $mesa->execute();
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
