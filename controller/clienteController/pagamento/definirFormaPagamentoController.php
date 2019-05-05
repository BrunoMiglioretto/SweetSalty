<?php

session_start();

chdir("../");

include "verificacaoSessionClienteController.php";
include "../../model/Conexao.class.php";


$formaPagamento = $_POST["forma"];

$carrinho = unserialize($_SESSION["carrinho"]);

$carrinho->colocarPedidoHistorico();

$cliente->escolherPagamento($formaPagamento, $carrinho->getIdPedido());


