<?php
    abstract class Validador { //classe abstrata.
        private $nomeCompleto;
        private $email;
        private $token;
        private $senha;

        //funções.
        public function ValidadarSenha($senha, $confSenha) {
            if($senha == $confSenha) {
                $this->$setSenhaValidador($senha);
                return true;
            }
            else{
                return false;
            }   
        }

        abstract function EnviarEmail($email);

        public function ValidarToken() {
            // ...
        }

        public function ValidarEmailBD() {
            // ...
        }

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

        public function getEmail() {
            return $this-> $email;
        }
    }//fim da classe Validador.
?> 