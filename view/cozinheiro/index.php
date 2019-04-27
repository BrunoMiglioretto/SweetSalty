<!DOCTYPE html>
<html lang="PT-BR">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="icon" href="../img/logo.png" type="image/x-icon">
		<title>Cozinha | Sweet Salty</title>
		<link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
		<link href="../vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
		<link href="../css/sb-admin.css" rel="stylesheet">
	</head>
	<body>
		<?php include 'menuLateral.php'?>	
		<br><br><br>
		<div class="container-fluid" class='print'>
    		<div class="card-header">		
    			<center><h5>Pedidos</h5></center>
  			</div>
    		<div class="card-body" class='print'>
    			<div class="table-responsive" class='print' style="margin-top: 15px;">
        			<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" class='print'>
						<thead>
              				<tr>
								<th>Numero</th>
								<th>Pedido</th>
								<th>Quantidade</th>
								<th>Unidade</th>
								<th>Finalizar</th>
				       		</tr>
			     		</thead>
					    <tbody>
							<div class='modal fade' id='' tabindex='-1' role='dialog' aria-labelledby='exampleModalCenterTitle' aria-hidden='true'>
								<div class='modal-dialog modal-dialog-centered' role='document'>
									<div class='modal-content'>
										<div class='modal-header'>
											<h5 class='modal-title' id='exampleModalLongTitle'>Finalizar</h5>
											<button type='button' class='close' data-dismiss='modal' aria-label='Close'>
												<span aria-hidden='true'>&times;</span>
											</button>
										</div>
										<div class='modal-body'>
											Deseja finalizar $Pedido?
										</div>
										<div class='modal-footer'>
											<button type='button' class='btn btn-secondary' data-dismiss='modal'>Cancelar</button>
											<button type='button' class='btn btn-primary' data-dismiss='modal'>Finalizar</button>
										</div>
									</div>
								</div>
							</div>
            			</tbody>
    				</table>
  				</div>
			</div>
		</div>
		<br><br><br><br>			
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
	</body>
</html>
