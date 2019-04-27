<?php

session_start();

include "../../../model/Usuario.class.php";
// Cliente
include "../../../model/Cliente/Cliente.class.php";
include "../../../model/Cliente/ClienteGoogleFacebook.class.php";
include "../../../model/Cliente/ClientePadrao.class.php";
include "../../../model/Cliente/Mesa.class.php";
include "../../../model/Cliente/JuntadorMesas.class.php";
include "../../../model/Cliente/Carrinho.class.php";

include "../../../model/Conexao.class.php";

$mesa = unserialize($_SESSION["mesa"]);
$juntadorMesas = unserialize($_SESSION["juntadorMesas"]);
$carrinho = unserialize($_SESSION["carrinho"]);

$mesaEscolhida = $_POST["mesa"];

if(!($mesa->getNumeroMesa() == $mesaEscolhida))
    $validado = $juntadorMesas->validarSolicitacao($mesaEscolhida, $mesa->getNumeroMesa(),$carrinho->getIdPedido());
else
    $validado = 0;

$_SESSION["juntadorMesas"] = serialize($juntadorMesas);

echo $validado;
