<?php

session_start();

include "verificacaoSessionClienteController.php";
include "../../model/Conexao.class.php";

$cliente->desconectar();

session_destroy();

header("location: ../../view/logar.php");
