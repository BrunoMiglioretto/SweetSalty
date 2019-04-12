<?php

session_start();

include "../../../model/Usuario.class.php";
// Cliente
include "../../../model/Cliente/Cliente.class.php";
include "../../../model/Cliente/ClienteGoogleFacebook.class.php";
include "../../../model/Cliente/ClientePadrao.class.php";
include "../../../model/Cliente/Carrinho.class.php";

include "../../../model/Conexao.class.php";

$idCardapio = $_POST["idCardapio"];
$idPedido = $_POST["idPedido"];

$carrinho = unserialize($_SESSION["carrinho"]);

$carrinho->excluirPedido($idCardapio, $idPedido);

