<?php

session_start();

chdir("../../");

include "verificacaoSessionGerenteController.php";

include "../../model/Funcionario/Graficos.class.php";
include "../../model/Conexao.class.php";

$grafico = new Grafico;

$dados = $grafico->capturarDadosGraficosPizzaClientesCadastro();

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





