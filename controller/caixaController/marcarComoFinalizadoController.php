<?php

include "verificacaoSessionCaixaController.php";
include "../../model/Conexao.class.php";

$idPagamento = $_POST["idPagamento"];

$pagamentos = $caixa->finalizarPedido($idPagamento);
