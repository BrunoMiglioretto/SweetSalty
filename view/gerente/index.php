<?php
	session_start();

?>

<!DOCTYPE html>
<html lang="PT-BR">
	<head>
	    <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="icon" href="../img/logo-min.png" type="image/x-icon">
        <title>Gerente | Sweet Salty</title>
        <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href="../vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
        <link href="../css/sb-admin.css" rel="stylesheet">
	</head>
	<body id="page-top">
		<?php include 'menuLateral.php'?>
		<br><br><br>
		<div class="content-wrapper">
    		<div class="container-fluid">
				<center><h1>Painel Geral</h1></center>
                <div class="card mb-3">
              		<div class="card-header">
        				<div class="card-body">
              				<div class="table-responsive">
								<ul class="list-group" style="width:100%;">
									<a href="crudFuncionario/listaFuncionarios.php" style="color:#000;">
										<li class="list-group-item d-flex justify-content-between align-items-center">
											Funcionários
										</li>
									</a>
									<a href="crudCliente/listaClientes.php" style="color:#000;">
										<li class="list-group-item d-flex justify-content-between align-items-center">
											Clientes
										</li>
									</a>
									<a href="lista_clientes.php" style="color:#000;">
										<li class="list-group-item d-flex justify-content-between align-items-center">
											Cardápio
										</li>
									</a>
								</ul>
							</div>
						</div>
                    </div>
   				</div>
    		</div>
    	</div>
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
                        <a class="btn btn-primary" href="../../controller/sairFuncionarioController.php">Sair</a>
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
		<script src="../js/sb-admin-datatables.min.js"></script>
		<script src="../js/sb-admin-charts.min.js"></script>
		<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
	</body>
</html>