<?php

session_start();

chdir("../");

include "verificacaoSessionClienteController.php";

if($v)
header("Location: ../../view/logar.php");

include "../../model/Cliente/Mesa.class.php";
include "../../model/Conexao.class.php";

$numeroMesa = $_POST["mesa"];

$mesa = unserialize($_SESSION["mesa"]);

$validado = $mesa->mudarMesa($numeroMesa);

$_SESSION["mesa"] = serialize($mesa);

if($validado)
    echo "true";
else 
    echo "false";

