<?php
	session_start();
	$id_cliente = $_SESSION['id_cliente'];
	$contador_PC = 0;
	include "../Funcoes/conexao.php";
	$comando = "SELECT Situacao FROM tb_pedidos WHERE Situacao = 'PC' AND id_cliente = '$id_cliente'";
	$pedidos = $fusca->prepare($comando);
	$pedidos->execute();
	$fusca = NULL;
	foreach($pedidos as $carrega){
		if($carrega['Situacao'] == 'PC')
			$contador_PC++;
	}
	echo $contador_PC;
?>