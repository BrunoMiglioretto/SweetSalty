<?php

include "../../model/Conexao.class.php";

$idCardapio = $_POST["idCardapio"];
$idPedido = $_POST["idPedido"];

$queryAttSituacao = "UPDATE tb_alimento_pedido SET situacao = 3 WHERE id_cardapio = $idCardapio AND id_pedido = $idPedido";
$conexao = new Conexao;
$con = $conexao->conexaoPDO();
$attSituacao = $con->prepare($queryAttSituacao);
$attSituacao->execute();
