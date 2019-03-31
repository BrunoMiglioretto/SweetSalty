<?PHP
	include "../../Funcoes/conexao.php";

	$id = $_GET['id_cliente'];

	if(isset($_GET['func']) && ($_GET['func'] == "excluir") && isset($_GET['id_cliente'])) {
		if(isset ($_GET['func'])== "Excluir"){
		$query = "DELETE FROM tb_clientes WHERE id_cliente = $id";
		$sql = $fusca -> prepare($query);
		$sql -> execute();			
		$sql = null;
		header("location: ../lista_clientes.php");				
		}else {
			header("location: ../lista_clientes.php");	
		}
	} 
?>
