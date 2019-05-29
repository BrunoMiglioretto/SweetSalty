<?php

session_start();

include "verificacaoSessionClienteController.php";
include "../../model/Cliente/Mesa.class.php";
include "../../model/Conexao.class.php";
include "../../model/Cliente/JuntadorMesas.class.php";

if(isset($_SESSION["juntadorMesas"])){
    $juntadorMesas = unserialize($_SESSION["juntadorMesas"]);
    $juntadorMesas->cancelarSolicitacao();
}

$mesa = unserialize($_SESSION["mesa"]);

$mesa->sairMesa();

$cliente = unserialize($_SESSION["usuario"]);

$tipo = get_class($cliente);

session_destroy();

session_start();

$_SESSION["linguagem"] = "pt";

echo "
    <script>
            
        function abrirJanela() {
            var myWindow = window.open('https://accounts.google.com/Logout', 'Google LogOut', 'width=300,height=500');
            
            setTimeout(function() {
                myWindow.close();
                madarParaLogin();
            }, 2000);
            
        }
        
        function madarParaLogin() {
             window.location = '../../view/logar.php';
        }
        
    </script>

";



if($tipo == "ClienteGoogleFacebook"){
    echo "
        <script>
            
            abrirJanela();
            
        </script>
    ";

} else {
    echo "
        <script>
                
            madarParaLogin();
                
        </script>
    ";
}
