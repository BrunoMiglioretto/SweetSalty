<?php

session_start();

include "../model/Usuario.class.php";
// Cliente
include "../model/Cliente/Cliente.class.php";
include "../model/Cliente/ClienteGoogleFacebook.class.php";
include "../model/Cliente/ClientePadrao.class.php";
include "../model/Cliente/Carrinho.class.php";
include "../model/Cliente/Mesa.class.php";
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

if(!$login->verificarEmailBD())
    echo 1;
elseif(!$login->verificarSenha())
    echo 2;
elseif(!$login->verificarEmailValidado())
    echo 3;
else{
    $usuario = $login->verificarCadastro();
    
    $tipo = get_class($usuario);
    
    if ($tipo == "ClientePadrao")
        echo "ClientePadrao";
    elseif ($tipo == "Caixa")
        echo "Caixa";
    elseif ($tipo == "Cozinheiro")
        echo "Cozinheiro";
    elseif ($tipo == "Garcom")
        echo "Garcom";
    elseif ($tipo == "Gerente")
        echo "Gerente";
}
