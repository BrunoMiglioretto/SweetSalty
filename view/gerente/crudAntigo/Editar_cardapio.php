<!DOCTYPE html>
<?php
	$idGet = $_GET['cardapio_id'];
	include "../../Funcoes/conexao.php";
	$sql = "SELECT * FROM tb_cardapio WHERE cardapio_id = $idGet";
	$contatos = $fusca -> prepare($sql);
	$contatos -> execute();
			
	foreach($contatos as $edita){
		
		if(isset($_POST['salvar'])){
		$Descricao  	=  $_POST["cardapio_desc"]; 
		$Valor 			=  $_POST["cardapio_valor"]; 
		$Categoria  	=  $_POST["cardapio_cat"]; 
		$Subcategoria	=  $_POST["cardapio_subcategoria"]; 
		$Quantidade  	=  $_POST["cardapio_quan"]; 
		$calorias 		=  $_POST["calorias"];
			$query = "UPDATE tb_cardapio SET
									cardapio_desc='$Descricao',
									cardapio_valor='$Valor',
									cardapio_cat='$Categoria',
									cardapio_subcategoria='$Subcategoria',
									cardapio_quan='$Quantidade',
									calorias='$calorias'
							 	WHERE cardapio_id = '$idGet'";
			$sql = $fusca -> prepare($query);
			$sql -> execute();			
			$sql = null;
			
			echo "<script>
					alert('Produto editado com sucesso!');
					window.location.href='logar.php';
				</script>";
				
			header("location: ../lista_cardapio.php");
		}
	}
