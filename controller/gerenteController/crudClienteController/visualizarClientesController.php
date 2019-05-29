<?php

session_start();

chdir("../");

include "verificacaoSessionGerenteController.php";

include "../../model/Conexao.class.php";

$clientes = $gerente->visualizarClientes();

foreach($clientes as $cliente) {

    $botaoMais = "
        <a onclick='maisDados(".$cliente["id_cadastro"].")'>
            <center>
                <img src='../img/ver.png' title='Ver mais'>
            </center>
        </a>";

    $botaoEditar = "
        <a href='crudCliente/editarClientes.php?id=".$cliente["id_cadastro"]."'>
            <center>
                <img src='../img/editar.png' title='Editar'>
            </center>
        </a>";

    $botaoExcluir = "
        <a data-toggle='modal' data-target='#Modal' onclick=\"guardarIdCadastro(".$cliente["id_cadastro"].",'".$cliente["nome_completo"]."')\">
            <center>
                <img src='../img/excluir.png' title='Excluir'>
            </center>
        </a>";

    $dados["data"]["nome"] = $cliente["nome_completo"];
    $dados["data"]["email"] = $cliente["email"];
    $dados["data"]["dataNasc"] = $cliente["data_nascimento"];
    $dados["data"]["numero"] = "(".$cliente["ddd"].") ".$cliente["numero"];
    $dados["data"]["sexo"] = $cliente["sexo"];

    $modalMais = "
        <input type='hidden' id='dados".$cliente["id_cadastro"]."' value='".json_encode($dados)."'>
    ";

    echo "
        <tr>
            <td>".$cliente["nome_completo"]."</td>
            <td>".$cliente["email"]."</td>
            <td>$botaoMais</td>
            <td>$botaoEditar</td>
            <td>$botaoExcluir</td>
            $modalMais
        </tr>";

    unset($dados);
}

