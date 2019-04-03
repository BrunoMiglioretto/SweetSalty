<?php

class ClientePadrao extends Cliente{
    private $senha;

    public function cadastrar($informacoes){ // Informações == vetor
        $this->setEmail($informacoes[0]);
        if($this->getEmail() == false)
            return false;
        $this->setNomeCompleto($informacoes[1]);
        if($this->getNomeCompleto() == false)
            return false;
        $this->setDdd($informacoes[2]);
        if($this->getDdd() == false)
            return false;
        $this->setNumeroTelefone($informacoes[3]);
        if($this->getNumeroTelefone() == false)
            return false;
        $this->setSexo($informacoes[4]);
        if($this->getSexo() == false)
            return false;
        $this->setDataNascimento($informacoes[5]);
        if($this->getDataNascimento() == false)
            return false;
        $this->setSenha($informacoes[6]);
        if($this->getSenha() == false)
            return false;
        
        $conexao = new Conexao();
        $con = $conexao->conexao();
        
        $sql1 = "INSERT INTO tb_cadastro SET nome_completo = '".$this->getNomeCompleto()."', email = '".$this->getEmail()."'";
        $cliente = $con->prepare($sql1);
        $cliente->execute();
        
        $sql2 = "INSERT INTO tb_senha SET id_cadastro =  LAST_INSERT_ID(), senha = '".$this->getSenha()."', token = '".uniqid()."'";
        $cliente = $con->prepare($sql2);
        $cliente->execute();
        
        $sql3 = "INSERT INTO tb_cliente SET id_cadastro = LAST_INSERT_ID(), sexo = '".$this->getSexo()."', data_nascimento = '".$this->getDataNascimento()."'";
        $cliente = $con->prepare($sql3);
        $cliente->execute();
        
        $sql4 = "INSERT INTO tb_telefone SET id_cadastro = LAST_INSERT_ID(), ddd = ".$this->getDdd().", numero = '".$this->getNumeroTelefone()."'";
        $cliente = $con->prepare($sql4);
        $cliente->execute();
        
        echo "<br>Está no banco<br>";
    
        return true;
    }
    
    public function editarPerfil($informacoes){
        $cb = new ClientePadrao; // Cliente que irá servir de cobaia
        $cb->setEmail($informacoes[0]);
        if($cb->getEmail() == false)
            return false;
        $cb->setNomeCompleto($informacoes[1]);
        if($cb->getNomeCompleto() == false)
            return false;
        $cb->setDdd($informacoes[2]);
        if($cb->getDdd() == false)
            return false;
        $cb->setNumeroTelefone($informacoes[3]);
        if($cb->getNumeroTelefone() == false)
            return false;
        $cb->setSexo($informacoes[4]);
        if($cb->getSexo() == false)
            return false;
        $cb->setDataNascimento($informacoes[5]);
        if($cb->getDataNascimento() == false)
            return false;
        $cb->setSenha($informacoes[6]);
        if($cb->getSenha() == false)
            return false;

        return true;
        

    }

    public function renovarSenha($senha){
        
    }

    public function getSenha(){
        return $this->senha;
    }
    public function setSenha($senha){
        if(!(strlen($senha) <= 7))
            $this->senha = $senha;
    }
}
