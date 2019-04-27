<?php
    session_start();

?>

<!DOCTYPE html>
<html lang="PT-BR">
	<head>
        <meta charset="utf-8">
        <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href="../vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
        <link href="../css/sb-admin.css" rel="stylesheet">
        <script type="text" src="Cliente/pace.min.js"></script>
        <title>Página Inicial | Sweet Salty</title>
        <link rel="icon" href="../img/logo.png" type="image/x-icon">
        <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
		<script src="../vendor/jquery/jquery.min.js"></script>
		<script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
		<script src="../vendor/jquery-easing/jquery.easing.min.js"></script>
	</head>
	<body id="page-top">
        <?php include "menuLateral.php"?>
		<br><br><br><center><h1 style="font-family: 'Raleway', sans-serif; font-size:50px; color:#F15821;">Cardápio</h1></center>
        <div class="content-wrapper">
            <div class="container-fluid">
                <div class="card mb-3">
                    <div class="card-header">
                        <div class="card-body">
                            <div class="row " >
                                <div class="col-lg-4 col-md-4 col-sm-4 portfolio-item" style="margin-top:10px;">
                                    <div class="card h-100">
                                        <a href="listasCardapio/listaBebidas.php"><img class="card-img-top" src="img/comidaHome/bebidas.jpeg" alt=""></a>
                                        <div class="card-body">
                                            <h4 class="card-title">
                                                <center>
                                                    <a href="listasCardapio/listaBebidas.php" style="color:#71A140;">Bebidas</a>
                                                </center>
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4 portfolio-item" style="margin-top:10px;">
                                    <div class="card h-100">
                                        <a href="listasCardapio/listaSalgados.php"><img class="card-img-top" src="img/comidaHome/salgado.png" alt=""></a>
                                        <div class="card-body">
                                            <h4 class="card-title">
                                                <center>
                                                    <a href="listasCardapio/listaSalgados.php" style="color:#71A140;">Salgados</a>
                                                </center>
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4 portfolio-item" style="margin-top:10px;">
                                    <div class="card h-100">
                                        <a href="listasCardapio/listaDoces.php"><img class="card-img-top" src="img/comidaHome/doces.jpeg" alt=""></a>
                                        <div class="card-body">
                                            <h4 class="card-title">
                                                <center>
                                                    <a href="listasCardapio/listaDoces.php" style="color:#71A140;">Doces</a>
                                                </center>
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
				        <a class="btn btn-primary" href="../../controller/clienteController/sairController.php">Sair</a>
			        </div>
    		    </div>
	    	</div>
		</div>
        <?php include '../footer.html'?>	
		<script src="../vendor/chart.js/Chart.min.js"></script>
		<script src="../vendor/datatables/jquery.dataTables.js"></script>
		<script src="../vendor/datatables/dataTables.bootstrap4.js"></script>
		<script src="../js/sb-admin.min.js"></script>
		<script src="../js/sb-admin-datatables.min.js"></script>
		<script src="../js/sb-admin-charts.min.js"></script>
	</body>
</html>