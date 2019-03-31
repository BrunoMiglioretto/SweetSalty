<?PHP
	include "../../Funcoes/conexao.php";

	$id = $_GET['id_funcionario'];

	if(isset($_GET['func']) && ($_GET['func'] == "excluir") && isset($_GET['id_funcionario'])) {
		if(isset ($_GET['func'])== "Excluir"){
		$query = "DELETE FROM tb_funcionario WHERE id_funcionario = $id";
		$sql = $fusca -> prepare($query);
		$sql -> execute();			
		$sql = null;
		header("location: ../Lista_Funcionarios.php");				
		}else {
			header("location: ../Lista_funcionarios.php");	
		}
	} 
?>
