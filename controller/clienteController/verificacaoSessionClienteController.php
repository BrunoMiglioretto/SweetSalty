<?php

include "../../model/Usuario.class.php";
// Cliente
include "../../model/Cliente/Cliente.class.php";
include "../../model/Cliente/ClienteGoogleFacebook.class.php";
include "../../model/Cliente/ClientePadrao.class.php";
// Funcionario
include "../../model/Funcionario/Funcionario.class.php";
include "../../model/Funcionario/Caixa.class.php";
include "../../model/Funcionario/Cozinheiro.class.php";
include "../../model/Funcionario/Garcom.class.php";
include "../../model/Funcionario/Gerente.class.php";

$v = false;

if(!isset($_SESSION["usuario"]))
    $v = true;
else{
    $cliente = unserialize($_SESSION["usuario"]);
    
    $tipo = get_class($cliente);
    
    if(!($tipo == "ClientePadrao" || $tipo == "ClienteGoogleFacebook"))
        $v = true;
}
