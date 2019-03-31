<?php
	include "../Funcoes/conexao.php";
	$comando = "SELECT id_pedido FROM tb_pedidos WHERE Situacao = 'C'";
	$pedidos = $fusca->prepare($comando);
	$pedidos->execute();
	$fusca = NULL;
	$contador = $pedidos->rowCount();
	echo $contador;
?>