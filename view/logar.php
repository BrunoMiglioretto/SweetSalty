<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Login | Sweet Salty</title>
        <link rel="icon" href="img/logo.png" type="image/x-icon">
        <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href="css/sb-admin.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,300i,400,400i,600,600i,700,700i" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,400i,600,600i,700,700i" rel="stylesheet">
        <script src="https://apis.google.com/js/platform.js" async defer></script><!-- Do Google-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <meta name="google-signin-client_id" content="267578554153-au3dkj3ddslml5fptqscgt66mea0pjq9.apps.googleusercontent.com">
        <style>
            .img{
                margin: 10px;
                width: 150px;
            }
        </style>
    </head>
    <body class="">
        <nav id="nav"><a href="../index.php"><img src="img/logo.png" class="img"></a></nav>
        <div class="container" style="height:400px">
            <div class="card card-login mx-auto mt-5">
                <center><div class="card-header">Entre com e-mail e senha</div></center>
                <div class="card-body" style="padding: 30px 15px 20px 15px">
                    <form action="../controller/loginPadraoController.php" method="POST">
                        <div class="form-group">
                            <input class="form-control" id="exampleInputEmail1" name="email" type="text" aria-describedby="emailHelp" placeholder="E-mail" autofocus required>
                        </div>
                        <div class="form-group">
                            <input class="form-control" id="exampleInputPassword1" name="senha" type="password" placeholder="Senha" required>
                        </div>
                        <div class="form-group">
                            <a href="esqueci_senha.php" style="color:#5C4C33;align:right;"><label>Esqueci minha senha</label></a>
                        </div>
                        <input class="btn btn-primary btn-block" type="submit" name="Salvar" value="Entrar"><br>
                        <div class="row text-center" style="margin-left: 50px;"> 
                             <div class="g-signin2" data-onsuccess="onSignIn" style="width:300%; height:40px; margin-left:-6%;"></div><p id='msg'></p>
                        </div>
                    </form>
                    <a href="cadastroCliente.php" style="text-decoration:none;"><button class="btn btn-primary btn-block"  type="button">Quero me cadastrar</button></a>
                </div>
            </div>
        </div>
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
        <script>
            function onSignIn(googleUser) { // esta função captura as informações do usuário e adiciona em variáveis. 
            var profile   = googleUser.getBasicProfile();
            var userId    = profile.getId();   
            var userName  = profile.getName();
            var userImage = profile.getImageUrl();
            var userEmail = profile.getEmail();
            var userToken = googleUser.getAuthResponse().id_token;
    
                if(userEmail != ""){
                    var dados ={
                        userId:userId,
                        userName:userName,
                        userEmail:userEmail,
                        userImage:userImage,
                        userToken:userToken
                    };
                    $.ajax({
                        method: "POST",
                        data: { 
                            email:userEmail,
                            nome:userName
                        },
                        url: "../controller/loginGFController.php"
                    }).done(function(data){
                        mudarPagina(data);
                    });
                }
            }
            function mudarPagina(situacao){
                switch(situacao){
                    case '1':
                        window.location = 'cliente/mesas/mesa.php';
                        break;
                    case '2':
                        alert('Email não é de um cliente');
                        window.location = 'logar.php';
                        break;
                    case '3':
                        window.location = 'cliente/mesas/mesa.php';
                        break;
                }
            }

        </script>
    </body>
</html>
