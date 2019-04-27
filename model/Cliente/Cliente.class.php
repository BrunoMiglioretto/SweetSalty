<?php

abstract class Cliente extends Usuario{
    private $sexo;
    private $dataNascimento;

    abstract public function editarPerfil($informacoes);

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
