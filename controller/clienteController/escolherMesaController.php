<?php

session_start();

include "verificacaoSessionCliente.php";
include "../../model/Conexao.class.php";

$mesa = $_GET["m"];

$cliente->escolherMesa($mesa);

header('Location: ../../view/cliente/');
