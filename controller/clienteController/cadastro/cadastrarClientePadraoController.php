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
			alert('Ocorreu um erro, tente novamente.');
			window.location = '../../../view/cadastroCliente.php';
		</script>";
}else{
	
	echo "Cadastrado"; 

	// Se for inserido no banco, ele continua
	// Instancia a classe ValidarEmail que esta herdando da classe Validador que por sua vez é uma classe abstrata.
	
	$cliente2 = new ValidarEmail($email);
	
	$cliente2->buscarToken();
				  
	if(!$cliente2->EnviarEmail()){ 
		echo "
			<script>
				alert('Nao enviou');
			</script>";
	}else {// se retornar um e-mail, foi possivel enviar para o usuário.
		$_SESSION["ValidarEmail"] = serialize($cliente2);
		echo "
			<script>
				alert('enviamos um e-mail de confirmação, sertifique seu sua caixa de e-mails.');
				window.location = '../../../view/logar.php';
			</script>"; 
	}
}



