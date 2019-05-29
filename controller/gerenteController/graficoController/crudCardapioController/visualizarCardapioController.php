<?php

chdir("../../");

include "model/Alimento/Alimento.class.php";
include "model/Alimento/Cardapio.class.php";

include "model/Conexao.class.php";

$itens = Cardapio::visualizarTodosAlimentos();

foreach($itens as $value) {
    echo "
        <tr>
        
            <td>".$value["nome"]."</td>
            <td>".$value["nome_cardapio_subcat"]."</td>
            <td>
                <button value='coluna' id='botaoItemColuna".$value["id_cardapio"]."' class='btn btn-primary' onclick=\"adicionarItem(".$value["id_cardapio"].", '".$value["nome"]."')\">Adicionar</button>
            </td>

        </tr>
    ";
}

