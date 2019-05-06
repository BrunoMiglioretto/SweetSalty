<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="description" content="">
		<meta name="author" content="">
		<title>Cadastro de cliente | Sweet Salty</title>
		<link rel="icon" href="../food_premium/img/logo.png" type="image/x-icon">
		<link href="../food_premium/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<link href="../food_premium/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
		<link href="../food_premium/css/sb-admin.css" rel="stylesheet">
		<link href="alertifyjs/css/alertify.min.css" rel="stylesheet">
		<link href="alertifyjs/css/themes/default.min.css" rel="stylesheet">
		<script src="alertifyjs/alertify.min.js"></script>
		<script src="../food_premium/vendor/jquery/jquery.min.js"></script>
		<script src="../food_premium/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
		<script src="../food_premium/vendor/jquery-easing/jquery.easing.min.js"></script>
		<script src="vendor/jquery.mask.min.js"></script>
		    <style>
            .img{
                margin: 10px;
                width: 150px;
            }
        </style>
	</head>
	<body class="">
		<a href="logar.php"><nav id="nav"><img src="../food_premium/img/logo.png" class="img"></nav></a>
		<br><center><h1>Cadastro de cliente</h1></center>
		<div class="container-fluid">
			<div class="card mb-3">
				<div class="card-header">
					<div class="card-body">
						<div class="table-responsive">
								<div class="col-sm-12">
									<div class="row">
										<div class="col-lg-6 col-sm-12 form-group">
											<label>Nome completo *</label>
											<input type="text" name="nome" placeholder="" class="form-control" required autofocus>
										</div>
										<div class="col-lg-6 col-sm-12 form-group">
											<label>E-mail *</label>
											<input type="email" name="email" placeholder="Insira seu e-mail" class="form-control">
										</div>
									</div>
									<div class="row">
										<div class="col-lg-4 col-sm-12 form-group">
											<label>Sexo *</label><br>
											<input type="radio" name="sexo" value="F"required /> Feminino
											<input type="radio" name="sexo" value="M"/> Masculino
										</div>
										<div class="col-lg-4 col-sm-6 form-group">
											<label>Telefone celular *</label>
											<input type="text" name="numeroTelefone" placeholder="Ex: (41) 9999-9999" class="form-control phone_with_ddd" maxlength="14" title="Telefone celular">
										</div>
										<div class="col-lg-4 col-sm-6 form-group">
											<label>Data de nascimento *</label>
											<input type="date" name="dataNascimento" placeholder="" class="form-control" required>
										</div>
									</div>
									<div class="row">
										<div class="col-lg-6 col-sm-12 form-group">
											<label>Senha *</label>
											<input type="password" name="senha" placeholder="mínimo de 8 caracteres" class="form-control" maxlength="12" minlength="8" required>
										</div>
										<div class="col-lg-6 col-sm-12 form-group">
											<label>Confirmar senha *</label>
											<input type="password" id="confSenha" name="confSenha"  class="form-control" maxlength='12' minlength='8'required>
										</div>
																		
									</div>*Campo obrigatório<br>
									
									<center>
										<input class="btn btn-primary btn-block" style="width:100px;" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal" type="submit" name="salvar" value="Salvar" onclick='verificarFormulario()'>				
									</center>
								</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<script type="text/javascript">
			$('.phone_with_ddd').mask('(00) 0000-0000')
			function verificarFormulario(){
				
				var regExp = /\d{2}/;
				var telefone = $('input[name=numeroTelefone]').val();
				var ddd = regExp.exec(telefone);
				console.log(ddd);

				var regExp2 = /\d{4}-\d{4}/;
				var numero = $('input[name=numeroTelefone]').val();
				var numeroTel = regExp2.exec(numero);
				console.log(numeroTel);

				$.ajax({
					url: '../controller/clienteController/cadastro/cadastrarClientePadraoController.php',
					method: 'POST',
					data: {
						nome: $('input[name=nome]').val(),
						email: $('input[name=email]').val(),
						sexo:$('input[name=sexo]').val(),
						ddd:ddd,
						numeroTel:numeroTel,
						dataNascimento:$('input[name=dataNascimento]').val(),
						senha:$('input[name=senha]').val(),
						confSenha:$('input[name=confSenha]').val(),
					}
				}).done(function(resposta) {
					console.log(resposta);
						if(resposta == 1)
							alertaCadastroNaoRealizado();
						else if(resposta == 2)	
							alertaEmailBD();
						else if(resposta == 3)
							alertaEmailFalha();
						else if(resposta == 4)
							alertaEmailEnviado();
						console.log(resposta);
					});
			}

			function alertaCadastroNaoRealizado(){
				 alertify.error("Houve falhas ao se cadastrar, tente novamente.");
			}

			function alertaEmailBD(){
				 alertify.error("Já há um e-mail igual no Banco de dados, tente novamente.");
			}

			function alertaEmailFalha(){
				alertify.error("Falha ao enviar um e-mail de confirmação.");
			}

			function alertaEmailEnviado(){
				alertify.success("Enviamos um e-mail para confirmação, verifique sua caixa de e-mais");
			}
		</script>
	</body>
</html>