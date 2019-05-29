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

$pedidos = $carrinho->visualizarPedidos();
$subtotal = $carrinho->pegarSubtotal();

foreach($pedidos as $lista){
    $id 		    = $lista["id_pedido"];
    $categoria 	    = $lista["nome_cardapio_subcat"];
    $pedido 		= $lista["nome"];
    $quantidade     = $lista["quant"];
    $valor 			= $lista["valor_unitario"];
    $idCardapio     = $lista["id_cardapio"];
    $selecionado[$quantidade] = "selected";
    echo "<tr>";
    echo "<td class='trn'>".$pedido."</td>";                                                            
    echo "<td class='trn'>".$categoria."</td>";
    echo "
        <td>
            <select class='inputQuant' id='".$id."' onchange='atualizarPedido(this, ".$idCardapio.")' value='".$quantidade."'>
                <option ".$selecionado[1]." value='1'>1</option>
                <option ".$selecionado[2]." value='2'>2</option>
                <option ".$selecionado[3]." value='3'>3</option>
                <option ".$selecionado[4]." value='4'>4</option>
                <option ".$selecionado[5]." value='5'>5</option>
                <option ".$selecionado[6]." value='6'>6</option>
                <option ".$selecionado[7]." value='7'>7</option>
                <option ".$selecionado[8]." value='8'>8</option>
                <option ".$selecionado[9]." value='9'>9</option>
                <option ".$selecionado[10]." value='10'>10</option>
            </select>
        </td>";
    echo "<td> R$ <span>".number_format($valor,2,",",".")."</span></td>";
    echo "  <td>
                <center>
                    <div data-toggle='modal' data-target='#ModalProduto' onclick=\"attDadosModal(".$id." ,".$idCardapio.", '".$pedido."')\">
                        <img src='../img/excluir.png' title='Excluir'>
                    <div/>
                </center>
            </td>";
    echo "</tr>";
    $selecionado[$quantidade] = "";			
}

if($pedidos->rowCount() == 0){
    if($_SESSION["linguagem"] == "pt")
        $mensagem = "Nenhum item adicionado";
    else
        $mensagem = "No items added";

    echo "
        <tr class='odd'>
            <td valign='top' colspan='5' value='1' class='dataTables_empty'><p style='text-align:center; margin: 0;;'>$mensagem</p>
                <input type='hidden' value='".$subtotal."' class='subtotal'>
            </td>
        </tr>";
}
// Pegar o valor do subtotal
echo "<input type='hidden' class='subtotal' value='".$subtotal."'>";