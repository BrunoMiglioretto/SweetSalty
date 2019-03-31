<?php
    @session_start();
    $id = $_SESSION['id_cliente'];
   	if(!isset($_SESSION['id_cliente'])){
         header("Location:../Funcoes/logar.php");
   	}
   	include "../Funcoes/conexao.php";
    $comando = "SELECT Nome_cliente FROM tb_clientes WHERE id_cliente = $id";
    $cliente = $fusca->prepare($comando);
    $cliente->execute();
    foreach($cliente as $carrega){
        $nome = $carrega['Nome_cliente'];
    }
    if(isset($_POST['1'])){
        include "../Funcoes/conexao.php";
        $comando = "UPDATE tb_clientes SET mesa = 1 WHERE id_cliente = $id";
        $mesa = $fusca->prepare($comando);
        $mesa -> execute();
        header("Location:index.php");
    }
    if(isset($_POST['2'])){
        include "../Funcoes/conexao.php";
        $comando = "UPDATE tb_clientes SET mesa = 2 WHERE id_cliente = $id";
        $mesa = $fusca->prepare($comando);
        $mesa -> execute();
        header("Location:index.php");
    }
    if(isset($_POST['3'])){
        include "../Funcoes/conexao.php";
        $comando = "UPDATE tb_clientes SET mesa = 3 WHERE id_cliente = $id";
        $mesa = $fusca->prepare($comando);
        $mesa -> execute();
        header("Location:index.php");
    }
    if(isset($_POST['4'])){
        include "../Funcoes/conexao.php";
        $comando = "UPDATE tb_clientes SET mesa = 4 WHERE id_cliente = $id";
        $mesa = $fusca->prepare($comando);
        $mesa -> execute();
        header("Location:index.php");
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href="../vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
          <link href="Cliente/pace.min.js" rel="stylesheet">
        <link rel="icon" href="../img/logo.png" type="image/x-icon">
        <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
        <title>Mesas | Sweet Salty</title>
        <style>
            .topo{
                background-color: #71a140;
            }
            .titulo{
                font-size: 50px;
                padding: 15px 0px 15px 0px;
                color: whitesmoke;
                text-align: center;
            }
            .objeto{
                background-color: white;
                width: 130px;
                height: 130px;
                margin: 15px;
                margin-top: 100px;
                border: 0px;
                border-radius: 20%;
            }
            @media (max-width: 780px){
                .titulo{
                    font-size: 25px;
                }
                .objeto{
                    margin-top: 15px;
                    width: 160px;
                    height: 140px;
                }
            }
        </style>
    </head>
    <body style="background-color:#FFF">
        <div class="topo">
            <p class="titulo">Em qual mesa você está?</p>
        </div>
        <form action="" method="POST">
            <div class="container">
                <div class="row">
                    <div class="col-6 col-md-3 text-center" data-toggle="tooltip">
                        <button type="submit" name="1" class="objeto">
                            <img src="Mesas/mesa1.svg">
                        </button>
                    </div>
                    <div class="col-6 col-md-3 text-center">
                        <button type="submit" name="2" class="objeto">
                            <img src="Mesas/mesa2.svg">
                        </button>
                    </div>
                    <div class="col-6 col-md-3 text-center">
                        <button type="submit" name="3" class="objeto">
                            <img src="Mesas/mesa3.svg">
                        </button>
                    </div>                
                    <div class="col-6 col-md-3 text-center">
                        <button type="submit" name="4" class="objeto">
                            <img src="Mesas/mesa4.svg">
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </body>
</html>
