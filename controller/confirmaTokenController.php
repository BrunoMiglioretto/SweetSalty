<?php

session_start();

include "../model/Usuario.class.php";
// Cliente
include "../model/Cliente/Cliente.class.php";
include "../model/Cliente/ClienteGoogleFacebook.class.php";
include "../model/Cliente/ClientePadrao.class.php";
include "../model/Cliente/validador.class.php";
include "../model/Cliente/validarEmail.class.php";

include "../model/Conexao.class.php";

$token = $_GET['token'];

$validarEmail = unserialize($_SESSION["ValidarEmail"]);

if(! $validarEmail->validarToken($token)){
    echo "
        <script>
            window.location = '../view/logar.php';
        </script>
    ";
}else {
    echo "
        <script>
            window.location = '../view/cliente/mesas/escolherMesa.php';
        </script>
    ";
}
