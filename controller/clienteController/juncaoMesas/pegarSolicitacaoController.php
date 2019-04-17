<?php

session_start();

include "../../../model/Usuario.class.php";
// Cliente
include "../../../model/Cliente/Cliente.class.php";
include "../../../model/Cliente/ClienteGoogleFacebook.class.php";
include "../../../model/Cliente/ClientePadrao.class.php";
include "../../../model/Cliente/Carrinho.class.php";

include "../../../model/Conexao.class.php";

$cliente = unserialize($_SESSION["usuario"]);

$solicitacao = $cliente->pegarSolicitacao();

foreach($solicitacao as $s){
    echo "{\"id_mesa_solicitante\":".$s["id_mesa_solicitante"].",";
    echo "\"id_mesa_solicitada\":".$s["id_mesa_solicitada"].",";
    echo "\"nome\" :\"".$s["nome_completo"]."\"}";
}

