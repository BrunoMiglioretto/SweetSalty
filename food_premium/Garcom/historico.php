<?php
	date_default_timezone_set("America/Sao_Paulo");
	$id_historico = "";
	$id_cliente = $_GET['id_cliente'];
	include "../Funcoes/conexao.php";
	$comando_pedido = "SELECT * FROM tb_pedidos WHERE id_cliente = $id_cliente";
	$pedido = $fusca->prepare($comando_pedido);
	$pedido->execute();
	foreach($pedido as $carrega){
		$produto = $carrega['Pedido'];
		$valor = $carrega['Valor'];
		$quantidade = $carrega['Quantidade'];
		$valor_gasto = $valor*$quantidade;
		$pagamento = $carrega['Situacao'];
		$data = date("y-m-d");
		$horario = date("H:m:s");
		$comando_historico = "INSERT INTO tb_historico SET id_historico = '',id_cliente = $id_cliente,pedido = '$produto', valor_gasto = $valor_gasto, pagamento = $pagamento, data = STR_TO_DATE('$data','%Y-%m-%d'),horario = TIME_FORMAT('$horario','%T')";
		$historico = $fusca->prepare($comando_historico);
		$historico->execute();
	}
	$comando_deletar = "DELETE FROM tb_pedidos, tb_troco USING tb_pedidos LEFT JOIN tb_troco USING(id_cliente) WHERE tb_pedidos.id_cliente=$id_cliente";
	$deletar = $fusca->prepare($comando_deletar);
	$deletar->execute();
	$deletar = NULL;
	header('location: ../Recepcao');
?>