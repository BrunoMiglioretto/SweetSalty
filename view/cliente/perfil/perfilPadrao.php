<?php
	session_start();

	chdir("../");

?>
<!DOCTYPE html>
<html lang="PT-BR">
	<head>
		<meta charset="utf-8">
		<base href="../">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="icon" href="../img/logo-min.png" type="image/x-icon">
		<title>Perfil | Sweet Salty</title>
		<link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
		<link href="../vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
		<link href="../css/sb-admin.css" rel="stylesheet">
		<link rel="stylesheet" href="../alertifyjs/css/alertify.min.css">
		<link rel="stylesheet" href="../alertifyjs/css/themes/default.min.css">
		<script src="../alertifyjs/alertify.min.js"></script>
		<style>
			.sexo{
				font-style: normal;
			}
		</style>
	</head>
	<body>
		<?php include 'menuLateral.php'?>
		<!-- <?php var_dump($cliente)?> -->	
		<br><br><br><br><center><h1 class="trn">Editar Perfil</h1></center>
		<div class="content-wrapper">
	    	<div class="container-fluid">
				<div class="card mb-3">
	        		<div class="card-header">
	        			<div class="card-body">
	          				<div class="table-responsive">
								<div class="col-sm-12">
									<div class="row">
										<div class="col-12 col-lg-6 col-sm-6 form-group">
											<label class="trn">Nome completo *</label>
											<input type="text"  name="nomeCompleto" class="form-control" value="<?= $cliente->getNomeCompleto()?>" required>
										</div>
										<div class="col-12 col-lg-6 col-sm-6 form-group">
											<label class="trn">E-mail *</label>
											<input type="email" name="email" placeholder="Ex: exemplo@exemplo.com" class="form-control" class="form-control" required value="<?= $cliente->getEmail()?>">
										</div>	
									</div>					
									<div class="row">
										<div class="col-12 col-lg-4 col-sm-6 form-group">
											<label class="trn">Data de nascimento *</label>
											<input type="date" name="dataNascimento"  class="form-control" required value="<?= $cliente->getDataNascimento()?>">
										</div>
										<div class="col-12 col-lg-4 col-sm-6 form-group">
											<label class="trn">Telefone celular *</label>
											<input type="text" name="numeroTelefone" placeholder="Ex: (41) 99999-9999" class="form-control" required value="<?= $cliente->getDdd(), $cliente->getNumeroTelefone()?>" maxlenght="14">
										</div>
										<div class="col-12 col-lg-4 col-sm-6 form-group">
											<label class="trn">Sexo *</label><br>
											<input type="radio" name="sexo" <?php if($cliente->getSexo() == 'F') echo 'checked'?> value='F'> <i class="trn sexo">Feminino</i>
											<input  type="radio" name="sexo" <?php if($cliente->getSexo() == 'M') echo 'checked'?> value='M'> <i class="trn sexo">Masculino</i>
										</div>
									</div>
									<div class="row">
										<div class="col-12 col-lg-6 col-sm-6 form-group">
											<label class="trn">Senha *</label>
											<input type="password" id="senha" placeholder="<?= ($_SESSION["linguagem"] == "pt")? "mínimo de 8 caracteres":"minimum of 8 characters"?>" name="senha" minlength="8" maxlength="12" class="form-control" required>
										</div>
										<div class="col-12 col-lg-6 col-sm-6 form-group">
											<label class="trn">Confirmar senha *</label>
											<input type="password" id="senha_confirma" name="confSenha" minlength="8" maxlength="12" class="form-control" required>
										</div>
									</div>
									<div class="row">
										<div class="col">
											<p class="trn">*Campo obrigatório</p>
										</div>
									</div>
									<center>
										<button class="btn btn-primary btn-block trn" style="width:100px;" type="submit" onclick="enviarMundacasPerfil()">salvar</button>
									</center>
								</div>
							</div>
						</div>
   					</div>
	    		</div>
	    	</div>
    	</div><br><br>
		<style>
			@media print {
				.print{
					display:none;
				}
				.no-print { 
					display:none; 
				}
				table{
					width:100%;
					font-size:18px;
				}
			}
		</style>
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
						<a class="btn btn-primary" href="../../controller/clienteController/sairController.php">Sair</a>
					</div>
				</div>
			</div>
		</div>
		<?php include '../footer.html'?>	
		<script src="../vendor/jquery/jquery.min.js"></script>
		<script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
		<script src="../vendor/jquery-easing/jquery.easing.min.js"></script>
		<script src="../vendor/chart.js/Chart.min.js"></script>
		<script src="../vendor/datatables/jquery.dataTables.js"></script>
		<script src="../vendor/datatables/dataTables.bootstrap4.js"></script>
		<script src="../js/sb-admin.min.js"></script>
		<script src="../js/sb-admin-datatables.js"></script>
		<script src="../js/sb-admin-charts.min.js"></script>
		<script src="../js/jquery.mask.min.js"></script>
		<script>

			$("input[name=numeroTelefone]").mask("(00) 00000-0000");

			function enviarMundacasPerfil() {

				numeroTodo = $("input[name=numeroTelefone]").val();
				
				var regExp = /\d{2}/;
				var ddd = regExp.exec(numeroTodo);

				var regExp2 = /\d{5}-\d{4}/;
				var numeroTel = regExp2.exec(numeroTodo);

				$.ajax({
					url: '../../controller/clienteController/editarPerfilPadraoController.php',
					method: 'POST',
					data: {
						nomeCompleto : $('input[name=nomeCompleto').val(),
						email : $('input[name=email]').val(),
						sexo : $("input:checked").val(),
						ddd : ddd[0],
						numeroTel : numeroTel[0],
						dataNascimento : $('input[name=dataNascimento]').val(),
						senha : $('input[name=senha]').val(),
						confSenha : $('input[name=confSenha]').val()
					}
				}).done(function(n) {

					console.log(n);

					if(n == "true") {
						alertify.alert("Editado com Sucesso","Seu perfil foi editado com sucesso!", function() {
							window.location = "index.php";
						}).setting({
							transition : "zoom"
						});
					}else if(n == "senha") {
						alertify.alert("").setting({
							transition : "zoom",
							title :	"Senhas não iguais",
							message : "O campo de senha não está igual a do confirmar senha"
						});
					}else{
						alertify.alert("").setting({
							transition : "zoom",
							title : "Campo(s) incorretos",
							message : "Algum campo está errado"
						});
					}
				});
			}

		</script>
		<script src="../dicionario/jquery.translate.js"></script>
        <script src="../dicionario/loginCadastroManualCliente.js"></script>
		<script>
            $(document).ready(function() {
                var translator = $('body').translate({lang: "<?= $_SESSION["linguagem"]?>", t: dict});
            });
        </script>
	</body>
</html>