<?php

session_start();

include "../model/Usuario.class.php";
// Cliente
include "../model/Cliente/Cliente.class.php";
include "../model/Cliente/ClienteGoogleFacebook.class.php";
include "../model/Cliente/ClientePadrao.class.php";
// Factory
include "../model/Factory/UsuarioFactory.class.php";
include "../model/Factory/ClienteFactory.class.php";
// Login
include "../model/Login/Login.class.php";
include "../model/Login/LoginGoogleFacebook.class.php";
include "../model/Login/LoginPadrao.class.php";

include "../model/Conexao.class.php";

$email =  filter_input(INPUT_POST,'userEmail', FILTER_SANITIZE_STRING);

$login = new LoginGoogleFacebook($email);

if(!$login->verificarEmailBD()){
    echo "
        <script>
            alert('Email não cadastrado');
            window.location.href = '../view/login.html';
        </script>";
}

$v = $login->verificarCadastro();
if(!$v){
    echo "
        <script>
            alert('Email não é de um cliente');
            window.location.href = '../view/login.html';
        </script>";
}else {
    echo "../food_premium/cliente/mesas.php";
}


