<?php

$cGF = new ClienteGoogleFacebook;

$informacoes[0] = $_POST["nome"];
$informacoes[1] = $email;

$cGF->cadastrar($informacoes);
