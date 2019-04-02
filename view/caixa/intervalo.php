<?php
	include "../Funcoes/conexao.php";
	$comando = "SELECT * FROM tb_pedidos WHERE Situacao = '1' || Situacao = '2' || Situacao = '3' || Situacao = '4'";
	$pedidos = $fusca->prepare($comando);
	$pedidos->execute();
	$fusca = NULL;
	$contador = $pedidos->rowCount();
	echo $contador;
?>