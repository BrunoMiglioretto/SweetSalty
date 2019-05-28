<?php
	session_start();

?>

<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="description" content="">
		<meta name="author" content="">
		<title>Cadastro de cliente | Sweet Salty</title>
		<link rel="icon" href="img/logo-min.png" type="image/x-icon">
		<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
		<link href="css/sb-admin.css" rel="stylesheet">
		<link href="alertifyjs/css/alertify.min.css" rel="stylesheet">
		<link href="alertifyjs/css/themes/default.min.css" rel="stylesheet">
		<script src="alertifyjs/alertify.min.js"></script>
		<script src="vendor/jquery/jquery.min.js"></script>
		<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
		<script src="vendor/jquery-easing/jquery.easing.min.js"></script>
		<script src="vendor/jquery.mask.min.js"></script>		
		    <style>
            .img{
                margin: 10px;
                width: 150px;
            }

			.sexo{
				font-style: normal;
			}
        </style>
	</head>
	<body class="">
		<a href="logar.php"><nav id="nav"><img src="img/logo-min.png" class="img"></nav></a>
		<br><center><h1 class="trn">Cadastro de cliente</h1></center>
		<div class="container-fluid">
			<div class="card mb-3">
				<div class="card-header">
					<div class="card-body">
						<div class="table-responsive">
							<form id="formCadastro" method="POST" action="">
								<div class="col-sm-12">
									<div class="row">
										<div class="col-lg-6 col-sm-12 form-group">
											<label class="trn">Nome completo *</label>
											<input type="text" name="nome" placeholder="" class="form-control" required autofocus>
										</div>
										<div class="col-lg-6 col-sm-12 form-group">
											<label class="trn">E-mail *</label>
											<input type="email" name="email" class="form-control">
										</div>
									</div>
									<div class="row">
										<div class="col-lg-4 col-sm-12 form-group">
											<label class="trn">Sexo *</label><br>
											<input type="radio" name="sexo" value="F"required /> <i class="trn sexo">Feminino</i>
											<input type="radio" name="sexo" value="M"/> <i class="trn sexo">Masculino</i>
										</div>
										<div class="col-lg-4 col-sm-6 form-group">
											<label class="trn">Telefone celular *</label>
											<input type="tel" pattern="\(..\) [0-9]{5}-[0-9]{4}" name="numeroTelefone" placeholder="Ex: (41) 9999-9999" class="form-control phone_with_ddd" title="Telefone celular">
										</div>
										<div class="col-lg-4 col-sm-6 form-group">
											<label class="trn">Data de nascimento *</label>
											<input type="date" min="1900-01-01" max="<?= date("Y-m-d", strtotime('-10 year', time())) ?>" name="dataNascimento" placeholder="" class="form-control" required>
										</div>
									</div>
									<div class="row">
										<div class="col-lg-6 col-sm-12 form-group">
											<label class="trn">Senha *</label>
											<input type="password" name="senha" placeholder="<?= ($_SESSION["linguagem"] == "pt")? "mínimo de 8 caracteres":"minimum of 8 characters"?>" class="form-control" maxlength="12" minlength="8" required>
										</div>
										<div class="col-lg-6 col-sm-12 form-group">
											<label class="trn">Confirmar senha *</label>
											<input type="password" id="confSenha" name="confSenha"  class="form-control" maxlength='12' minlength='8'required>
										</div>
																		
									</div><p class="trn">*Campo obrigatório</p><br>
									
									<center>
										<button class="btn btn-primary btn-block trn" style="width:100px;" type="submit" id="salvar">Salvar</button>			
									</center>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		<script src="dicionario/jquery.translate.js"></script>
        <script src="dicionario/loginCadastroManualCliente.js"></script>
		<script type="text/javascript">

			$('.phone_with_ddd').mask('(00) 00000-0000');

			form = $("#formCadastro");

			$(form).submit(function(evento){
				evento.preventDefault();

				var regExp = /\d{2}/;
				var telefone = $('input[name=numeroTelefone]').val();
				var ddd = regExp.exec(telefone);
				
				var regExp2 = /\d{5}-\d{4}/;
				var numero = $('input[name=numeroTelefone]').val();
				var telefone = regExp2.exec(numero);

				$.ajax({
					url: '../controller/clienteController/cadastro/cadastrarClientePadraoController.php',
					method: 'POST',
					data: {
						nome: $('input[name=nome]').val(),
						email: $('input[name=email]').val(),
						sexo: $('input[name=sexo]').val(),
						ddd : ddd[0],
						numeroTel : telefone[0],
						dataNascimento:$('input[name=dataNascimento]').val(),
						senha:$('input[name=senha]').val(),
						confSenha:$('input[name=confSenha]').val()
					}
				}).done(function(resposta) {
					console.log(resposta);
					if(resposta == 0)
						alertSenhaDesiguais();		
					else if(resposta == 1)
						alertaCadastroNaoRealizado();
					else if(resposta == 2)	
						alertaEmailBD();
					else if(resposta == 4)
						alertaEmailFalha();
					else if(resposta == 5)
						alertaEmailEnviado();
				});
			});
			
			function alertSenhaDesiguais() {
				alertify.alert("").setting({
					transition : "zoom",
					title : "Senhas não iguais",
					message : "O campo de senha e confirma senha não estão iguais.",
					movable : false
				});
			}

			function alertaCadastroNaoRealizado(){
				 alertify.error("Algum campo foi inserido de forma errada, tente novamente.");
			}

			function alertaEmailBD(){
				alertify.alert("").setting({
					transition : "zoom",
					title : "E-mail já cadastrado",
					message : "Esse e-mail já está cadastrado.",
					movable : false
				});
			}

			function alertCompoIncompleto() {
				alertify.alert("").setting({
					transition : "zoom",
					title : "Senhas não iguais",
					message : "O campo de senha e confirma senha não estão iguais.",
					movable : false
				});
			}

			function alertaEmailFalha(){
				alertify.error("Falha ao enviar um e-mail de confirmação.");
			}

			function alertaEmailEnviado() {
				alertify.alert("", function() {
					window.location = "logar.php";
				}).setting({
					transition : "zoom",
					title : "E-mail enviado",
					message : "Um e-mail de confirmação foi enviado, aceite-o para ativar a sua conta.",
					movable : false
				});
			}

			function traduzir() {
                var translator = $('body').translate({lang: "<?= $_SESSION["linguagem"]?>", t: dict});
			}
			
			$(document).ready(function() {
				traduzir();
			});

		</script>
	</body>
</html>