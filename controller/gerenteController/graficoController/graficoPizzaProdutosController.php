<?php

session_start();

chdir("../");

include "verificacaoSessionGerenteController.php";

include "../../model/Funcionario/Graficos.class.php";
include "../../model/Conexao.class.php";

$listaItens = $_POST["itens"];
$dataComeco = $_POST["dataComeco"];

$grafico = new Grafico;

$dados = $grafico->capturarDadosGraficosPizza($listaItens, $dataComeco);

foreach($dados as $d) {

    $nome = $d["nome"];

    $tmpArray["id_cardapio"] = $d["id_cardapio"];
    $tmpArray["quantidade"] = $d["quantidade"];
    $tmpArray["nome"] = (string)$nome;

    $array["data"][] = $tmpArray;
}

$array["titulo"] = "Vendas de produtos";

echo json_encode($array);
