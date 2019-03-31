<!DOCTYPE html>
<?php
	$idGet = $_GET['id_produto'];
	include "../../Funcoes/conexao.php";
	$sql = "SELECT * FROM tb_estoque WHERE id_produto = $idGet";
	$contatos = $fusca -> prepare($sql);
	$contatos -> execute();
			
	foreach($contatos as $edita){
		
		if(isset($_POST['salvar'])){
			$Tipo_produto  		=  $_POST["Tipo_produto"]; 
			$Qtd_produto 			=  $_POST["Qtd_produto"]; 
			$Qtd_minima 		  =  $_POST["Qtd_minima"]; 
			$Qtd_maxima 			=  $_POST["Qtd_maxima"]; 
			$Descricao  			=  $_POST["desc"]; 
			$Validade  		 		=  $_POST["Validade"]; 
			$Custo  					=  $_POST["Custo"]; 
			$Unidade  				=  $_POST["Unidade"]; 
			$id_fornecedor  	=  $_POST["fornecedor"]; 
				
			$query = 
				"UPDATE tb_estoque SET 
					Tipo_produto='$Tipo_produto',
					Qtd_produto='$Qtd_produto',
					Qtd_minima='$Qtd_minima',
					Qtd_maxima='$Qtd_maxima',
					Descricao='$Descricao',
					Validade='$Validade',
					Custo='$Custo',
					Unidade='$Unidade',
					id_fornecedor='$id_fornecedor'
		 		WHERE id_produto = '$idGet'";
			$sql = $fusca -> prepare($query);
			$sql -> execute();			
			$sql = null;
			
			echo "<script>
					alert('Produto editado com sucesso!');
					window.location.href='logar.php';
				</script>";
				
			header("location: ../Estoque.php");
			
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
	<body>
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
															<div class="col-sm-4 form-group">
																<label>Produto</label>
																<input type="text" placeholder="Descrição" name="desc" class="form-control" required value="<?PHP echo $edita['Descricao'];?>">
															</div>
															<div class="col-sm-4 form-group">
																<label>Tipo</label>
																	<select name='Tipo_produto' required value="<?PHP echo $edita['Tipo_produto'];?>" class="form-control">
																		<option <?PHP if($edita['Tipo_produto'] == 'Fruta'){ 			echo "selected";}?>   value='Fruta'>Fruta</option>
																		<option <?PHP if($edita['Tipo_produto'] == 'Verdura'){		echo "selected";}?>   value='Verdura'>Verdura</option>
																		<option <?PHP if($edita['Tipo_produto'] == 'Legume'){			echo "selected";}?>   value='Legume'>Legume</option>
																		<option <?PHP if($edita['Tipo_produto'] == 'Grão'){				echo "selected";}?>   value="Grão">Grão</option>
																		<option <?PHP if($edita['Tipo_produto'] == 'Carne'){			echo "selected";}?>   value="Carne">Carne</option>
																		<option <?PHP if($edita['Tipo_produto'] == 'Bebida'){ 		echo "selected";}?>   value='Bebida'>Bebida</option>
																		<option <?PHP if($edita['Tipo_produto'] == 'Conserva'){		echo "selected";}?>   value='Conserva'>Conserva</option>
																		<option <?PHP if($edita['Tipo_produto'] == 'Doce'){				echo "selected";}?>   value='Doce'>Doce</option>
																		<option <?PHP if($edita['Tipo_produto'] == 'Farinhas'){		echo "selected";}?>   value="Farinha">Farinha</option>
																		<option <?PHP if($edita['Tipo_produto'] == 'Frio'){				echo "selected";}?>   value="Frio">Frio</option>
																		<option <?PHP if($edita['Tipo_produto'] == 'Massa'){ 			echo "selected";}?>   value='Massa'>Massa</option>
																		<option <?PHP if($edita['Tipo_produto'] == 'Derivado'){		echo "selected";}?>   value='Derivado'>Derivado</option>
																		<option <?PHP if($edita['Tipo_produto'] == 'Congelado'){	echo "selected";}?>   value='Congelado'>Congelado</option>
																		<option <?PHP if($edita['Tipo_produto'] == 'Tempero'){		echo "selected";}?>   value="Tempero">Tempero</option>
																	</select>
															</div>	
																	<div class="col-sm-4 form-group">
																<label>Fornecedor</label>
																	<select name="fornecedor"  class="form-control"  value="<?PHP echo $edita['id_fornecedor'];?>">
																    <?php
																    	$sql2 = "SELECT * FROM tb_funcionario WHERE Cargo = 'Fornecedor'";
																			include "../Funcoes/conexao.php";
																			$fornec = $fusca -> prepare($sql2);
																			$fornec-> execute();
																    
																    		foreach($fornec as $f){
																	    		$for = $f['Nome'];
																	    		$fornecedor = $f['id_funcionario'];
																	    		if($fornecedor == $id_fornecedor){
																	    			$selecionado = "selected";
																	    		}else{
																	    			$selecionado = "$id_fornecedor";
																	    		}
																	    		echo "<option value='$fornecedor'	$selecionado>".$for."</option>";
																	    	}
																		?>
																</select>
															</div>
														</div>					
														<div class="row">
															<div class="col-sm-4 form-group">
															 <label>Em estoque</label>
																<input type="text" placeholder="Em estoque" name="Qtd_produto" class="form-control" class="form-control" required value="<?PHP echo $edita['Qtd_produto'];?>">
															</div>	
															<div class="col-sm-4 form-group">
																	<label>Mínimo</label>
																	<input type="text" placeholder="Mínimo" name="Qtd_minima"  class="form-control" required value="<?PHP echo $edita['Qtd_minima'];?>">
															</div>		
															<div class="col-sm-4 form-group">
																<label>Máximo</label>
																<input type="text" placeholder="Máximo" name="Qtd_maxima"  class="form-control" required value="<?PHP echo $edita['Qtd_maxima'];?>">
															</div>		
														</div>
														<div class="row">
															<div class="col-sm-4 form-group">
																<label>Unidade</label>
															   	<select name='Unidade' class="form-control" required value="<?PHP echo $edita['Unidade'];?>">
																		<option <?PHP if($edita['Unidade'] == 'Peça'){ 				echo "selected";}?>   value='Peça'>Peça</option>
																		<option <?PHP if($edita['Unidade'] == 'Litros'){			echo "selected";}?>   value='Litros'>Litros</option>
																		<option <?PHP if($edita['Unidade'] == 'Gramas'){			echo "selected";}?>   value='Gramas'>Gramas</option>
																		<option <?PHP if($edita['Unidade'] == 'Quilograma'){	echo "selected";}?>   value='Quilograma'>Quilogramas</option>
																		<option <?PHP if($edita['Unidade'] == 'Minilitros'){	echo "selected";}?>   value='Minilitros'>Minilitros</option>
																	</select> 
															</div>			
															<div class="col-sm-4 form-group">
																<label>Custo</label>
																	<input type="text" placeholder="Custo" name="Custo" class="form-control" required value="<?PHP echo $edita['Custo'];?>">
															</div>	
															<div class="col-sm-4 form-group">
																<label>Validade</label>
																<input type="date" placeholder="Validade" name="Validade" class="form-control" required value="<?PHP echo $edita['Validade'];?>">
															</div>	
														</div>						
														<input class="btn btn-primary" type="submit" name="salvar" value="Salvar" style="width: 100px; float: left;">				
													</div>
												</form>
										</div><br>
									</div>
								</div>
	   				 </div>
	    		</div>
	    	</div>
    </div>
	
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