<?php

session_start();

# muda o diretorio para cliente
chdir('../');

include "../../controller/clienteController/verificacaoSessionClienteController.php";

if($v)
    header("Location: ../../logar.php");


?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <link href="../../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link rel="icon" href="../../img/logo.png" type="image/x-icon">
        <title>Mesas | Sweet Salty</title>
        <link href='mesaStyle.css' rel='stylesheet'>
        <link rel="stylesheet" href="../../alertifyjs/css/alertify.min.css">
		<link rel="stylesheet" href="../../alertifyjs/css/themes/default.min.css">
        <script src="../../vendor/jquery/jquery.min.js"></script>
        <script src="../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="../../vendor/jquery-easing/jquery.easing.min.js"></script>
        <script src="../../alertifyjs/alertify.min.js"></script>
    </head>
    <body style="background-color:#FFF">
        <div class="topo">
            <p class="titulo">Se estiver usando mais de uma mesa, solicite a junção delas</p>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-6 col-md-3 text-center" data-toggle="tooltip">
                    <button onclick="enviarSolicitacao(1)" class="objeto">
                        <img src="imgMesas/mesa1.svg">
                    </button>
                </div>
                <div class="col-6 col-md-3 text-center">
                    <button onclick="enviarSolicitacao(2)" class="objeto">
                        <img src="imgMesas/mesa2.svg">
                    </button>
                </div>
                <div class="col-6 col-md-3 text-center">
                    <button onclick="enviarSolicitacao(3)" class="objeto">
                        <img src="imgMesas/mesa3.svg">
                    </button>
                </div>                
                <div class="col-6 col-md-3 text-center">
                    <button onclick="enviarSolicitacao(4)" class="objeto">
                        <img src="imgMesas/mesa4.svg">
                    </button>
                </div>
            </div>
        </div>
        <script>
            function enviarSolicitacao(mesa){
                $.ajax({
                    url : "../../../controller/clienteController/juncaoMesas/solicitarJuncaoMesaController.php",
                    method : "POST",
                    data : {
                        mesa : mesa
                    }
                }).done(function(v) {
                    if(v == "true")
                        alertaSolicitacaoEnviada();
                    else
                        alertaMesaDesocupada();
                });
            }

            function alertaMesaDesocupada() {
                alertify.alert("Mesa desocupada", "Essa mesa não está sendo usada").set({
                    transition : "zoom",
                    'movable' : false
                });
            }
            function alertaSolicitacaoEnviada(){
                alertify.alert("Solicitação enviada", "Espere até que a outra mesa aceite",function(){
                    window.location = "../"; 
                }).set({
                    transition : "zoom",
                    'movable' : false
                });
            }
        </script>
    </body>
</html>
