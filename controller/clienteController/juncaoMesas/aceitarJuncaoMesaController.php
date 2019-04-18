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

$idPedido = $cliente->juntarMesas();

$carrinho->setIdPedido($idPedido);


echo "idPedido = $idPedido; ";
echo "Carrinho idPedido = ".$carrinho->getIdPedido();

$_SESSION["carrinho"] = serialize($carrinho);
