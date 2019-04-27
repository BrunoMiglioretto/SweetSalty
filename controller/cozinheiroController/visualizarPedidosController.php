<?php

include "verificacaoSessionCozinheiroController.php";
include "../../model/Conexao.class.php";

$pedidos = $cozinheiro->visualizarPedidos();

foreach($pedidos as $key => $pedido) {
    $pedido["vez"] = $key + 1;
    $pedido["botao"] = "
                        <td>
                            <center>
                                <div data-toggle='modal' data-target='#modalFinalizar' onclick=\" guardarIdCardapio(".$pedido["id_cardapio"].", ".$pedido["id_pedido"].", '".$pedido["nome"]."') \">
                                    <img src='../img/feito.png' title='Feito'>
                                <div/>
                            </center>
                        </td>";
    $dados["data"][] = array_map("utf8_encode", $pedido);
}

if($pedidos->rowCount() > 0){
    echo json_encode($dados);
}else{
    echo "{\"data\":[]}";
}
