<?php
    class ValidarEmail extends Validador {
        
		public function __construct ($email) {
			$this->setEmail($email);
		}
        
        // $email2 = $this->getEmail();
        
        public function EnviarEmail() {
			$email = $this->getEmail();
			
            $assunto   = "Confirmação do seu cadastro."; #Variável para o assunto do E-mail.
            $mensagem = "
                <div style='width: 1000px;height:300px;background-color: rgb(255, 255, 255)'>
                <img rel='icon' src='www.sweetsalty.net.br/SweetSalty/food_premium/img/logo.png' type='image/x-icon' style='width: 150px;height: 80px;padding-left:475px'>
                <div style='width: 340px;height: 180px; background-color: white;margin-left: 380px'>
                    <p style='font-family: sans-serif;font-size:18px;text-align: center;color:rgb(41, 38, 38)'>Nova identificação na Sweetsalty</p>
                    <p style='font-family: sans-serif;font-size:14px;text-align: center;color:rgb(41, 38, 38)'>Para segurança adicional, por favor confirme esta identificação.</p>
                    <a href='www.google.com'
                        style='
                        border-radius:4px;
                        margin-left:27%;
                        cursor:pointer;
                        padding-top: 10px;
                        padding-bottom: 10px;
                        padding-right: 5px;
                        padding-left: 5px;
                        text-decoration:none;
                        background-color:#47E74E;
                        color:white;
                        font-family: sans-serif;
                        font-size:15px;
                        '>Confirma identificação
                    </a>
                </div>
            </div>
            ";
            $headers = "MIME-Version: 1.1\n";
            $headers .= "Content-type: text/html; charset=iso-8859-1\n";
            $headers .= "Reply-To: SweetSalty<suporte@sweetsalty.net.br>\n";
            $emailsender = "suporte@sweetsalty.net.br";
            $headers .= "X-Priority: 1\n";

            if(!mail($email, $assunto, $mensagem, $headers ,"-r".$emailsender)){ 
                return false;
            }else{
                $headers .= "Return-Path: " . $emailsender . $quebra_linha; 
                mail($email, $assunto, $mensagem, $headers );
                return true;
            }
        } //fim da função EnviarEmail   
    }//fim da classe validarEmail. 
?>