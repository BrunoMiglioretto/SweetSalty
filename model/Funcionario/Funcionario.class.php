<?php

abstract class Funcionario extends Usuario{
    private $cargo;
    private $cpf;
    private $rg;
    private $senha;

    abstract public function visualizarPedidos();

    public function cadastrarFuncionario($informacoes){
        $this->setNomeCompleto($informacoes[0]);
        if($this->getNomeCompleto() == false)
            return 1;
        $this->setEmail($informacoes[1]);
        if($this->getEmail() == false)
            return 1;
        $this->setDdd($informacoes[3]);
        if($this->getDdd() == false)
            return 1;
        $this->setNumeroTelefone($informacoes[4]);
        if($this->getNumeroTelefone() == false)
            return 1;
        $this->setCargo($informacoes[2]);
        if($this->getCargo() == false)
            return 1;
        $this->setCpf($informacoes[6]);
        if($this->getCpf() == false)
            return 1;
        $this->setRg($informacoes[5]);
        if($this->getRg() == false)
            return 1;
        $this->setSenha($informacoes[7]);
        if($this->getSenha() == false)
            return 1;
        $this->setSenha(md5($informacoes[8]));

        $conexao = new Conexao;
        $con = $conexao->conexaoPDO();
        $verifEmail = "SELECT * FROM tb_cadastro WHERE email = '".$this->getEmail()."'";
        $funcionario = $con->prepare($verifEmail);
        $funcionario->execute();
        $contLinha = $funcionario->rowCount();
        if($contLinha > 0)
            return 2;
     
        $sql1 = "INSERT INTO tb_cadastro SET nome_completo = '".$this->getNomeCompleto()."', email = '".$this->getEmail()."'";
        $cliente = $con->prepare($sql1);
        $cliente->execute();
        
        $sql2 = "INSERT INTO tb_senha SET id_cadastro =  LAST_INSERT_ID(), senha = '".$this->getSenha()."', token = '".uniqid()."', validar_email = 1";
        $cliente = $con->prepare($sql2);
        $cliente->execute();
        
        $sql3 = "INSERT INTO tb_funcionario SET id_cadastro = LAST_INSERT_ID(), cargo = '".$this->getCargo()."', cpf = '".$this->getCpf()."', rg = '".$this->getRg()."'";
        $cliente = $con->prepare($sql3);
        $cliente->execute();
        
        $sql4 = "INSERT INTO tb_telefone SET id_cadastro = LAST_INSERT_ID(), ddd = '".$this->getDdd()."', numero = '".$this->getNumeroTelefone()."'";
        $cliente = $con->prepare($sql4);
        $cliente->execute();

        return 3;
    }

    public function editarPerfil($informacoes) {
        $fun = new Gerente;

        $fun->setIdUsuario($informacoes[9]);

        $fun->setNomeCompleto($informacoes[0]);
        if($fun->getNomeCompleto() == false)
            return 1;
        $fun->setEmail($informacoes[1]);
        if($fun->getEmail() == false)
            return 1;
        $fun->setDdd($informacoes[3]);
        if($fun->getDdd() == false)
            return 1;
        $fun->setNumeroTelefone($informacoes[4]);
        if($fun->getNumeroTelefone() == false)
            return 1;
        $fun->setCargo($informacoes[2]);
        if($fun->getCargo() == false)
            return 1;
        $fun->setCpf($informacoes[6]);
        if($fun->getCpf() == false)
            return 1;
        $fun->setRg($informacoes[5]);
        if($fun->getRg() == false)
            return 1;
        $fun->setSenha($informacoes[7]);
        if($fun->getSenha() == false)
            return 1;
        $fun->setSenha(md5($informacoes[8]));


        $conexao = new Conexao;
        $con = $conexao->conexaoPDO();

        $verifEmail = "SELECT * FROM tb_cadastro WHERE email = '".$fun->getEmail()."' AND id_cadastro != ".$fun->getIdUsuario();
        $funcionario = $con->prepare($verifEmail);
        $funcionario->execute();
        $contLinha = $funcionario->rowCount();
        if($contLinha > 0)
            return 2;
        
        $sql1 = "UPDATE tb_cadastro SET nome_completo = '".$fun->getNomeCompleto()."', email = '".$fun->getEmail()."' WHERE id_cadastro = ".$fun->getIdUsuario();
        $funcionario = $con->prepare($sql1);
        $funcionario->execute();
        
        $sql2 = "UPDATE tb_senha SET senha = '".$fun->getSenha()."' WHERE id_cadastro = ".$fun->getIdUsuario();
        $funcionario = $con->prepare($sql2);
        $funcionario->execute();
        
        $sql3 = "UPDATE tb_funcionario SET rg = '".$fun->getRg()."', cpf = '".$fun->getCpf()."', cargo = '".$fun->getCargo()."' WHERE id_cadastro =".$fun->getIdUsuario();
        $funcionario = $con->prepare($sql3);
        $funcionario->execute();
        
        $sql4 = "UPDATE tb_telefone SET ddd = ".$fun->getDdd().", numero = '".$fun->getNumeroTelefone()."' WHERE id_cadastro =".$fun->getIdUsuario();
        $funcionario = $con->prepare($sql4);
        $funcionario->execute();

        return $fun;
    }

    public function getCargo(){
        return $this->cargo;
    }
    public function getCpf(){
        return $this->cpf;
    }
    public function getRg(){
        return $this->rg;
    }
    public function getSenha(){
        return $this->senha;
    }
    public function setCargo($cargo){
        $this->cargo = $cargo;
    }
    public function setCpf($cpf){
        $this->cpf = $cpf;
    }
    public function setRg($rg){
        $this->rg = $rg;
    }
    public function setSenha($senha){
        $this->senha = $senha;
    }
} 
