    <?php 
	    session_start();
	    $id = $_SESSION['id_funcionario'];
		if(!isset($_SESSION['id_funcionario'])){
			header("Location:../Funcoes/logar.php");
		}
	?>
<?PHP
	include "../../Funcoes/conexao.php";

	$sql = "SELECT * FROM tb_funcionario";
	$contatos = $fusca -> prepare($sql);
	$contatos -> execute();
			
	foreach($contatos as $edita){
		
		if(isset($_POST['editar'])){

		$id_funcionario  			 =  ""; 
		$cargo  							 =  $_POST["Cargo"]; 
		$nome  								 =  $_POST["Nome"]; 
		$sobrenome  					 =  $_POST["Sobrenome"]; 
		$email 								 =  $_POST["Email"]; 
		$telefone_residencial  =  $_POST["Relefone_residencial"]; 
		$telefone_celular  		 =  $_POST["Telefone_celular"]; 
		$rg  									 =  $_POST["RG"]; 
		$cpf  								 =  $_POST["CPF"]; 
			
			$query = "UPDATE tb_funcionario SET cargo='$cargo',nome='$nome',sobrenome='$sobrenome'
			,email='$email',telefone_residencial='$telefone_residencial',telefone_celular='$telefone_celular',
			rg='$rg',cpf='$cpf' WHERE id_funcionario = $id";
			$sql = $conn -> prepare($query);
			$sql -> execute();			
			$sql = null;
			header("location: ../Lista_Funcionarios.php");
		}
	}
?>

<!DOCTYPE html>
<html>
	<head>
	  <meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	  <!--------------------------------------------Logar------------------------------------------>
	  <!-----------------------------------------Fim Logar----------------------------------------->
	  <!-----------------------------------------TODOS CSS----------------------------------------->
	  <!-- Bootstrap CSS-->
	  <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	  <!--Template-->
	  <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	  <!-- Pageina CSS-->
	  <link href="../vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
	  <!-- Estilo Template-->
	  <link href="../css/sb-admin.css" rel="stylesheet">
	  <!--------------------------------------FIM DE TODOS CSS-------------------------------------->
	</head>
	<body>
		<center>
			<h1>Editar funcionario</h1>
			<form action="#" method='POST'>
				<input type="text" placeholder="Nome" name="nome" required value="<?PHP echo $edita['nome'];?>"><br><br>
				<input type="text" placeholder="Sobrenome" name="sobrenome" required value="<?PHP echo $edita['sobrenome'];?>">
				<input type="mail" placeholder="E-mail" name="email" required value="<?PHP echo $edita['email'];?>"><br><br>
				<input type="text" placeholder="Telefone_residencial" name="telefone_residencial" required value="<?PHP echo $edita['telefone_residencial'];?>"><br><br>
				<input type="text" placeholder="Telefone_celular" name="telefone_celular" required value="<?PHP echo $edita['telefone_celular'];?>"><br><br>
				<input type="text" placeholder="RG" name="rg" required value="<?PHP echo $edita['rg'];?>"><br><br>
				<input type="text" placeholder="CPF" name="cpf" required value="<?PHP echo $edita['cpf'];?>"><br><br>

				<select name='cargo'>
					<option <?PHP if($edita['cargo'] == 'Gerente'){ echo "selected";}?>   value='Gerente'>Gerente</option>
					<option <?PHP if($edita['cargo'] == 'Caixa'){echo "selected";}?>   value='Caixa'>Caixa</option>
					<option <?PHP if($edita['cargo'] == 'Recepção'){echo "selected";}?>   value='Recepção'>Recepção</option>
					<option <?PHP if($edita['cargo'] == 'Cozinha'){echo "selected";}?>   value="Cozinha">Cozinha</option>
					<option <?PHP if($edita['cargo'] == 'Fornecedor'){echo "selected";}?>   value="Fornecedor">Fornecedor</option>
					<option <?PHP if($edita['cargo'] == 'Garcom'){echo "selected";}?>   value="Garcom">Garçom</option>
				</select>
				<button type="submit" name='editar'>Concluir</button>
			</form>
			<a href='../Lista_Funcionarios.php'><p>Voltar</p></a>
		</center>
	</body>
</html>