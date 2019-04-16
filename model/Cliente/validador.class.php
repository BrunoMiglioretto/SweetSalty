<?php
    abstract class Validador { //classe abstrata.
        private $nomeCompleto;
        private $email;
        private $token;
        private $senha;
        // private $tokenUrl;

        //funções.
        abstract function EnviarEmail(); //tenta enviar o e-mail;

        abstract function buscarToken();
        //Métodos modificadores
        public function setSenhaValidador($senha) {
            $this->senha = $senha;
        } 
        
        public function setTokenValidador($token) {
            $this->token = $token;
        }

        public function setNomeCompleto($nomeCompleto) {
            $this->nomeCompleto = $nomeCompleto;
        }

        public function setEmail($email) {
            $this->email = $email;
        }

        public function getToken(){
            return $this->token;
        }

        public function getEmail() {
            return $this->email;
        }


    }//fim da classe Validador.
?> 