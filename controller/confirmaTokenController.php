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

    $verifacarToken = $_GET['token']; //pega o token pela URL
    
    $validarToken = unserialize($_SESSION["ValidarEmail"]);
    
    if(! $validarToken->validarToken($verifacarToken)){
        echo "
            <script>
                alert('Validação inclompleta');
                window.location = '../view/logar.php';
            </script>
        ";
    }else {
        echo "
            <script>
                alert('Validou');
                window.location = '../view/cliente/mesas/mesa.php';
            </script>
        ";
    }
?>