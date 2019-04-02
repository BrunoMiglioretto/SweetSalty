<!DOCTYPE html>
<?php
	$idGet = $_GET['id_funcionario'];
	include "../../Funcoes/conexao.php";
	$sql = "SELECT * FROM tb_funcionario WHERE id_funcionario = $idGet";
	$contatos = $fusca -> prepare($sql);
	$contatos -> execute();
			
	foreach($contatos as $edita){
		
		if(isset($_POST['salvar'])){
			$cargo  		=  $_POST["Cargo"]; 
			$nome 			=  $_POST["Nome"]; 
			$sobrenome  =  $_POST["Sobrenome"]; 
			$email 			=  $_POST["Email"]; 
			$tel_resi  	=  $_POST["Telefone_residencial"]; 
			$tel_cel  	=  $_POST["Telefone_celular"]; 
			$CPF  			=  $_POST["CPF"]; 
			$RG  				=  $_POST["RG"]; 
			$senha  		=  $_POST["Senha"];
			$senhaConfirma 	=	 $_POST["senha_confirma"];
			
			if (1) {	
			$query = "UPDATE tb_funcionario SET
									Cargo='$cargo',
									Nome='$nome',
									Sobrenome='$sobrenome',
									Email='$email',
									Telefone_residencial='$tel_resi',
									Telefone_celular='$tel_cel',
									CPF='$CPF',
									RG='$RG',
									Senha='$senha'
							 	WHERE id_funcionario = '$idGet'";
			$sql = $fusca -> prepare($query);
			$sql -> execute();			
			$sql = null;
			
			echo "<script>
					alert('Colaborador editado com sucesso!');
					window.location.href=' ../Lista_Funcionarios.php';
				</script>";
			} else {
            
            echo "<script>
							alert('As senhas não conferem!');
							window.location.href='Editar_Funcionario.php?id_funcionario=$idGet';
						</script>";
						
        }
		}
	}
?>
<html lang="PT-BR">
	<head>
	  <meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	  <link rel="icon" href="../../img/logo.png" type="image/x-icon">
	  <title>Editar | Sweet Salty</title>
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
		<br><br><br><br><center><h1>Editar Colaborador</h1></center>
		<div class="content-wrapper">
	    <div class="container-fluid">
				<div class="card mb-3">
	        <div class="card-header">
	        <div class="card-body">
	          <div class="table-responsive">
												<form method="POST" action="">
													<div class="col-sm-12">
														<div class="row">
															<div class="col-sm-6 form-group">
																<label>Nome</label>
																<input type="text" placeholder="Nome" name="Nome" class="form-control" required value="<?PHP echo $edita['Nome'];?>">
															</div><div class="col-sm-6 form-group">
																<label>Sobrenome</label>
																<input type="text" placeholder="Sobrenome" name="Sobrenome" class="form-control" required value="<?PHP echo $edita['Sobrenome'];?>">
															</div>
														</div>					
														<div class="row">
															<div class="col-sm-4 form-group">
															 <label>E-mail</label>
																<input type="email" placeholder="Email" name="Email" class="form-control" class="form-control" required value="<?PHP echo $edita['Email'];?>">
															</div>	
															<div class="col-sm-4 form-group">
																	<label>Telefone Residencial</label>
																	<input type="text" placeholder="Telefone Residencial" name="Telefone_residencial"  class="form-control" required value="<?PHP echo $edita['Telefone_residencial'];?>">
															</div>		
															<div class="col-sm-4 form-group">
																<label>Telefone Celular</label>
																<input type="text" placeholder="Telefone Celular" name="Telefone_celular"  class="form-control" required value="<?PHP echo $edita['Telefone_celular'];?>">
															</div>		
														</div>
														<div class="row">
														<div class="col-sm-4 form-group">
																<label>RG</label>
																<input type="text" placeholder="RG" name="RG"  class="form-control" readonly="readonly" required value="<?PHP echo $edita['RG'];?>">
														</div>
														<div class="col-sm-4 form-group">
																<label>CPF</label>
																<input type="text" placeholder="CPF" name="CPF"  class="form-control" readonly="readonly" required value="<?PHP echo $edita['CPF'];?>">
														</div>
														
															<div class="col-sm-4 form-group">
																<label>Cargo</label>
															   	<select name='Cargo' class="form-control" required value="<?PHP echo $edita['Cargo'];?>">
																		<option <?PHP if($edita['Cargo'] == 'Caixa'){ 			echo "selected";}?>   value='Caixa'>Caixa</option>
																		<option <?PHP if($edita['Cargo'] == 'Cozinha'){			echo "selected";}?>   value='Cozinha'>Cozinha</option>
																		<option <?PHP if($edita['Cargo'] == 'Fornecedor'){	echo "selected";}?>   value='Fornecedor'>Fornecedor</option>
																		<option <?PHP if($edita['Cargo'] == 'Garçom'){			echo "selected";}?>   value='Garçom'>Garçom</option>
																		<option <?PHP if($edita['Cargo'] == 'Recepção'){		echo "selected";}?>   value='Recepção'>Recepção</option>
																		<option <?PHP if($edita['Cargo'] == 'Gerente'){		echo "selected";}?>   value='Gerente'>Gerente</option>
																	
																	</select> 
															</div>			
														</div>
																<input type="hidden" placeholder="Senha" name="Senha"  class="form-control" required value="<?PHP echo $edita['Senha'];?>">
														<input class="btn btn-primary" type="submit" name="salvar" value="Salvar" style="width: 100px;float: left;">
													</div>
												</form>
										</div>
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