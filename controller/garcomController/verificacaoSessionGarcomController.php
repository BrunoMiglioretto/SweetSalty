<?php

session_start();

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
    $garcom = unserialize($_SESSION["usuario"]);
    
    $tipo = get_class($garcom);
    
    if(!($tipo == "Garcom"))
        header("Location: ../../view/logar.php");
}
