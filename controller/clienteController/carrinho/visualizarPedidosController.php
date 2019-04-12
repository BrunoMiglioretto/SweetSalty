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

$pedidos = $carrinho->visualizarPedidos($idCliente);
$subtotal = $carrinho->pegarSubtotal($idCliente);

foreach($pedidos as $lista){
    $id 		    = $lista["id_pedido"];
    $categoria 	    = $lista["nome_cardapio_subcat"];
    $pedido 		= $lista["nome"];
    $quantidade     = $lista["quant"];
    $valor 			= $lista["valor_unitario"];
    $idCardapio     = $lista["id_cardapio"];
    $excluir 		= "<center><a data-toggle='modal' data-target='#Modal$id'><img src='../img/excluir.png' title='Excluir'><a/></center>";
    $total=$valor * $quantidade;
    echo "<tr>";
    echo "<td>".$pedido."</td>";                                                            
    echo "<td>".$categoria."</td>";
    echo "<td><input type='text' value='".$quantidade."' style='width:50px;display:none;padding: 0px;'
    ><span id='d'>".$quantidade."</span></td>";
    echo "<td> R$ <span id='m'>".number_format($valor,2,",",".")."</span><input type='hidden' value='".$valor."' id='v'><input type='hidden' value='".$total."' id='t'></td>";
    echo "<td>".$excluir."</td>";
    echo "  <td><div class='modal fade' id='Modal$id' tabindex='-1' role='dialog' aria-labelledby='exampleModalCenterTitle' aria-hidden='true'>
                <div class='modal-dialog modal-dialog-centered' role='document'>
                    <div class='modal-content'>
                        <div class='modal-header'>
                            <h5 class='modal-t'itle' id'='exampleModalLongTitle'>Excluir</h5>
                            <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                <span aria-hidden='true'>&times;</span>
                            </button>
                        </div>
                        <div class='modal-body'>
                            Deseja excluir $pedido?
                        </div>
                        <div class='modal-footer'>
                            <button type='button' class='btn btn-secondary' data-dismiss='modal'>Cancelar</button>
                            <a data-dismiss='modal'><button onclick='excluirPedido(".$id.",".$idCardapio.")' class='btn btn-primary'>Excluir</button></a>
                            <input type='hidden' value='".$subtotal."' class='subtotal'>
                        </div>
                    </div>
                </div>
            </div></td>
        </tr>";				
}

if($pedidos->rowCount() == 0){
    echo "
        <tr class='odd'>
            <td valign='top' colspan='5' class='dataTables_empty'>Nenhum item adicionado
                <input type='hidden' value='0.00' class='subtotal'>
            </td>
        </tr>";
}
