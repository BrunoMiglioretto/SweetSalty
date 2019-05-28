<?php


$itens = Cardapio::visualizarTodosAlimentos();

foreach($itens as $value) {
    echo "
        <tr>
        
            <td>".$value["nome"]."</td>
            <td>".$value["nome_cardapio_subcat"]."</td>
            <td>
                <button value='linha' id='botaoItem".$value["id_cardapio"]."' class='btn btn-primary' onclick=\"adicionarItem(".$value["id_cardapio"].", '".$value["nome"]."')\">Adicionar</button>
            </td>

        </tr>
    ";
}

