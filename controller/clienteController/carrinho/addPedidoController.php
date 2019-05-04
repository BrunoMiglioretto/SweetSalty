<?php

session_start();

include "../../../model/Usuario.class.php";
// Cliente
include "../../../model/Cliente/Cliente.class.php";
include "../../../model/Cliente/ClienteGoogleFacebook.class.php";
include "../../../model/Cliente/ClientePadrao.class.php";
include "../../../model/Cliente/Carrinho.class.php";

include "../../../model/Conexao.class.php";

$cliente = unserialize($_SESSION["usuario"]);

$idCardapio = $_POST["idCardapio"];
$quant = $_POST["quant"];

$carrinho = unserialize($_SESSION["carrinho"]);

$itemColocado = $carrinho->colocarPedido($idCardapio, $quant);

if($itemColocado)
    echo "true";
