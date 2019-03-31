<?php

class ClienteGoogleFacebook extends Cliente{
    
    public function cadastrar($informacoes){
        foreach($informacoes as $carrega){
            $this->setEmail($carrega["email"]);
            $this->setNomeCompleto($carrega["nomeCompleto"]);
            $this->setDdd($carrega["ddd"]);
            $this->setNumeroTelefone($carrega["numero"]);
            $this->setSexo($carrega["sexo"]);
            $this->setDataNascimento($carrega["dataNascimento"]);
        }
    }
    
    public function atualizarPerfil($cliente){
        
    }
}
