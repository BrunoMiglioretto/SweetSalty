<?php

abstract class Cliente extends Usuario{
    private $sexo;
    private $dataNascimento;

    abstract public function editarPerfil($informacoes);
    
    public function escolherMesa($mesa){
        $sql = "INSERT INTO tb_mesa SET id_cadastro = ".$this->getIdUsuario().", id_mesa = $mesa";
        $conexao = new Conexao;
        $con = $conexao->conexaoPDO();
        $mesa = $con->prepare($sql);
        $mesa->execute();
        $con = NULL;
    }
    public function escolherPagamento($forma){

    }
    public function fecharConta(){

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