?>
<html lang="PT-BR">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="icon" href="../../img/logo.png" type="image/x-icon">
		<title>Estoque | Sweet Salty</title>
		<!--------------------------------------------Logar------------------------------------------>
		<!-----------------------------------------Fim Logar----------------------------------------->
		<!-----------------------------------------TODOS CSS----------------------------------------->
		<!-- Bootstrap CSS-->
		<link href="../../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<!--Template-->
		<link href="../../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
		<!-- Pageina CSS-->
		<link href="../../vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
		<!-- Estilo Template-->
		<link href="../../css/sb-admin.css" rel="stylesheet">
  <!--------------------------------------FIM DE TODOS CSS-------------------------------------->
	</head>
	<body id="page-top">
		<!--------------------------------------INCLUDE MENU---------------------------------------->
		<?php include 'Menu_CRUD.php'; ?>	
		<!----------------------------------------FIM INCLUDE--------------------------------------->
		<br><br><br><br><center><h1>Editar Produto</h1></center>
		<div class="content-wrapper">
	    	<div class="container-fluid">
				<div class="card mb-3">
	        		<div class="card-header">
	        			<div class="card-body">
	          				<div class="table-responsive">
								<form method="POST" action="">
									<div class="col-sm-12">
										<div class="row">
											<div class="col-sm-12 form-group">
												<div class="col-sm-12 form-group">
													<label>Categoria</label>
												   	<select name='cardapio_cat' class="form-control" required value="<?PHP echo $edita['Cardapio_cat'];?>">
														<option <?PHP if($edita['cardapio_cat'] == 'Bebida'){ 	echo "selected";}?>   value='Bebida'>Bebida</option>
														<option <?PHP if($edita['cardapio_cat'] == 'Creme'){		echo "selected";}?>   value='Creme'>Creme</option>
														<option <?PHP if($edita['cardapio_cat'] == 'Doce'){			echo "selected";}?>   value='Doce'>Doce</option>
														<option <?PHP if($edita['cardapio_cat'] == 'Salgado'){	echo "selected";}?>   value='Salgado'>Salgado</option>
													</select> 
												</div>	
												<div class="col-sm-12 form-group">
													<label>Produto</label>
													<input type="text" placeholder="Produto" name="cardapio_desc" class="form-control" required value="<?PHP echo $edita['cardapio_desc'];?>">
												</div>
												<div class="col-sm-12 form-group">
													<label>Quantidade</label>
													<input type="text" placeholder="Quantidade" name="cardapio_quan" class="form-control" class="form-control" required value="<?PHP echo $edita['cardapio_quan'];?>">
												</div>	
												<div class="col-sm-12 form-group">
													<label>Subcategoria</label>
												   	<select name='cardapio_subcategoria' class="form-control" required value="<?PHP echo $edita['Cardapio_subcategoria'];?>">
														<option <?PHP if($edita['cardapio_subcategoria'] == 'Suco com água'){ 	echo "selected";}?>   value='Suco com água'>Suco com água</option>
														<option <?PHP if($edita['cardapio_subcategoria'] == 'Suco com leite'){	echo "selected";}?>   value='Suco com leite'>Suco com leite</option>
														<option <?PHP if($edita['cardapio_subcategoria'] == 'Água'){						echo "selected";}?>   value='Água'>Água</option>
														<option <?PHP if($edita['cardapio_subcategoria'] == 'Shake'){						echo "selected";}?>   value='Shake'>Shake</option>
														<option <?PHP if($edita['cardapio_subcategoria'] == 'Outros'){					echo "selected";}?>   value='Outros'>Outros</option>
													</select> 
												</div>
												<div class="col-sm-12 form-group">
													<label>Valor</label>
													<input type="number" placeholder="Valor" name="cardapio_valor"  class="form-control" required value="<?PHP echo $edita['cardapio_valor'];?>">
												</div>
												<div class="col-sm-12 form-group">
													<label>Calorias</label>
													<input type="number" placeholder="Valor" name="calorias"  class="form-control" required value="<?PHP echo $edita['calorias'];?>">
												</div>		
											</div>
											<input class="btn btn-primary"type="submit" name="salvar" value="Salvar" style="width: 100px; float: left;margin-left:30px;">				
										</div>
									</form>
								</div>
							</div>
						</div>
		   			</div>
	    		</div>
	    	</div>
    	</div><br><br>
		<!---------------------------------------FIM CONTEUDO--------------------------------------->
		<style>
			@media print {
				.print{
					display:none;
				}
				.no-print { 
					display:none; 
				}
				table{
					width:100%;
					font-size:18px;
				}
			}
		</style>
		<!-------------------------------- Botão de voltar ao topo---------------------------------->
		<a class="scroll-to-top rounded" href="#page-top">
			<i class="fa fa-angle-up"></i>
		</a>
		<!-- Logout Modal-->
		<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Você tem certeza?</h5>
						<button class="close" type="button" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">×</span>
						</button>
					</div>
					<div class="modal-body">Ao clicar em "Sair" você será deslogado do sistema</div>
					<div class="modal-footer">
						<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
						<a class="btn btn-primary" href="../../logout.php">Sair</a>
					</div>
				</div>
			</div>
		</div>
		<!------------------------------FIM Botão de voltar ao topo---------------------------------->
		<!--------------------------------------INCLUDE FOOTER--------------------------------------->
		<?php include '../../Menu_Lateral/footer.html'; ?>	
		<!----------------------------------------FIM INCLUDE---------------------------------------->
		<!------------------------------------------- JAVA------------------------------------------->
		<!-- Bootstrap core JavaScript-->
		<script src="../../vendor/jquery/jquery.min.js"></script>
		<script src="../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
		<!-- Core plugin JavaScript-->
		<script src="../../vendor/jquery-easing/jquery.easing.min.js"></script>
		<!-- Page level plugin JavaScript-->
		<script src="../../vendor/chart.js/Chart.min.js"></script>
		<script src="../../vendor/datatables/jquery.dataTables.js"></script>
		<script src="../../vendor/datatables/dataTables.bootstrap4.js"></script>
		<!-- Custom scripts for all pages-->
		<script src="../../js/sb-admin.min.js"></script>
		<!-- Custom scripts for this page-->
		<script src="../../js/sb-admin-datatables.js"></script>
		<script src="../../js/sb-admin-charts.min.js"></script>
		<script>
			function teste(){
				window.print();
			}
		</script>
		<!----------------------------------------FIM JAVA-------------------------------------------->
		</div>
	</body>
</html>