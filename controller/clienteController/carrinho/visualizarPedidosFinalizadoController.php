<?php

include "../../model/Conexao.class.php";

$cliente = unserialize($_SESSION["usuario"]);
$carrinho = unserialize($_SESSION["carrinho"]);

$idCliente = $cliente->getIdUsuario();

$pedidos = $carrinho->visualizarPedidosEnviados();

$total = 0;

foreach($pedidos as $lista){
    $categoria 	    = $lista["nome_cardapio_subcat"];
    $nome 		    = $lista["nome"];
    $quantidade     = $lista["quant"];
    $valor 			= $lista["valor_unitario"];
    $situacao       = $lista["situacao"];
    echo "<tr>";
    echo "<td>".$nome."</td>";                                                            
    echo "<td>".$categoria."</td>";
    echo "
        <td>
            <input type='text' class='inputQuant' value='".$quantidade."' disabled>
        </td>";
    echo "
        <td>
            R$ ".number_format($quantidade * $valor,2,",",".")."
        </td>";
    echo "<td>";
    
    if($situacao == 2)
    echo "Preparando";
    if($situacao == 3)
    echo "Pronto";
    if($situacao == 4)
    echo "Entregue";
    
    echo "</td>";

    echo "</tr>";
        
    $total += $quantidade * $valor;
}

echo "<input type='hidden' value='".number_format($total,2,",",".")."' id='total'>";
