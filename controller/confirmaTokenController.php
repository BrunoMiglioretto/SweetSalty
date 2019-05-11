<?php

session_start();

include "../model/Usuario.class.php";
// Cliente
include "../model/Cliente/Cliente.class.php";
include "../model/Cliente/ClienteGoogleFacebook.class.php";
include "../model/Cliente/ClientePadrao.class.php";
include "../model/Cliente/validador.class.php";
include "../model/Cliente/validarEmail.class.php";
include "../model/Cliente/Carrinho.class.php";
include "../model/Cliente/Mesa.class.php";
// Factory
include "../model/Factory/UsuarioFactory.class.php";
include "../model/Factory/ClienteFactory.class.php";
include "../model/Factory/FuncionarioFactory.class.php";
// Login
include "../model/Login/Login.class.php";
include "../model/Login/LoginGoogleFacebook.class.php";
include "../model/Login/LoginPadrao.class.php";

include "../model/Conexao.class.php";

$token = $_GET["token"];
$email = $_GET["email"];
$senha = "senha";

$validarEmail = new ValidarEmail($email);

if(!$validarEmail->validarToken($token)){
    echo "
        <script>
            window.location = '../view/logar.php';
        </script>
    ";
}else {

    $login = new LoginPadrao($email, $senha);
    $login->verificarCadastro();

    echo "
        <script>
            window.location = '../view/cliente/mesas/escolherMesa.php';
        </script>
    ";
}
