<?php

include "verificacaoSessionCozinheiroController.php";
include "../../model/Conexao.class.php";


$pedidos = $cozinheiro->visualizarPedidos();

$i = 1;
foreach($pedidos as $pedido) {
    echo "
        <tr>
            <td>".$i."</td>
            <td>".$pedido["nome"]."</td>
            <td>".$pedido["quant"]."</td>
            <td>".$pedido["peso_grama"]."</td>
            <td>Botão</td>
        </tr>
    ";

    $i++;
}
