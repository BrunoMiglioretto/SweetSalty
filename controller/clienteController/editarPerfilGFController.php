<?php

session_start();
include "verificacaoSessionClienteController.php";

include "../../model/Conexao.class.php";


$informacoes[0] = $_POST["email"];
$informacoes[1] = $_POST["nomeCompleto"];
$informacoes[2] = $_POST["ddd"];
$informacoes[3] = $_POST["numeroTel"];
$informacoes[4] = $_POST["sexo"];
$informacoes[5] = $_POST["dataNascimento"];

$validacao = $cliente->editarPerfil($informacoes);

if(!$validacao)
    echo "false";
else{
    $_SESSION["usuario"] = serialize($validacao);
    echo "true";
}