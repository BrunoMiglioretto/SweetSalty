<?php

session_start();

chdir("../");

include "verificacaoSessionGerenteController.php";

include "../../model/Conexao.class.php";

$informarcoes[0] = $_POST["nome"];
$informarcoes[1] = $_POST["email"];
$informarcoes[2] = $_POST["cargo"];
$informarcoes[3] = $_POST["ddd"];
$informarcoes[4] = $_POST["numeroTel"];
$informarcoes[5] = $_POST["rg"];
$informarcoes[6] = $_POST["cpf"];
$informarcoes[7] = $_POST["senha"];
$informarcoes[8] = $_POST["confSenha"];

$email = $informarcoes[1];
$senha = $informarcoes[7];
$confirmarSenha = $informarcoes[8];


if($senha != $confirmarSenha)
	$mostrar = 0;
else
	echo $gerente->cadastrarFuncionario($informarcoes);


