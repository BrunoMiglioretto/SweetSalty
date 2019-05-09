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

$mostar;

// Pega todos os dados do formulario

$informarcoes[0] = $_POST["email"];
$informarcoes[1] = $_POST["nome"];
$informarcoes[2] = $_POST['ddd'];
$informarcoes[3] = $_POST['numeroTel'];
$informarcoes[4] = $_POST["sexo"];
$informarcoes[5] = $_POST["dataNascimento"];
$informarcoes[6] = $_POST["senha"];
$informarcoes[7] = $_POST["confSenha"];
$email 			 = $informarcoes[0];

$senha = $informarcoes[6];
$confirmarSenha = $informarcoes[7];


if($senha != $confirmarSenha)
	$mostrar = 0;
else{
	print_r($informarcoes);

}


// $cliente = new ClientePadrao; // Retorna False se algum dado estiver errado

// $validado = $cliente->cadastrar($informarcoes);

// if(){

// }else{
// 	// Se for inserido no banco, ele continua
// 	// Instancia a classe ValidarEmail que esta herdando da classe Validador que por sua vez é uma classe abstrata.
// 	$cliente2 = new ValidarEmail($email);
// 	$cliente2->buscarToken();
				  
// 	echo $cliente2->EnviarEmail();
// 	$_SESSION["ValidarEmail"] = serialize($cliente2);
// }



