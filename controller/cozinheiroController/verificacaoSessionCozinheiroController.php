<?php

include "../../model/Usuario.class.php";
// Cliente
include "../../model/Cliente/Cliente.class.php";
include "../../model/Cliente/ClienteGoogleFacebook.class.php";
include "../../model/Cliente/ClientePadrao.class.php";
include "../../model/Cliente/Carrinho.class.php";
// Funcionario
include "../../model/Funcionario/Funcionario.class.php";
include "../../model/Funcionario/Caixa.class.php";
include "../../model/Funcionario/Cozinheiro.class.php";
include "../../model/Funcionario/Garcom.class.php";
include "../../model/Funcionario/Gerente.class.php";

if(!isset($_SESSION["usuario"]))
    header("Location: ../../view/logar.php");
else{
    $cozinheiro = unserialize($_SESSION["usuario"]);
    
    $tipo = get_class($cozinheiro);
    
    if(!($tipo == "Cozinheiro"))
        header("Location: ../../view/logar.php");
}
