﻿<?php
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
		<br><br><br><br><center><h1>Novo Funcionário</h1></center>
		<div class="content-wrapper">
	    	<div class="container-fluid">
				<div class="card mb-3">
        			<div class="card-header">
        				<div class="card-body">
          					<div class="table-responsive">
								<form method="POST" action="" id="formCadastro">
									<div class="col-sm-12">
										<div class="row">
											<div class="col-sm-6 form-group">
												<label>Nome</label>
												<input type="text" name="nome" placeholder="Nome Completo" class="form-control" required autofocus>
											</div>
											<div class="col-sm-6 form-group">
												<label>E-mail</label>
												<input type="email" name="email" placeholder="Insira o e-mail" class="form-control" required>
											</div>	
										</div>					
										<div class="row">
											<div class="col-sm-4 form-group">
												<label>Telefone</label>
												<input type="tel" name="numeroTelefone" pattern="\(..\) [0-9]{5}-[0-9]{4}" placeholder="Ex: (41) 9999-9999" class="form-control" required>
											</div>		
											<div class="col-sm-4 form-group">
												<label>RG</label>
												<input type="text" name="rg" pattern="[0-9]{2}.[0-9]{3}.[0-9]{3}.[0-9]{1}" placeholder="00.000.000-0" class="form-control" required>
											</div>		
											<div class="col-sm-4 form-group">
												<label>CPF</label>
												<input type="text" name="cpf" pattern="[0-9]{3}.[0-9]{3}.[0-9]{3}.[0-9]{2}" placeholder="000.000.000-00" class="form-control" required>
											</div>	
										</div>
										<div class="row">
											<div class="col-sm-4 form-group">
												<label>Cargo</label>
												<select name="cargo" placeholder="Cargo do funcionário" class="form-control" required>
													<option></option>
													<option value='Cozinheiro'>Cozinheiro</option>
													<option value='Garcom'>Garçom</option>
													<option value='Caixa'>Caixa</option>
													<option value='Gerente'>Gerente</option>
												</select>
											</div>
											<div class="col-sm-4 form-group">
												<label>Senha</label>
												<input type="password" name="senha" placeholder="mínimo de 8 caracteres" class="form-control" minlength="8" maxlength="12" required>
											</div>	
											<div class="col-sm-4 form-group">
												<label>Confirmar senha</label>
												<input type="password" name="confSenha"  minlength="8" maxlength="12" class="form-control" required>
											</div>
										</div>
										<center>
											<input class="btn" type="submit" name="salvar" value="Salvar" style="width: 100px; float: left;">				
										</center>
										<center>
											<a href="crudFuncionario/listaFuncionarios.php"><input class="btn" type="button" name="salvar" value="Voltar" style="margin-left:20px;width: 100px; float: left;"></a>			
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
							<a class="btn btn-primary" href="../logout.php">Sair</a>
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
					url: '../../controller/gerenteController/crudFuncionarioController/novoFuncionarioController.php',
					method: 'POST',
					data: {
						nome: $('input[name=nome]').val(),
						email: $('input[name=email]').val(),
						cargo : $('select[name=cargo] option:selected').val(),
						ddd : ddd[0],
						numeroTel : telefone[0],
						rg : $('input[name=rg]').val(),
						cpf : $('input[name=cpf]').val(),
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