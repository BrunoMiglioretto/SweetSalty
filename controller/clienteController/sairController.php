<?php

session_start();

include "verificacaoSessionClienteController.php";
include "../../model/Cliente/Mesa.class.php";
include "../../model/Conexao.class.php";

$mesa = unserialize($_SESSION["mesa"]);

$mesa->sairMesa();

session_destroy();

header("location: ../../view/logar.php");
