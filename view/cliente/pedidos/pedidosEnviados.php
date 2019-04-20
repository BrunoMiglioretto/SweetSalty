<?php
    session_start();

    chdir("../");
?>		
<!DOCTYPE html>
<html lang="PT-BR">
	<head>
        <meta charset="utf-8">
        <base href="../">
        <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href="../vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
        <link href="../css/sb-admin.css" rel="stylesheet">
        <link rel="icon" href="../img/logo.png" type="image/x-icon">
        <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">		
		<title>Pedidos | Sweet Salty</title>
	    <script src="https://code.jquery.com/jquery-2.1.0.min.js"></script>
		<script src="../vendor/jquery/jquery.min.js"></script>
		<script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
		<script src="../vendor/jquery-easing/jquery.easing.min.js"></script>
        <script src="../alertifyjs/alertify.min.js"></script>
		<link rel="stylesheet" href="../alertifyjs/css/alertify.min.css">
		<link rel="stylesheet" href="../alertifyjs/css/themes/default.min.css">
	    <script>

            function mostrarPedidosEnviados(){
                $.ajax({
                    url : "../../controller/clienteController/carrinho/visualizarPedidosEnviadosController.php"
                }).done(function(pedidos) {
                    $("#tabelaPedidosEnviados").html(pedidos);
                });
            }

            $(document).ready(function() {
                mostrarPedidosEnviados();
            });
            
        </script>
        <style>
    	    .dataTables_filter, .dataTables_length, .dataTables_info, .pagination{
    		    visibility: hidden!important;
    	    }
            .inputQuant{
                border: 0;
                background-color: transparent;
                width: 100%;
                padding-left: 3px;
            }
        </style>
	</head>
	<body id="page-top">
        <?php include 'menuLateral.php' ?>
        <div class="content-wrapper">
            <div class="container-fluid">
                <br><br><br><center><h1 style="font-family: 'Raleway', sans-serif; font-size:50px; color:#F15821;">Itens já enviados</h1></center>
                <div class="card">
        			<div class="card-header">
        				<div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Pedido</th>
                                            <th>Categoria</th>
                                            <th>Quantidade</th>
                                            <th>Valor unitário</th>
                                            <th>Situação</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tabelaPedidosEnviados">
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><br><br><br>
		<a class="scroll-to-top rounded" href="#page-top">
		    <i class="fa fa-angle-up"></i>
		</a>

        <!-- Modal sair -->
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
                        <a class="btn btn-primary" href="../../controller/clienteController/sairController.php">Sair</a>
                    </div>
                </div>
            </div>
        </div>
        <?php include '../footer.html' ?>	
		<script src="../vendor/chart.js/Chart.min.js"></script>
		<script src="../vendor/datatables/jquery.dataTables.js"></script>
		<script src="../vendor/datatables/dataTables.bootstrap4.js"></script>
		<script src="../js/sb-admin.min.js"></script>
		<script src="../js/sb-admin-datatables.min.js"></script>
		<script src="../js/sb-admin-charts.min.js"></script>
	</body>
</html>