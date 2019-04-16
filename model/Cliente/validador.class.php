<?php
    abstract class Validador { //classe abstrata.
        private $nomeCompleto;
        private $email;
        private $token;
        private $senha;

        //funções.
        abstract function EnviarEmail(); //tenta enviar o e-mail;

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

        public function buscarToken(){ // Busca o token no banco para consulta;
            $conexao = new Conexao;
            $con = $conexao->conexaoPDO();
            $sql = "SELECT token FROM tb_senha INNER JOIN tb_cadastro ON tb_cadastro.id_cadastro = tb_senha.id_cadastro";
            $cliente = $con->prepare($slq);
            $cliente->execute();
            $this->setSenhaValidador($cliente); // adiciona no atributo token.
        }

    }//fim da classe Validador.
?> 