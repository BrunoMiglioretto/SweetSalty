<?php

session_start();

include "verificacaoSessionClienteController.php";
if($v)
    header("Location: ../../view/logar.php");

include "../../model/Conexao.class.php";

$mesa = $_GET["m"];

$cliente->escolherMesa($mesa);

header('Location: ../../view/cliente/');
