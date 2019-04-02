<?php

session_start();

include "../model/Usuario.class.php";
// Cliente
include "../model/Cliente/Cliente.class.php";
include "../model/Cliente/ClienteGoogleFacebook.class.php";
include "../model/Cliente/ClientePadrao.class.php";
// Funcionario
include "../model/Funcionario/Funcionario.class.php";
include "../model/Funcionario/Caixa.class.php";
include "../model/Funcionario/Cozinheiro.class.php";
include "../model/Funcionario/Garcom.class.php";
include "../model/Funcionario/Gerente.class.php";
// Factory
include "../model/Factory/UsuarioFactory.class.php";
include "../model/Factory/ClienteFactory.class.php";
include "../model/Factory/FuncionarioFactory.class.php";
// Login
include "../model/Login/Login.class.php";
include "../model/Login/LoginGoogleFacebook.class.php";
include "../model/Login/LoginPadrao.class.php";

include "../model/Conexao.class.php";

$email = $_POST["email"];
$senha = $_POST["senha"];

$login = new LoginPadrao($email, $senha);

if(!$login->verificarEmailBD()){
    echo "
        <script>
            alert('Email não cadastrado');
            window.location.href = '../view/logar.php';
        </script>";
}

if(!$login->verificarSenha()){
    echo "
        <script>
            alert('Email e/ou senha incorreto');
            window.location.href = '../view/logar.php';
        </script>";
}

$usuario = $login->verificarCadastro();

$tipo = get_class($usuario);

if ($tipo == "ClientePadrao")
    echo "<script>window.location.href = '../view/cliente/mesas/mesa.php'</script>";
elseif ($tipo == "Caixa")
    echo "<script>window.location.href = '../view/caixa/'</script>";
elseif ($tipo == "Cozinheiro")
    echo "<script>window.location.href = '../view/cozinheiro/'</script>";
elseif ($tipo == "Garcom")
    echo "<script>window.location.href = '../view/garcom/'</script>";
elseif ($tipo == "Gerente")
    echo "<script>window.location.href = '../view/gerente/'</script>";
