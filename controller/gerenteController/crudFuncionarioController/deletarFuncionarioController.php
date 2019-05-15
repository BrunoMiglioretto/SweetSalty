<?php

session_start();

chdir("../");

include "verificacaoSessionGerenteController.php";

include "../../model/Conexao.class.php";

$idFuncionario = $_POST["idFuncionario"];

$gerente->excluirFuncionario($idFuncionario);
