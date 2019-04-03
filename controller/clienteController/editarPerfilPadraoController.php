<?php

session_start();
include "verificacaoSessionClienteController.php";

include "../../model/Conexao.class.php";


$informacoes[0] = $_POST["email"];
$informacoes[1] = $_POST["nomeCompleto"];
$informacoes[2] = 20;
$informacoes[3] = $_POST["numeroTelefone"];
$informacoes[4] = $_POST["sexo"];
$informacoes[5] = $_POST["dataNascimento"];
$informacoes[6] = $_POST["senha"];
$informacoes[7] = $_POST["confSenha"];

$validacao = $cliente->editarPerfil($informacoes);

if(!$validacao){
    echo "
        <script>
            alert('Algum dado foi consirado como invalido');
            window.location = '../../view/cliente/';
        </script>
    ";
}else{
    $_SESSION["usuario"] = serialize($validacao);
    echo "
        <script>
            alert('Perfil atualizado com sucesso!');
            window.location = '../../view/cliente/';
        </script>
    ";
}