<?PHP
	include "../Funcoes/conexao.php";

$id = $_GET['id'];
		
		$query 		 = "UPDATE tb_pedidos SET Situacao='F' WHERE id_pedido ='$id'";
		$sql 			 = $fusca -> prepare($query);
		$sql -> execute();			
		$sql = null;
		
		header("location:index.php");