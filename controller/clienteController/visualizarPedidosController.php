<?php

include "../../model/Conexao.class.php";

$carrinho = unserialize($_SESSION["carrinho"]);

$idCliente = $cliente->getIdUsuario();

$pedidos = $carrinho->visualizarPedidos($idCliente);
$subtotal = $carrinho->pegarSubtotal($idCliente);
