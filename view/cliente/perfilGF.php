<?php
	session_start();

?>
<!DOCTYPE html>
<html lang="PT-BR">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="icon" href="../img/logo.png" type="image/x-icon">
		<title>Perfil | Sweet Salty</title>
		<link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
		<link href="../vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
		<link href="../css/sb-admin.css" rel="stylesheet">
	</head>
	<body>
		<?php include 'menuLateral.php'?>	
		<br><br><br><br><center><h1>Editar Perfil</h1></center>
		<div class="content-wrapper">
	    	<div class="container-fluid">
				<div class="card mb-3">
	        		<div class="card-header">
	        			<div class="card-body">
	          				<div class="table-responsive">
								<form method="POST" action="../../controller/clienteController/editarPerfilGFController.php">
									<div class="col-sm-12">
										<div class="row">
											<div class="col-lg-6 col-sm-12 form-group">
												<label>Nome completo</label>
												<input type="text"  name="nomeCompleto" class="form-control" value="<?= $cliente->getNomeCompleto()?>" required>
											</div>
											<div class="col-lg-6 col-sm-12 form-group">
												<label>E-mail</label>
												<input type="email" name="email" class="form-control" class="form-control" required value="<?= $cliente->getEmail()?>">
											</div>	
										</div>					
										<div class="row">
											<div class="col-lg-4 col-sm-12 form-group">
												<label>Sexo</label><br>
												<input type="radio" name="sexo" <?php if($cliente->getSexo() == 'F') echo 'checked'?> value='F'>Feminino &nbsp&nbsp
												<input  type="radio" name="sexo" <?php if($cliente->getSexo() == 'M') echo 'checked'?> value='M'>Masculino
											</div>
											<div class="col-lg-4 col-sm-6 form-group">
												<label>Telefone Celular</label>
												<input type="text" name="numeroTelefone" class="form-control" required value="<?= $cliente->getNumeroTelefone()?>" maxlenght="14">
											</div>
											<div class="col-lg-4 col-sm-6 form-group">
												<label>Data de Nascimento</label>
												<input type="date" name="dataNascimento"  class="form-control" required value="<?= $cliente->getDataNascimento()?>">
											</div>
										</div>
										<center>
											<input class="btn btn-primary btn-block" style="width:100px;" class="btn btn-info btn-lg" type="submit" name="salvar" value="Salvar">	
										</center>
									</form>
								</div>
							</div>
						</div>
   					</div>
	    		</div>
	    	</div>
    	</div>
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
		<a class="scroll-to-top rounded" href="#page-top">
		  	<i class="fa fa-angle-up"></i>
		</a>
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
						<a class="btn btn-primary" href="../logout.php">Sair</a>
					</div>
				</div>
			</div>
		</div>
		<?php include '../footer.html'?>	
		<script src="../vendor/jquery/jquery.min.js"></script>
		<script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
		<script src="../vendor/jquery-easing/jquery.easing.min.js"></script>
		<script src="../vendor/chart.js/Chart.min.js"></script>
		<script src="../vendor/datatables/jquery.dataTables.js"></script>
		<script src="../vendor/datatables/dataTables.bootstrap4.js"></script>
		<script src="../js/sb-admin.min.js"></script>
		<script src="../js/sb-admin-datatables.js"></script>
		<script src="../js/sb-admin-charts.min.js"></script>
	</body>
</html>