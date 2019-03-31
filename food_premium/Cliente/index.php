<?php 
	session_start();
	if(!isset($_SESSION["id_cliente"])){
		header("Location: ../logar.php");
	}
?>
<!DOCTYPE html>
<html lang="PT-BR">
	<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-----------------------------------------TODOS CSS----------------------------------------->
        <!-- Bootstrap CSS-->
        <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <!--Template-->
        <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <!-- Pageina CSS-->
        <link href="../vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
        <!-- Estilo Template-->
        <link href="../css/sb-admin.css" rel="stylesheet">
        <script type="text" src="Cliente/pace.min.js"></script>
        <title>Página Inicial | Sweet Salty</title>
        <link rel="icon" href="../img/logo.png" type="image/x-icon">
        <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
        <!-- Bootstrap core JavaScript-->
		<script src="../vendor/jquery/jquery.min.js"></script>
		<script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
		<!-- Core plugin JavaScript-->
		<script src="../vendor/jquery-easing/jquery.easing.min.js"></script>
        <!--------------------------------------FIM DE TODOS CSS-------------------------------------->
	</head>
	<body id="page-top">
		<!--------------------------------------INCLUDE MENU---------------------------------------->
        <?php include "../Menu_Lateral/Menu_Cliente.php" ?>
		<!----------------------------------------FIM INCLUDE--------------------------------------->
		<!-------------------------------------------CONTEUDO--------------------------------------->
		<br><br><br><center><h1 style="font-family: 'Raleway', sans-serif; font-size:50px; color:#F15821;">Cardápio</h1></center>
        <div class="content-wrapper">
            <div class="container-fluid">
                <div class="card mb-3">
                    <div class="card-header">
                        <div class="card-body">
                            <div class="row " >
                                <div class="col-lg-4 col-md-4 col-sm-4 portfolio-item" style="margin-top:10px;">
                                    <div class="card h-100">
                                        <a href="lista_bebidas.php"><img class="card-img-top" src="../img/bebidas.jpeg" alt=""></a>
                                        <div class="card-body">
                                            <h4 class="card-title">
                                                <center>
                                                    <a href="lista_bebidas.php" style="color:#71A140;">Bebidas</a>
                                                </center>
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4 portfolio-item" style="margin-top:10px;">
                                    <div class="card h-100">
                                        <a href="lista_salgados.php"><img class="card-img-top" src="../img/salgado.png" alt=""></a>
                                        <div class="card-body">
                                            <h4 class="card-title">
                                                <center>
                                                    <a href="lista_salgados.php" style="color:#71A140;">Salgados</a>
                                                </center>
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4 portfolio-item" style="margin-top:10px;">
                                    <div class="card h-100">
                                        <a href="lista_doces.php"><img class="card-img-top" src="../img/doces.jpeg" alt=""></a>
                                        <div class="card-body">
                                            <h4 class="card-title">
                                                <center>
                                                    <a href="lista_doces.php" style="color:#71A140;">Doces</a>
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
		<!---------------------------------------FIM CONTEUDO--------------------------------------->
		<!-------------------------------- Botão de voltar ao topo---------------------------------->
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
				        <a class="btn btn-primary" href="../logout.php">Sair</a>
			        </div>
    		    </div>
	    	</div>
		</div>
		<!------------------------------FIM Botão de voltar ao topo---------------------------------->
		<!--------------------------------------INCLUDE FOOTER--------------------------------------->
        <?php include '../Menu_Lateral/footer.html' ?>	
		<!----------------------------------------FIM INCLUDE---------------------------------------->
		<!------------------------------------------- JAVA------------------------------------------->
		<!-- Page level plugin JavaScript-->
		<script src="../vendor/chart.js/Chart.min.js"></script>
		<script src="../vendor/datatables/jquery.dataTables.js"></script>
		<script src="../vendor/datatables/dataTables.bootstrap4.js"></script>
		<!-- Custom scripts for all pages-->
		<script src="../js/sb-admin.min.js"></script>
		<!-- Custom scripts for this page-->
		<script src="../js/sb-admin-datatables.min.js"></script>
		<script src="../js/sb-admin-charts.min.js"></script>
		<!----------------------------------------FIM JAVA-------------------------------------------->
	</body>
</html>