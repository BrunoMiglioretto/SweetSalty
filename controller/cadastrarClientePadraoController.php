<?php

session_start();

include "../model/Usuario.class.php";
// Cliente
include "../model/Cliente/Cliente.class.php";
include "../model/Cliente/ClienteGoogleFacebook.class.php";
include "../model/Cliente/ClientePadrao.class.php";

include "../model/Conexao.class.php";

// Pega todos os dados do formulario

$informarcoes[0] = $_POST["email"];
$informarcoes[1] = $_POST["nome"];
$informarcoes[2] = 41;
$informarcoes[3] = $_POST["numeroTelefone"];
$informarcoes[4] = $_POST["sexo"];
$informarcoes[5] = $_POST["dataNascimento"];
$informarcoes[6] = $_POST["senha"];
$informarcoes[7] = $_POST["confSenha"];


$cliente = new ClientePadrao;
if(!$cliente->cadastrar($informarcoes)){ // Retorna False se algum dado estiver errado
	echo "
		<script>
			alert('Algum dado está errado');
			window.location = '../view/cadastro_cliente.php';
		</script>";
} 

// Se for inserido no banco, ele continua
echo "Cadastrado";