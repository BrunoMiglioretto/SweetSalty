<?php

session_start();

chdir("../");

include "verificacaoSessionGerenteController.php";

include "../../model/Conexao.class.php";

$funcionarios = $gerente->visualizarFuncionarios();

foreach($funcionarios as $funcionario) {

    $botaoMais = "
        <a onclick='maisDados(".$funcionario["id_cadastro"].")'>
            <center>
                <img src='../img/ver.png' title='Ver mais'>
            </center>
        </a>";

    $botaoEditar = "
        <a href='crudFuncionario/editarFuncionario.php?id=".$funcionario["id_cadastro"]."'>
            <center>
                <img src='../img/editar.png' title='Editar'>
            </center>
        </a>";

    $botaoExcluir = "
        <a data-toggle='modal' data-target='#Modal' onclick=\"guardarIdCadastro(".$funcionario["id_cadastro"].",'".$funcionario["nome_completo"]."')\">
            <center>
                <img src='../img/excluir.png' title='Excluir'>
            </center>
        </a>";

    $dados["data"]["nome"] = $funcionario["nome_completo"];
    if($funcionario["cargo"] == "Garcom")
        $dados["data"]["cargo"] = "Garçom";
    else
        $dados["data"]["cargo"] = $funcionario["cargo"];        
    $dados["data"]["email"] = $funcionario["email"];
    $dados["data"]["numero"] = "(".$funcionario["ddd"].") ".$funcionario["numero"];
    $dados["data"]["cpf"] = $funcionario["cpf"];
    $dados["data"]["rg"] = $funcionario["rg"];

    $modalMais = "
        <input type='hidden' id='dados".$funcionario["id_cadastro"]."' value='".json_encode($dados)."'>
    ";

    echo "
        <tr>
            <td>".$funcionario["nome_completo"]."</td>
            <td>".$dados["data"]["cargo"]."</td>
            <td>$botaoMais</td>
            <td>$botaoEditar</td>
            <td>$botaoExcluir</td>
            $modalMais
        </tr>";

    unset($dados);
}

