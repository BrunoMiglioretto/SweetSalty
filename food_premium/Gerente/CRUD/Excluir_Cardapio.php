<?PHP
include "../../Funcoes/conexao.php";

	echo $id = $_GET['cardapio_id'];

	$query = "DELETE FROM tb_cardapio WHERE cardapio_id = $id";
	$sql = $fusca -> prepare($query);
	$sql -> execute();			
	$sql = null;
	
	header("location: ../lista_cardapio.php");				
?>