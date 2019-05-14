<?php

include "verificacaoSessionGarcomController.php";
include "../../model/Conexao.class.php";

$idCardapio = $_POST["idCardapio"];
$idPedido = $_POST["idPedido"];

$garcom->marcarPedidoEntregue($idPedido, $idCardapio);

