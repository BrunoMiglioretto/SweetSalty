<?php

session_start();

include "verificacaoSessionClienteController.php";
if($v)
    header("Location: ../../view/logar.php");

include "../../model/Conexao.class.php";

$mesa = $_POST["mesa"];

if($cliente->escolherMesa($mesa))
    echo "true";
else
    echo "false";

$_SESSION["usuario"] = serialize($cliente);
