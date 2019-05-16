<?php

include "../../model/Conexao.class.php";

$funcionario = $gerente->visualizarFuncionario($idFuncionario);

foreach($funcionario as $f) {
    $nome = $f["nome_completo"];
    $email = $f["email"];
    $numetoTelefone = $f["ddd"];
    $numetoTelefone = $numetoTelefone.$f["numero"];
    $rg = $f["rg"];
    $cpf = $f["cpf"];
    $cargo = $f["cargo"];
}
