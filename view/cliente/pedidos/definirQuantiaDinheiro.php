<?php

    session_start();

    chdir("../");

    include "../../controller/clienteController/verificacaoSessionClienteController.php";
    
    if($v){
        echo "
            <script>
                window.location = '../../logar.php';
            </script>";
        $nomeCompleto = "";
    }else
        $nomeCompleto = $cliente->getNomeCompleto();

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
        <script type="text" src="Cliente/pace.min.js"></script>
        <title>Página Inicial | Sweet Salty</title>
        <link rel="stylesheet" href="../alertifyjs/css/alertify.min.css">
		<link rel="stylesheet" href="../alertifyjs/css/themes/default.min.css">
        <link rel="icon" href="../img/logo-min.png" type="image/x-icon">
        <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
		<script src="../vendor/jquery/jquery.min.js"></script>
        <style>
            .bloco{
                width: 200px;
                margin: auto;
            }
        </style>
	</head>
	<body id="page-top">
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
            <h6 style="padding-top: 5px; color: white;">Sweet Salty | Seja bem vindo(a), <?= $nomeCompleto?></h6>
        </nav>
 
        <div class="content">
            <div class="container">
                <br><br><br><center><h1 style="font-family: 'Raleway', sans-serif; font-size:50px; color:#F15821;">Troco para dinheiro</h1></center>
                <br><br>
                <div class="row mt-5">
                    <div class="col-6">
                        <div class="bloco center-block">
                            <p class="text-left">Troco para (R$):</p>
                            <input type="text" id="quantia">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="bloco center-block">
                            <p class="text-left">Seu troco será:</p>
                            <input type="text" id="troco">
                        </div>
                    </div>
                </div>
                <div class="row mt-5">
                    <div class="col-12 text-center mt-5">
                        <button type="button" class="btn btn-primary btn-lg" onclick="verificarQuantiaDinheiro()">Prosseguir</button>
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
        <script src="../js/jquery.mask.min.js"></script>
        <script>

            total = 0;
            
            $(document).ready(function() {
                $("#quantia").mask("000.00", {
                    reverse : true,
                    placeholder: "R$"
                });

                $("#troco").mask("000.00", {
                    placeholder: "R$"
                });

                verificarQuantiaDinheiro(0);

                $("#quantia").keyup(function() {
                    d = $("#quantia").val();
                    d = parseFloat(d);

                    if(d < total || isNaN(d))
                        $("#troco").val("0.00");
                    else{
                        // console.log(`d = ${d}, total = ${total}, ${d - total}`);

                        troco = d - total;

                        $("#troco").val(troco.toFixed(2));
                    }
                });

            });

            function verificarQuantiaDinheiro() {
                
                quantia = $("#quantia").val();

                $.ajax({
                    url : "../../controller/clienteController/pagamento/definirQuantiaDinheiroController.php",
                    method : "POST",
                    data : {
                        quantia : quantia
                    }
                }).done(function(validado) {

                    if(validado == "true")
                        window.location = "pedidos/pedidoFinalizado.php";
                    else
                        total = parseFloat(validado);
                });
            }
        
        </script>
	</body>
</html>