<?php

session_start();

chdir("../");

include "verificacaoSessionGerenteController.php";

include "../../model/Funcionario/Graficos.class.php";
include "../../model/Conexao.class.php";

$conjunto = $_POST["conjunto"];
$dataComeco = $_POST["dataComeco"];

$grafico = new Grafico;

$dados = $grafico->capturarDadosGraficosPizzaProdutos($conjunto, $dataComeco);

foreach($dados as $d) {

    if($conjunto == "categorias")
        $nome = $d["nome_cardapio_cat"];
    else
        $nome = $d["nome_cardapio_subcat"];

    $tmpArray["quantidade"] = $d["quantidade"];
    $tmpArray["nome"] = (string)$nome;

    $array["data"][] = $tmpArray;
}

$array["titulo"] = "Vendas de produtos";

echo json_encode($array);









// $grafico = new Grafico;

// $dados = $grafico->capturarDadosGraficosPizza($conjunto, $dataComeco);

// foreach($dados as $d) {

//     $nome = $d["nome"];

//     $tmpArray["id_cardapio"] = $d["id_cardapio"];
//     $tmpArray["quantidade"] = $d["quantidade"];
//     $tmpArray["nome"] = (string)$nome;

//     $array["data"][] = $tmpArray;
// }

// $array["titulo"] = "Vendas de produtos";

// echo json_encode($array);
