<?php

session_start();

include "verificacaoSessionClienteController.php";
include "../../model/Cliente/Mesa.class.php";
include "../../model/Conexao.class.php";
include "../../model/Cliente/JuntadorMesas.class.php";

if(isset($_SESSION["juntadorMesas"])){
    $juntadorMesas = unserialize($_SESSION["juntadorMesas"]);
    $juntadorMesas->cancelarSolicitacao();
}

$mesa = unserialize($_SESSION["mesa"]);

$mesa->sairMesa();

session_destroy();

header("location: ../../view/logar.php");
