<!DOCTYPE html>
<html>
	<head>
		<link rel='stylesheet' href='../../../view/alertifyjs/css/alertify.min.css'>
		<link rel='stylesheet' href='../../../view/alertifyjs/css/themes/bootstrap.css'>
		<script type='text/javascript' src='../../../view/alertifyjs/alertify.min.js'></script>
		<script type="text/javascript" src="http://code.jquery.com/jquery-1.4.3.min.js"></script>	
	</head>
</html>
<?php

session_start();

include "../../../model/Usuario.class.php";
// Cliente
include "../../../model/Cliente/Cliente.class.php";
include "../../../model/Cliente/ClienteGoogleFacebook.class.php";
include "../../../model/Cliente/ClientePadrao.class.php";
include "../../../model/Cliente/validador.class.php";
include "../../../model/Cliente/validarEmail.class.php";

include "../../../model/Conexao.class.php";

// Pega todos os dados do formulario

$informarcoes[0] = $_POST["email"];
$informarcoes[1] = $_POST["nome"];
$informarcoes[2] = 41;
$informarcoes[3] = $_POST["numeroTelefone"];
$informarcoes[4] = $_POST["sexo"];
$informarcoes[5] = $_POST["dataNascimento"];
$informarcoes[6] = $_POST["senha"];
$informarcoes[7] = $_POST["confSenha"];
$email 			 = $informarcoes[0];


$cliente = new ClientePadrao;
if(!$cliente->cadastrar($informarcoes)){ // Retorna False se algum dado estiver errado
	echo "
		<script>
			alertify.alert('Ocorreu um erro, tente novamente.',function(){window.location = '../../../view/CadastroCliente.php';})
		</script>";
}else{
	
	echo "Cadastrado"; 

	// Se for inserido no banco, ele continua
	// Instancia a classe ValidarEmail que esta herdando da classe Validador que por sua vez é uma classe abstrata.
	
	$cliente2 = new ValidarEmail($email);
				  
	if(!$cliente2->EnviarEmail()){ 
		echo "
			<script>
				alertify.alert('Ocorreu um erro, tente novamente.',function(){
					window.location = '../../../view/CadastroCliente.php';})
			</script>";
	}else {// se retornar um e-mail, foi possivel enviar para o usuário.
		echo "
			<script>
				alertify.alert('enviamos um e-mail de confirmação, sertifique seu sua caixa de e-mails.),function(){
					window.location ='../../../view/logar.php';})	
			</script>"; 
	}
}



