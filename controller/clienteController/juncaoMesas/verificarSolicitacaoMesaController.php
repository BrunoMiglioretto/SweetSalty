<?php

session_start();

include "../../../model/Usuario.class.php";
// Cliente
include "../../../model/Cliente/Cliente.class.php";
include "../../../model/Cliente/ClienteGoogleFacebook.class.php";
include "../../../model/Cliente/ClientePadrao.class.php";

include "../../../model/Conexao.class.php";

$cliente = unserialize($_SESSION["usuario"]);

$solicitacao = $cliente->verificarSolicitacaoMesa();

if($solicitacao == 1)
    header("location: ../../../view/cliente/mesas/juncaoMesas/juntarMesas.php");
else if($solicitacao == 2)
    header("location: ../../../view/cliente/mesas/juncaoMesas/aceitarJuncaoMesas.php");
else if($solicitacao == 3)
    header("location: ../../../view/cliente/mesas/juncaoMesas/aguardandoResposta.php");
else if($solicitacao == 4)
    header("location: ../../../view/cliente/mesas/juncaoMesas/mesasJuntas.php");


