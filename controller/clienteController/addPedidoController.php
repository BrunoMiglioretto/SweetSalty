<?php

session_start();

include "verificacaoSessionClienteController.php";
if($v)
    header("Location: ../../view/logar.php");

include "../../model/Conexao.class.php";

//$idCardapio, $quant, $idCliente

$idCardapio = $_POST["idCardapio"];
$quant = $_POST["quant"];

$carrinho = unserialize($_SESSION["carrinho"]);

$carrinho->colocarPedido($idCardapio, $quant, $cliente->getIdUsuario());

echo "Completou";
