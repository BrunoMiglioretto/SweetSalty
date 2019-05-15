<?PHP
	include "../../Funcoes/conexao.php";

	$id = $_GET['id_produto'];

	if(isset($_GET['func']) && ($_GET['func'] == "excluir") && isset($_GET['id_produto'])) {
		if(isset ($_GET['func'])== "Excluir"){
		$query = "DELETE FROM tb_estoque WHERE id_produto = $id";
		$sql = $fusca -> prepare($query);
		$sql -> execute();			
		$sql = null;
		header("location: ../Estoque.php");				
		}else {
			header("location: ../Estoque.php");	
		}
	} 
?>