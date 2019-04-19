<?php

session_start();

include "../../../model/Usuario.class.php";
// Cliente
include "../../../model/Cliente/Cliente.class.php";
include "../../../model/Cliente/ClienteGoogleFacebook.class.php";
include "../../../model/Cliente/ClientePadrao.class.php";
include "../../../model/Cliente/Carrinho.class.php";

include "../../../model/Conexao.class.php";

$cliente = unserialize($_SESSION["usuario"]);
$carrinho = unserialize($_SESSION["carrinho"]);

$idCliente = $cliente->getIdUsuario();

$pedidos = $carrinho->visualizarPedidosEnviados();

foreach($pedidos as $lista){
    $id 		    = $lista["id_pedido"];
    $categoria 	    = $lista["nome_cardapio_subcat"];
    $pedido 		= $lista["nome"];
    $quantidade     = $lista["quant"];
    $valor 			= $lista["valor_unitario"];
    $idCardapio     = $lista["id_cardapio"];
    $situacao       = $lista["situacao"];
    echo "<tr>";
    echo "<td>".$pedido."</td>";                                                            
    echo "<td>".$categoria."</td>";
    echo "
        <td>
            <input type='text' class='inputQuant' value='".$quantidade."' disabled>
        </td>";
    echo "<td> R$ <span>".number_format($valor,2,",",".")."</span></td>";
    echo "<td>";

    if($situacao == 2)
        echo "Preparando";
    if($situacao == 3)
        echo "Pronto";
    if($situacao == 5)
        echo "Entregue";
    
    echo "</td>";
    echo "</tr>";
    $selecionado[$quantidade] = "";			
}

if($pedidos->rowCount() == 0){
    echo "
        <tr class='odd'>
            <td valign='top' colspan='5' class='dataTables_empty'><p style='text-align: center; margin: 0;'>Nenhum item enviado</p></td>
        </tr>";
}
