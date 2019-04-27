<?php

session_start();

include "../../../model/Usuario.class.php";
// Cliente
include "../../../model/Cliente/Cliente.class.php";
include "../../../model/Cliente/ClienteGoogleFacebook.class.php";
include "../../../model/Cliente/ClientePadrao.class.php";
include "../../../model/Cliente/Carrinho.class.php";
include "../../../model/Cliente/Mesa.class.php";
include "../../../model/Cliente/JuntadorMesas.class.php";

include "../../../model/Conexao.class.php";

$mesa = unserialize($_SESSION["mesa"]);

if(!isset($_SESSION["juntadorMesas"]))
    $juntadorMesas = new JuntadorMesas;
else
    $juntadorMesas = unserialize($_SESSION["juntadorMesas"]);

$solicitacao = $juntadorMesas->verificarSolicitacao($mesa->getNumeroMesa());

$cliente = unserialize($_SESSION["usuario"]);
$carrinho = unserialize($_SESSION["carrinho"]);

if($solicitacao == 1 || $solicitacao == 4){
    if($carrinho->enviarPedido())
        echo "true";
    else
        echo "false";
}else
    echo $solicitacao;
