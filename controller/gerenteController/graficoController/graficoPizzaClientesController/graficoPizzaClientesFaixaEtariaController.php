<?php

session_start();

chdir("../../");

include "verificacaoSessionGerenteController.php";

include "../../model/Funcionario/Graficos.class.php";
include "../../model/Conexao.class.php";

$faixa = $_POST["faixaEtaria"];

$grafico = new Grafico;

$dados = $grafico->capturarDadosGraficosPizzaClientesFaixaEtaria($faixa);

foreach($dados as $d) {

    $tmpArray["quantidade"] = $d["quantidade"];
    if($d["sexo"] == "M")
        $tmpArray["nome"] = "Homens";
    else
        $tmpArray["nome"] = "Mulheres";
        

    $array["data"][] = $tmpArray;
}

$array["titulo"] = "Cadastros";

echo json_encode($array);


