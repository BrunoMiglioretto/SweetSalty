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
        <link rel="icon" href="../../img/logo-min.png" type="image/x-icon">
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
            <p class="titulo trn">Em qual mesa você está?</p>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-6 col-md-3 text-center" data-toggle="tooltip">
                    <button onclick="enviarMesa(1)" class="objeto">
                        <img src="imgMesas/mesa1.svg">
                    </button>
                </div>
                <div class="col-6 col-md-3 text-center">
                    <button onclick="enviarMesa(2)" class="objeto">
                        <img src="imgMesas/mesa2.svg">
                    </button>
                </div>
                <div class="col-6 col-md-3 text-center">
                    <button onclick="enviarMesa(3)" class="objeto">
                        <img src="imgMesas/mesa3.svg">
                    </button>
                </div>                
                <div class="col-6 col-md-3 text-center">
                    <button onclick="enviarMesa(4)" class="objeto">
                        <img src="imgMesas/mesa4.svg">
                    </button>
                </div>
            </div>
        </div>
        <script src="../../dicionario/jquery.translate.js"></script>
        <script src="../../dicionario/loginCadastroManualCliente.js"></script>
        <script>
            function enviarMesa(mesa){
                $.ajax({
                    url : "../../../controller/clienteController/mesa/escolherMesaController.php",
                    method : "POST",
                    data : {
                        mesa : mesa
                    }
                }).done(function(v) {
                    if(v == "true")
                        window.location = "../";
                    else
                        alertaMesaOcupada();
                    console.log(v);
                });
            }

            function alertaMesaOcupada() {
                alertify.alert("Mesa ocupada", "Essa mesa já esta sendo usada ").set({
                    transition : "zoom",
                    'movable' : false
                });
            }

            $(document).ready(function() {
                var translator = $('body').translate({lang: "<?= $_SESSION["linguagem"]?>", t: dict});
            });
        </script>
    </body>
</html>
