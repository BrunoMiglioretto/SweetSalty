<?php

class ClientePadrao extends Cliente{
    private $senha;
    private $confSenha;

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
        $this->setConfSenha($informacoes[7]);
        if($this->getConfirmaSenha() != $this->getSenha()){
            return false;
        }
        $this->encriptSenha($informacoes[6]);

        $conexao = new Conexao;
        $con = $conexao->conexaoPDO();
        $verifEmail = "SELECT * FROM tb_cadastro WHERE  email = '".$this->getEmail()."'";
        $cliente = $con->prepare($verifEmail);
        $cliente->execute();
        $contLinha = $cliente->rowCount();
        if($contLinha > 0)
            return false;
     
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
        
        echo "<br>Return true<br>";
    
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
        

        $conexao = new Conexao;
        $con = $conexao->conexaoPDO();
        
        $sql1 = "UPDATE tb_cadastro SET nome_completo = '".$cb->getNomeCompleto()."', email = '".$cb->getEmail()."' WHERE id_cadastro = ".$this->getIdUsuario();
        $cliente = $con->prepare($sql1);
        $cliente->execute();
        
        $sql2 = "UPDATE tb_senha SET senha = '".$cb->getSenha()."' WHERE id_cadastro = ".$this->getIdUsuario();
        $cliente = $con->prepare($sql2);
        $cliente->execute();
        
        $sql3 = "UPDATE tb_cliente SET sexo = '".$cb->getSexo()."', data_nascimento = '".$cb->getDataNascimento()."' WHERE id_cadastro =".$this->getIdUsuario();
        $cliente = $con->prepare($sql3);
        $cliente->execute();
        
        $sql4 = "UPDATE tb_telefone SET ddd = ".$cb->getDdd().", numero = '".$cb->getNumeroTelefone()."' WHERE id_cadastro =".$this->getIdUsuario();
        $cliente = $con->prepare($sql4);
        $cliente->execute();

        $cb->setIdUsuario($this->getIdUsuario());

        return $cb;
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
    public function getConfirmaSenha(){
        return $this->confSenha;
    }
    public function setConfSenha($confirmaSenha){
        $this->confSenha = $confirmaSenha;
    }
    public function encriptSenha($senha){
        $cript = md5($senha);
        $this->setSenha($cript);
    }
}
