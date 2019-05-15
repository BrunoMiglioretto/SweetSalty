<?php
	session_start();

	chdir("../");

?>

<!DOCTYPE html>
<html lang="PT-BR">
	<head>
		<base href="../">
		<meta charset="utf-8">
	  	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	   	<link rel="icon" href="../img/logo.png" type="image/x-icon">
	  	<title>Cadastro de Coraborador</title>
		<link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
		<link href="../vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
		<link href="../css/sb-admin.css" rel="stylesheet">
		<style>
			.btn{
				float:right;
				background:#71A140;
				color:#fff;
			}
		</style>
	</head>
	<body id="page-top">
		<?php include 'menuLateral.php'?>	
		<br><br><br><br><center><h1>Novo Funcionário</h1></center>
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
												<input type="text" name="nome" placeholder="Nome Completo" class="form-control" required autofocus>
											</div>
											<div class="col-sm-6 form-group">
												<label>E-mail</label>
												<input type="email" name="email" placeholder="Insira o e-mail" class="form-control" required>
											</div>	
										</div>					
										<div class="row">
											<div class="col-sm-4 form-group">
												<label>Telefone</label>
												<input type="text" name="numero" placeholder="Ex: (41) 9999-9999" class="form-control" onkeypress="return valTELEFONECELULAR(event,this); return false;" maxlength="14" title="(##)#####-####">
											</div>		
											<div class="col-sm-4 form-group">
												<label>RG</label>
												<input type="text" name="rg" placeholder="00.000.000-0" class="form-control" maxlength="12" required>
											</div>		
											<div class="col-sm-4 form-group">
												<label>CPF</label>
												<input type="text" name="cpf" placeholder="000.000.000-00" class="form-control" maxlength="14" required>
											</div>	
										</div>
										<div class="row">
											<div class="col-sm-4 form-group">
												<label>Cargo</label>
												<select name="cargo" placeholder="Cargo do funcionário" class="form-control" required>
													<option></option>
													<option>Caixa</option>
													<option>Cozinha</option>
													<option>Fornecedor</option>
													<option>Garçom</option>
													<option>Recepção</option>
												</select>
											</div>
											<div class="col-sm-4 form-group">
												<label>Senha</label>
												<input type="password" name="senha" placeholder="mínimo de 8 caracteres" class="form-control" maxlength="12" required>
											</div>	
											<div class="col-sm-4 form-group">
												<label>Confirmar senha</label>
												<input type="password" placeholder="" id="senha_confirma" name="senha_confirma"  class="form-control" required>
											</div>
										</div>
										<center>
											<input class="btn" type="submit" name="salvar" value="Salvar" style="width: 100px; float: left;">				
										</center>
									</div>
								</form>
							</div>
						</div>
					</div>
   				 </div>
    		</div>
    	</div><br><br><br>
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
		</div>
		<?php include '../footer.html' ?>	
		<script type="text/javascript">
		</script>
		<script src="../vendor/jquery/jquery.min.js"></script>
		<script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
		<script src="../vendor/jquery-easing/jquery.easing.min.js"></script>
		<script src="../vendor/chart.js/Chart.min.js"></script>
		<script src="../vendor/datatables/jquery.dataTables.js"></script>
		<script src="../vendor/datatables/dataTables.bootstrap4.js"></script>
		<script src="../js/sb-admin.min.js"></script>
		<script src="../js/sb-admin-datatables.min.js"></script>
		<script src="../js/sb-admin-charts.min.js"></script>
		<script src="../js/jquery.mask.min.js"></script>
		<script>
			$('input[name=cpf]').mask('000.000.000-00', {reverse: true});
			$('input[name=rg]').mask('00.000.000-0', {reverse: true});
			$('input[name=numero]').mask('(00) 00000-0000');
		</script>
	</body>
</html>