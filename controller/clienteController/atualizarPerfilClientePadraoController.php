<?php

session_start();

include "../model/Usuario.class.php";
// Cliente
include "../model/Cliente/Cliente.class.php";
include "../model/Cliente/ClientePadrao.class.php";
// Factory
include "../model/Factory/UsuarioFactory.class.php";
include "../model/Factory/ClienteFactory.class.php";
// Login
include "../model/Login/Login.class.php";
include "../model/Login/LoginPadrao.class.php";

include "../model/Conexao.class.php";

$nomeCompleto = $_POST["nomeCompleto"];
$email = $_POST["email"];
$sexo = $_POST["sexo"];
$numeroTelefone = $_POST["numeroTelefone"];
$dataNascimento = $_POST["dataNascimento"];
$senha = $_POST["senha"];
$confSenha = $_POST["confSenha"];

if($senha != $confSenha){
		echo "
		<script>
			alert('Insira senhas iguais');
			window.location = '../../food_premium/Cliente/perfilCliente.php';
		</script>";
}else{
	$clienteTemporario = new ClientePadrao;
	$clienteTemporario->setNomeCompleto($nomeCompleto);
	$clienteTemporario->setEmail($email);
	if($clienteTemporario->getEmail() == false)
		echo $clienteTemporario->getEmail()." Não tem email";
	else
		echo $clienteTemporario->getEmail()." tem email";
		
		
		
	$clienteTemporario->setSexo($sexo);
	$clienteTemporario->setNumeroTelefone($numeroTelefone);
	$clienteTemporario->setSenha($senha);
	
	
}


