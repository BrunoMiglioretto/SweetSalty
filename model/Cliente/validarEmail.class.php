<?php
    class ValidarEmail extends Validador {
        
		public function __construct ($email) {
			$this->setEmail($email);
        }
        
        public function ValidarToken($token) { // Método para verificar o token, autenticidade dos dados;
            $conexao = new Conexao;
            $con = $conexao->conexaoPDO();
            $sql = "SELECT * FROM tb_senha WHERE token = '$token'"; // verifica o token da url com o do bd;
            $cliente = $con->prepare($sql);
            $cliente->execute();
            $contLinha = $cliente->rowCount(); //verifica se existe um igual;
            foreach($cliente as $valores){
                $id = $valores['id_cadastro'];
            }

            if($contLinha == 1){
                $sql2 = "UPDATE tb_senha SET validar_email = '1' WHERE id_cadastro = '".$id."'"; //atualiza o valida_email para 1, ou seja, já foi confirmado o token.
                $cliente = $con->prepare($sql2);
                $cliente->execute();
                return true;
            } else {
                return false;
            }
        }
        
        public function buscarToken(){
            $conexao = new Conexao;
            $con = $conexao->conexaoPDO();
            $sql = "SELECT token FROM tb_senha INNER JOIN tb_cadastro ON tb_cadastro.id_cadastro = tb_senha.id_cadastro";
            $cliente = $con->prepare($sql);
            $cliente->execute();
            foreach($cliente as $valor){
                $token = $valor['token'];
            }
            $this->setTokenValidador($token); // adiciona no atributo token.
        }
        
        //pega o token;
        
        public function EnviarEmail() {
			$email = $this->getEmail();
			$tokenUrl = $this->getToken();
            
            $assunto   = "Confirmação do seu cadastro."; #Variável para o assunto do E-mail.
            $mensagem = "
                <div style='width: 1000px;height:300px;background-color: rgb(255, 255, 255)'>
                <img src='www.sweetsalty.net.br/view/img/logo.png'style='width: 150px;height: 80px;padding-left:250px'>
                <div style='width: 340px;height: 180px; background-color: white;margin-left: 155px'>
                    <p style='font-family: sans-serif;font-size:18px;text-align: center;color:rgb(41, 38, 38)'>Confirmação de e-mail</p>
                    <p style='font-family: sans-serif;font-size:14px;text-align: center;color:rgb(41, 38, 38)'>Para segurança adicional, por favor confirme esta identificação.</p>
                    <a href='www.sweetsalty.net.br/controller/confirmaTokenController.php?token=$tokenUrl&email=$email'
                        style='
                        border-radius:4px;
                        margin-left:27%;
                        cursor:pointer;
                        padding-top: 10px;
                        padding-bottom: 10px;
                        padding-right: 5px;
                        padding-left: 5px;
                        text-decoration:none;
                        background-color:#71A140;
                        color:white;
                        font-family: sans-serif;
                        font-size:15px;
                        '>Confirmar identificação
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
                return 4;
            }else{
                $headers .= "Return-Path: " . $emailsender . $quebra_linha; 
                mail($email, $assunto, $mensagem, $headers );
                return 5;
            }
        }  
    }
?>