<?php

session_start();

chdir("../");

include "verificacaoSessionGerenteController.php";

include "../../model/Conexao.class.php";

$informarcoes[0] = $_POST["nome"];
$informarcoes[1] = $_POST["email"];
$informarcoes[2] = $_POST["ddd"];
$informarcoes[3] = $_POST["numeroTel"];
$informarcoes[4] = $_POST["sexo"];
$informarcoes[5] = $_POST["senha"];
$informarcoes[6] = $_POST["confSenha"];

$email = $informarcoes[1];
$senha = $informarcoes[5];
$confirmarSenha = $informarcoes[6];


if($senha != $confirmarSenha)
	$mostrar = 0;
else
	echo $gerente->cadastrarFuncionario($informarcoes);


