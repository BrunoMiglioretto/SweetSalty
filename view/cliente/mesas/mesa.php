<?php

session_start();

# muda o diretorio para cliente
chdir('../');

include "../../controller/clienteController/verificacaoSessionCliente.php";

?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <link href="../../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link rel="icon" href="../../img/logo.png" type="image/x-icon">
        <title>Mesas | Sweet Salty</title>
        <link href='mesaStyle.css' rel='stylesheet'>
    </head>
    <body style="background-color:#FFF">
        <div class="topo">
            <p class="titulo">Em qual mesa você está?</p>
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
        <script>
            function enviarMesa(mesa){
                url = '../../../controller/clienteController/escolherMesaController.php?m=' + mesa;
                window.location = url; 
            }
        </script>
    </body>
</html>
