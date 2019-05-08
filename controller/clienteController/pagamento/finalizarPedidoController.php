<?php

session_start();

chdir("../");

include "verificacaoSessionClienteController.php";

include "../../model/Conexao.class.php";

$carrinho = unserialize($_SESSION["carrinho"]);

$validado = $cliente->fecharConta($carrinho->getIdPedido());

echo $validado;
