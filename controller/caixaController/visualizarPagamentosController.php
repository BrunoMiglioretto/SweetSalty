<?php

include "verificacaoSessionCaixaController.php";
include "../../model/Conexao.class.php";

$pagamentos = $caixa->visualizarPedidos();

foreach($pagamentos as $pagamento) {
    $pagamento["botao"] = "
                        <td>
                            <center>
                                <div data-toggle='modal' data-target='#modalFinalizar' onclick=\" guardarIdCardapio(".$pagamento["id_pagamento"].") \">
                                    <img src='../img/feito.png' title='Feito'>
                                <div/>
                            </center>
                        </td>";
    if($pagamento["forma_pagamento"] == "m")
        $pagamento["forma_pagamento"] = "Dinheiro";
    if($pagamento["forma_pagamento"] == "d")
        $pagamento["forma_pagamento"] = "Débito";
    if($pagamento["forma_pagamento"] == "c")
        $pagamento["forma_pagamento"] = "Crédito";
    if($pagamento["forma_pagamento"] == "r")
        $pagamento["forma_pagamento"] = "Refeição";


    $dados["data"][] = array_map("utf8_encode", $pagamento);
}

if($pagamentos->rowCount() > 0){
    echo json_encode($dados);
}else{
    echo "{\"data\":[]}";
}
