<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Esqueci minha senha | Sweet Salty</title>
        <link rel="icon" href="../food_premium/img/logo.png" type="image/x-icon">
        <!-- Bootstrap core CSS-->
        <link href="../food_premium/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <!-- Custom fonts for this template-->
        <link href="../food_premium/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <!-- Custom styles for this template-->
        <link href="../food_premium/css/sb-admin.css" rel="stylesheet">
        <style>
            .img{
                margin: 10px;
                width: 150px;
            }
        </style>
    </head>
    <?php 
        session_start();
        if(isset($_SESSION['id_cliente'])){
            header("Location: esqueci_senha.php");
        }
    ?>
    <?php
        if(isset($_POST["salvar"])){
            $id_cliente  		=  ""; 
            $nome  				=  $_POST["Nome_cliente"]; 
            $telefone_celular  	=  $_POST["Celular"]; 
            include "Funcoes/conexao.php";
            $sql = "INSERT INTO tb_clientes VALUES (?,?,?,?)";
            $contatos = $fusca -> prepare($sql);	
            $contatos -> execute(array($id_cliente,$nome,$telefone_celular));	
            $contatos = null; //Encerra a conexão com o BD	
            //header("Location: listar.php");
        }
    ?>
    <body class="">
        <a href="logar.php"><nav id="nav"><img src="../food_premium/img/logo.png" class="img"></nav></a><br>
        <h1 align="center">Esqueceu sua senha?</h1></h1>
        <div class="container" style="width: 70rem;">
            <div class="card card-login mx-auto mt-5">
                <center><div class="card-header">Insira um e-mail para redefinição de senha</div></center>
                <div class="card-body" style="padding: 30px 15px 30px 15px">
                    <form action="Funcoes/valida.php" method="POST">
                        <div class="form-group">
                            <input class="form-control" id="exampleInputEmail1" name="email" type="email" aria-describedby="emailHelp" placeholder="E-mail">
                        </div>
                        <input class="btn btn-primary btn-block" href="index.php" type="submit" name="salvar" value="Entrar">
                    </form>
                    <div class="text-center">
                    </div>
                </div>
            </div>
        </div>
        <!-- Bootstrap core JavaScript-->
        <script src="../food_premium/vendor/jquery/jquery.min.js"></script>
        <script src="../food_premium/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="../food_premium/vendor/jquery-easing/jquery.easing.min.js"></script>
    </body>
</html>