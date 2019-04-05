<?php
    abstract class Validador() { //classe abstrata.
        //atributos da classe.
        private $nomeCompleto,
        private $email,
        private $token,
        private $senha

        //funções.
        public function ValidadarSenha($senha, $confSenha) {
            if($senha == $confSenha)
                $this->$setSenhaValidador($senha);
                return true;
            else    
                return false;
        }

        public function EnviarEmail($email) {
            //recebe o e-mail informado
            $assunto   = "Confirmação do seu cadastro."; #Variável para o assunto do E-mail.
  	        $mensagem = "
  				<div style='width: 1000px;height:300px;background-color: rgb(255, 255, 255)'>
					<img rel='icon' src='food_premium/img/logo.png' type='image/x-icon' style='width: 150px;height: 80px;padding-left:475px'>
					<div style='width: 340px;height: 180px; background-color: white;margin-left: 380px'>
						<p style='font-family: sans-serif;font-size:18px;text-align: center;color:rgb(41, 38, 38)'>Nova identificação na Sweetsalty</p>
						<p style='font-family: sans-serif;font-size:14px;text-align: center;color:rgb(41, 38, 38)'>Para segurança adicional, por favor confirme esta identificação.</p>
						<button 
							style='width: 220px;height: 50px;text-align: center;margin-left:
							 60px;margin-top:10px;border:none;border-radius:4px;font-size:16px;
							 color:white;background-color:rgba(0, 255, 76, 0.774);cursor:pointer'>Confirma identificação
						</button>
					</div>
				</div>
  	        ";
            $headers = "MIME-Version: 1.1\n";
            $headers .= "Content-type: text/html; charset=iso-8859-1\n";
            $headers .= "Reply-To: SweetSalty<suporte@sweetsalty.net.br>\n";
            $emailsender = "suporte@sweetsalty.net.br";
            $headers .= "X-Priority: 1\n";
            
            if(!mail($email, $assunto, $mensagem, $headers ,"-r".$emailsender)){ 
                $this->setEmail('false'); // se não conseguir enviar o e-mail.
            }else{
                $headers .= "Return-Path: " . $emailsender . $quebra_linha; 
                mail($email, $assunto, $mensagem, $headers );
                $this->setEmail($email); // se conseguir enviar o e-mail.
            }
        }

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
            return $email;
        }
    }//fim da classe Validador.
?> 