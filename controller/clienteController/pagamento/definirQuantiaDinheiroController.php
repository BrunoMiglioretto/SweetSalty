<?php

session_start();

chdir("../");

include "verificacaoSessionClienteController.php";
include "../../model/Conexao.class.php";

$quantia = $_POST["quantia"];

$carrinho = unserialize($_SESSION["carrinho"]);

$validado = $cliente->definirQuantiaDinheiro($quantia, $carrinho->getIdPedido());

echo $validado;

