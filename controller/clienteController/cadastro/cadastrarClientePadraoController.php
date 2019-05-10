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


$informarcoes[0] = $_POST["email"];
$informarcoes[1] = $_POST["nome"];
$informarcoes[2] = $_POST['ddd'];
$informarcoes[3] = $_POST['numeroTel'];
$informarcoes[4] = $_POST["sexo"];
$informarcoes[5] = $_POST["dataNascimento"];
$informarcoes[6] = $_POST["senha"];
$informarcoes[7] = $_POST["confSenha"];

$email = $informarcoes[0];
$senha = $informarcoes[6];
$confirmarSenha = $informarcoes[7];


if($senha != $confirmarSenha)
	$mostrar = 0;
else{
	$cliente = new ClientePadrao;
	$mostrar = $cliente->cadastrar($informarcoes);

	if($mostrar == 3){
		$validarEmail = new ValidarEmail($email);
		$validarEmail->buscarToken();
					
		echo $validarEmail->EnviarEmail();
		$_SESSION["ValidarEmail"] = serialize($validarEmail);
		$_SESSION["email"] = $email;
		$_SESSION["senha"] = $senha;
	}else
		echo $mostrar;
}
