<?php
	session_start();

	chdir("../");

?>

<!DOCTYPE html>
<html lang="PT-BR">
	<head>
		<base href="../">
		<meta charset="utf-8">
	  	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	   	<link rel="icon" href="../img/logo-min.png" type="image/x-icon">
	  	<title>Novo Funcionário</title>
		<link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
		<link href="../vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
		<link href="../css/sb-admin.css" rel="stylesheet">
		<link href="../alertifyjs/css/alertify.min.css" rel="stylesheet">
		<link href="../alertifyjs/css/themes/default.min.css" rel="stylesheet">
		<script src="../alertifyjs/alertify.min.js"></script>
		<style>
			.btn{
				float:right;
				background:#71A140;
				color:#fff;
			}
		</style>
	</head>
	<body id="page-top">
		<?php include 'menuLateral.php'?>	
		<br><br><br><br><center><h1>Novo Cliente</h1></center>
		<div class="content-wrapper">
	    	<div class="container-fluid">
				<div class="card mb-3">
        			<div class="card-header">
        				<div class="card-body">
          					<div class="table-responsive">
								<form method="POST" action="" id="formCadastro">
									<div class="col-sm-12">
										<div class="row">
											<div class="col-lg-6 col-sm-12 form-group">
												<label class="trn">Nome completo *</label>
												<input type="text" name="nome" placeholder="" class="form-control" required autofocus>
											</div>
											<div class="col-lg-6 col-sm-12 form-group">
												<label class="trn">E-mail *</label>
												<input type="email" name="email" placeholder="Insira seu e-mail" class="form-control">
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
												<input type="password" name="senha" placeholder="mínimo de 8 caracteres" class="form-control" maxlength="12" minlength="8" required>
											</div>
											<div class="col-lg-6 col-sm-12 form-group">
												<label class="trn">Confirmar senha *</label>
												<input type="password" id="confSenha" name="confSenha"  class="form-control" maxlength='12' minlength='8'required>
											</div>
																			
										</div><p class="trn">*Campo obrigatório</p><br>
										<center>
											<input type="hidden" placeholder="Senha" name="Senha"  class="form-control" required>
											<input class="btn btn-primary" type="submit" name="salvar" value="Salvar" style="width: 100px;float: left;">		
										</center>
									</div>
								</form>
							</div>
						</div>
					</div>
   				 </div>
    		</div>
    	</div>
		<a class="scroll-to-top rounded" href="#page-top">
			<i class="fa fa-angle-up"></i>
		</a>
		<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
			  		<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Você tem certeza?</h5>
						<button class="close" type="button" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">×</span>
						</button>
			  		</div>
			  		<div class="modal-body">Ao clicar em "Sair" você será deslogado do sistema</div>
			  			<div class="modal-footer">
							<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
							<a class="btn btn-primary" href="../../controller/sairFuncionarioController.php">Sair</a>
			  			</div>
					</div>
		  		</div>
			</div>
		</div>
		<?php include '../footer.html' ?>	
		<script type="text/javascript">
		</script>
		<script src="../vendor/jquery/jquery.min.js"></script>
		<script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
		<script src="../vendor/jquery-easing/jquery.easing.min.js"></script>
		<script src="../vendor/chart.js/Chart.min.js"></script>
		<script src="../vendor/datatables/jquery.dataTables.js"></script>
		<script src="../vendor/datatables/dataTables.bootstrap4.js"></script>
		<script src="../js/sb-admin.min.js"></script>
		<script src="../js/sb-admin-datatables.min.js"></script>
		<script src="../js/sb-admin-charts.min.js"></script>
		<script src="../js/jquery.mask.min.js"></script>
		<script>
			$('input[name=cpf]').mask('000.000.000-00', {reverse: true});
			$('input[name=rg]').mask('00.000.000-0', {reverse: true});
			$('input[name=numeroTelefone]').mask('(00) 00000-0000');

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
					url: '../../controller/gerenteController/crudClienteController/novoClienteController.php',
					method: 'POST',
					data: {
						nome: $('input[name=nome]').val(),
						email: $('input[name=email]').val(),
						ddd : ddd[0],
						numeroTel : telefone[0],
						sexo : $('input[name=sexo]').val(),
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
					else if(resposta == 3)
						alertaCadastro();
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

			function alertaCadastro(){
				alertify.success("Cadastrado com sucesso!");
				$('input[name=nome]').val("");
				$('input[name=email]').val("");
				$('input[name=rg]').val("");
				$('input[name=cpf]').val("");
				$('input[name=senha]').val("");
				$('input[name=confSenha]').val("");
				$('input[name=numeroTelefone]').val("");
				$('input[name=nome]').focus();
			}

		</script>
	</body>
</html>