<?php

include "../../model/Conexao.class.php";

$cliente = $gerente->visualizarCliente($idFuncionario);

foreach($cliente as $f) {
    $nome = $f["nome_completo"];
    $email = $f["email"];
    $numetoTelefone = $f["ddd"];
    $numetoTelefone = $numetoTelefone.$f["numero"];
    $sexo = $f["sexo"];
}
