<?PHP
	$id = $_GET['id_pedido'];
	include "../Funcoes/conexao.php";
	$query = "DELETE FROM tb_pedidos WHERE id_pedido = $id";
	$sql = $fusca -> prepare($query);
	$sql -> execute();			
	$sql = null;
	echo "	<script>
				window.location.href='pedidos.php';
			</script>";
?>