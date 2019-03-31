<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Login | Sweet Salty</title>
        <link rel="icon" href="../food_premium/img/logo.png" type="image/x-icon">
        <!-- Bootstrap core CSS-->
        <link href="../food_premium/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <!-- Custom fonts for this template-->
        <link href="../food_premium/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <!-- Custom styles for this template-->
        <link href="../food_premium/css/sb-admin.css" rel="stylesheet">
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
        <nav id="nav"><a href="../index.php"><img src="../food_premium/img/logo.png" class="img"></a></nav>
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
                        <!--<div class="row text-center" style="margin-top: 20px;">-->
                        <!--    <div class="fb-login-button"  data-max-rows="1" data-size="large" data-button-type="continue_with" data-show-faces="false" data-auto-logout-link="false" data-use-continue-as="false"></div>-->
                        <!--</div><br>-->
                        <!--<div class="acesse" align="center">-->
                        <!--    OU ACESSE COM <br><br>-->
                        <!--</div>-->
                        <div class="row text-center" style="margin-left: 50px;"> 
                             <div class="g-signin2" data-onsuccess="onSignIn" style="width:200%; height:36px;"></div><p id='msg'></p>
                        </div>
                    </form>
                    <a href="cadastro_cliente.php" style="text-decoration:none;"><button class="btn btn-primary btn-block"  type="button">Quero me cadastrar</button></a>
                </div>
            </div>
        </div>
        <script>
         function onSignIn(googleUser) { // esta função captura as informações do usuário e adiciona em variáveis. 
		  var profile   = googleUser.getBasicProfile();
		  var userId    = profile.getId();   
		  var userName  = profile.getName();
		  var userImage = profile.getImageUrl();
		  var userEmail = profile.getEmail();
		  var userToken = googleUser.getAuthResponse().id_token;
		 
		  if(userEmail !== ""){
		  	var dados ={
		  		userId:userId,
		  		userName:userName,
		  		userEmail:userEmail,
		  		userImage:userImage,
		  		userToken:userToken
		  	};
		  	$.post('../controller/loginGFController.php', dados, function(retorna){
		  		if(retorna === 'erro'){
		  			var msg_erro = "Usuário não encotrado com esse email";
		  			document.getElementById("mensagem").innerHTML = msg_erro;  
		  		}else{
		  			window.location.href = retorna;
		  		}  
		  	});
		  }
		} // End onSignIn	
        </script>
        <!-- Bootstrap core JavaScript-->
        <script src="../food_premium/vendor/jquery/jquery.min.js"></script>
        <script src="../food_premium/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="../food_premium/vendor/jquery-easing/jquery.easing.min.js"></script>
    </body>
</html>
