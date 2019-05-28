<?php

session_start();

chdir("../");

include "verificacaoSessionGerenteController.php";

include "../../model/Funcionario/Graficos.class.php";
include "../../model/Conexao.class.php";

$listaItens = $_POST["itens"];
$dataComeco = $_POST["dataComeco"];

$grafico = new Grafico;

$dados = $grafico->capturarDadosGraficosColunasProdutos($listaItens, $dataComeco);


foreach($dados as $d) {

    $nome = $d["nome"];
    $tmpArray["quantidade"] = $d["quantidade"];
    $tmpArray["nome"] = $nome;

    $array["data"][] = $tmpArray;
}


echo json_encode($array);
