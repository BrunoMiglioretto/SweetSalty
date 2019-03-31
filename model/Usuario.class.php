<?php

abstract class Usuario{
    private $idUsuario;
    private $nomeCompleto;
    private $email;
    private $ddd;
    private $numeroTelefone;

    public function sair(){
        session_destroy();
        echo "
        <script>
          function signOut() {
            var auth2 = gapi.auth2.getAuthInstance();
            auth2.signOut().then(function () {
              console.log('User signed out.');
            });
          }
        </script>
        ";
    }

    public function getIdUsuario(){
        return $this->idUsuario;
    }
    
    public function getNomeCompleto(){
        return $this->nomeCompleto;
    }
    
    public function getEmail(){
        return $this->email;
    }
    
    public function getDdd(){
        return $this->ddd;
    }
    
    public function getNumeroTelefone(){
        return $this->numeroTelefone;
    }
    

    public function setIdUsuario($idUsuario){
        $this->idUsuario = $idUsuario;
    }
    
    public function setNomeCompleto($nomeCompleto){
        $this->nomeCompleto = $nomeCompleto;
    }
    
    public function setEmail($email){
        $this->email = filter_var($email, FILTER_VALIDATE_EMAIL);
    }
    
    public function setDdd($ddd){
        $this->ddd = $ddd;
    }
    
    public function setNumeroTelefone($numeroTelefone){
        $this->numeroTelefone = $numeroTelefone;
    }
}
