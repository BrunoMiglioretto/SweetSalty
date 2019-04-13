<?php

session_start();

include "../model/Usuario.class.php";
// Cliente
include "../model/Cliente/Cliente.class.php";
include "../model/Cliente/ClienteGoogleFacebook.class.php";
include "../model/Cliente/ClientePadrao.class.php";
include "../model/Cliente/Carrinho.class.php";
// Factory
include "../model/Factory/UsuarioFactory.class.php";
include "../model/Factory/ClienteFactory.class.php";
// Login
include "../model/Login/Login.class.php";
include "../model/Login/LoginGoogleFacebook.class.php";
include "../model/Login/LoginPadrao.class.php";

include "../model/Conexao.class.php";

// $email =  filter_input(INPUT_POST,'userEmail', FILTER_SANITIZE_STRING);

$email = $_POST["email"];

$login = new LoginGoogleFacebook($email);

if(!$login->verificarEmailBD()){
    include "clienteController/cadastro/cadastrarClienteGFController.php";
    $login->verificarCadastro();
    echo 1;
}
else{
    $v = $login->verificarCadastro();
    if(!$v)
        echo 2;
    else 
        echo 3;
}
