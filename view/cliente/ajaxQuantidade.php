<?php
    session_start();
    $id_c = $_SESSION['id_cliente'];
    $qtd=$_POST['qtd'];
    $id=$_POST['id'];
    include "../Funcoes/conexao.php";
    $sql = " UPDATE `tb_pedidos` SET `Quantidade` = '$qtd' WHERE `tb_pedidos`.`id_pedido` = $id ";
    $upQtd = $fusca -> prepare($sql);
    $upQtd -> execute();
    $sql = "SELECT SUM(Valor * Quantidade) as total FROM tb_pedidos WHERE id_cliente = '$id_c' and Situacao = 'N'";
    $contatos = $fusca->prepare($sql);
    $contatos->execute();    
    foreach($contatos as $contar){
        $id_v = $contar["total"];
    }
    echo"<input type='text' style='float:right;width:100px; height:50px; background-color: #F7F7F7;font-size:20px;border-radius: 5px; border: 1px solid transparent;' value='R$ ".number_format($id_v,2,",",".")."' readonly='readonly'>";
?>