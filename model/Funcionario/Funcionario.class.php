<?php

abstract class Funcionario extends Usuario{
    private $cargo;
    private $cpf;
    private $rg;
    private $senha;

    abstract public function visualizarPedidos();

    public function cadastrarFuncionario($idUsuario, $nomeCompleto, $email, $cargo, $cpf, $rg, $telefone){
        
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
