<?php
	include "conexao.php";
	$comando_clientes = "SELECT id_funcionario, senha FROM tb_funcionario";
	$clientes = $fusca->prepare($comando_clientes);
	$clientes->execute();
	$contador = $clientes->rowCount();
	echo "<script>alert('$contador')</script>";
	foreach($clientes as $carrega){
		$id_cliente = $carrega['id_funcionario'];
		$senha = $carrega['senha'];
		$senha_crip = md5($senha);
		$comando_senha = "UPDATE tb_funcionario SET senha='$senha_crip' WHERE id_funcionario = '$id_cliente'";
		$cliente_senha = $fusca->prepare($comando_senha);
		$cliente_senha->execute();
		echo "$id_cliente <br>";
	}
?>
