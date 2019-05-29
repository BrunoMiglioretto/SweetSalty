<?php

session_start();

chdir("../");

include "verificacaoSessionGerenteController.php";

include "../../model/Funcionario/Graficos.class.php";
include "../../model/Conexao.class.php";

$listaItens = $_POST["itens"];

$grafico = new Grafico;


$dados = $grafico->capturarDadosGraficosLinhaProdutos($listaItens);


foreach($dados as $d) {

    $nome = $d["nome"];
    $tmpArray["data"] = $d["date_historico"];
    $tmpArray["quantidade"] = $d["quant"];
    $tmpArray["nome"] = $nome;

    $array["data"][] = $tmpArray;
}

$array["quantItens"] = sizeof($listaItens);


echo json_encode($array);
