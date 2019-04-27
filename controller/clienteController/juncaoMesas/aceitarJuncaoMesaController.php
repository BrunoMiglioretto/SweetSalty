<?php

session_start();

include "../../../model/Usuario.class.php";
// Cliente
include "../../../model/Cliente/Cliente.class.php";
include "../../../model/Cliente/ClienteGoogleFacebook.class.php";
include "../../../model/Cliente/ClientePadrao.class.php";
include "../../../model/Cliente/JuntadorMesas.class.php";
include "../../../model/Cliente/Carrinho.class.php";

include "../../../model/Conexao.class.php";

$juntadorMesas = unserialize($_SESSION["juntadorMesas"]);
$carrinho = unserialize($_SESSION["carrinho"]);

$idPedido = $juntadorMesas->juntarMesas();

$carrinho->setIdPedido($idPedido);

$_SESSION["carrinho"] = serialize($carrinho);
