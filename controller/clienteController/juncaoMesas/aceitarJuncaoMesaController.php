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
$carrinho = unserialize($_SESSION["carrinho"]);

$idPedido = $cliente->juntarMesas($carrinho->getIdPedido());

echo $idPedido;

$carrinho->setIdPedido($idPedido);

$_SESSION["carrinho"] = serialize($carrinho);
