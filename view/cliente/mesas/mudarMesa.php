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
        <link href='mesas/mesaStyle.css' rel='stylesheet'>
        <link rel="stylesheet" href="../alertifyjs/css/alertify.min.css">
		<link rel="stylesheet" href="../alertifyjs/css/themes/default.min.css">
        <script type="text" src="Cliente/pace.min.js"></script>
        <title>Página Inicial | Sweet Salty</title>
        <link rel="icon" href="../img/logo-min.png" type="image/x-icon">
        <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
		<script src="../vendor/jquery/jquery.min.js"></script>
		<script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
		<script src="../vendor/jquery-easing/jquery.easing.min.js"></script>
        <script src="../alertifyjs/alertify.min.js"></script>
	</head>
	<body id="page-top">
        <?php include "menuLateral.php"?>
        <div class="content-wrapper">
            <div class="container-fluid">
                <br><br><br><center><h1 style="font-family: 'Raleway', sans-serif; font-size:50px; color:#F15821;">Mudar de mesa</h1></center>
                <br><br>
                <div class="row" >
                    <div class="col-lg-3 col-sm-6 text-center">
                        <div class="mesaJuntar">
                            <img src="mesas/imgMesas/mesa1.svg" onclick="mudarMesa(1)">
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 text-center">
                        <div class="mesaJuntar">
                            <img src="mesas/imgMesas/mesa2.svg" onclick="mudarMesa(2)">
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 text-center">
                        <div class="mesaJuntar">
                            <img src="mesas/imgMesas/mesa3.svg" onclick="mudarMesa(3)">
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 text-center">
                        <div class="mesaJuntar">
                            <img src="mesas/imgMesas/mesa4.svg" onclick="mudarMesa(4)">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <br>
        <br>
        <br>
        <br>
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
        <script>
            function mudarMesa(mesa){
                $.ajax({
                    url : "../../controller/clienteController/mesa/mudarMesaController.php",
                    method : "POST",
                    data : {
                        mesa : mesa
                    }
                }).done(function(v) {
                    if(v == "true")
                        alertaMudarMesa();
                        // window.location = "index.php";
                    if(v == "false")
                        alertaMesaOcupada();
                });
            }

            function alertaMesaOcupada() {
                alertify.alert("Mesa ocupada", "Essa mesa já esta sendo usada ").set({
                    transition : "zoom",
                    'movable' : false
                });
            }

            function alertaMudarMesa(){
                alertify.alert("Mudando de mesa", "Mudança de mesa efetuada com sucesso.").set({
                        transition:"zoom",
                        'movable' : false,
                    });
            }
        </script>
	</body>
</html>