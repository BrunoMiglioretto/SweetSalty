<?php

include "verificacaoSessionCozinheiroController.php";
include "../../model/Conexao.class.php";

$idCardapio = $_POST["idCardapio"];
$idPedido = $_POST["idPedido"];

$cozinheiro->concluirPedido($idPedido, $idCardapio);

