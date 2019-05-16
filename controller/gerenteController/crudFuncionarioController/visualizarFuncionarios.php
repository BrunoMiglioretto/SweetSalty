<?php

session_start();

chdir("../");

include "verificacaoSessionGerenteController.php";

include "../../model/Conexao.class.php";

$funcionarios = $gerente->visualizarFuncionarios();

foreach($funcionarios as $funcionario) {

    $botaoMais = "
        <a data-toggle='modal' data-target='#Modal2".$funcionario["id_cadastro"]."'>
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

    $modalMais = "
        <div class='modal fade' id='Modal2".$funcionario["id_cadastro"]."' tabindex='-1' role='dialog' aria-labelledby='exampleModalCenterTitle' aria-hidden='true'>
            <div class='modal-dialog modal-dialog-centered' role='document'>
                <div class='modal-content'>
                    <div class='modal-header'>
                        <h5 class='modal-t'itle' id'='exampleModalLongTitle'>Mais informações sobre ".$funcionario["nome_completo"]."</h5>
                        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                            <span aria-hidden='true'>&times;</span>
                        </button>
                    </div>
                    <div class='modal-body'>

                        <div class='campo'>
                            <p><b>Nome completo:</b></p><input type='text' value='".$funcionario["nome_completo"]."' disabled>
                        </div>
                        <div class='campo'>
                            <p><b>Cargo:</b></p><input type='text' value='".$funcionario["cargo"]."' disabled>
                        </div>
                        <div class='campo'>
                            <p><b>E-mail:</b></p><input type='text' value='".$funcionario["email"]."' disabled>
                        </div>
                        <div class='campo'>
                            <p><b>Telefone:</b></p><input type='text' value='".$funcionario["numero"]."' disabled>
                        </div>
                        <div class='campo'>
                            <p><b>CPF:</b></p><input type='text' value='".$funcionario["cpf"]."' disabled>
                        </div>
                        <div class='campo'>
                            <p><b>RG:</b></p><input type='text' value='".$funcionario["rg"]."' disabled>
                        </div>
                    </div>
                    <div class='modal-footer'>
                        <button type='button' class='btn btn-secondary' data-dismiss='modal'>Fechar</button>
                    </div>
                </div>
            </div>
        </div>";

    echo "
        <tr>
            <td>".$funcionario["nome_completo"]."</td>
            <td>".$funcionario["cargo"]."</td>
            <td>$botaoMais</td>
            <td>$botaoEditar</td>
            <td>$botaoExcluir</td>
            $modalMais
        </tr>";
}

