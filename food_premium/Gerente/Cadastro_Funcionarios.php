<!DOCTYPE html>
<?php
	session_start();
	if(!isset($_SESSION['id_funcionario'])){
		header("Location: ../logar.php");
	}
?>
<?php
	if(isset($_POST["salvar"])){
		$id_funcionario  			=  	""; 
		$cargo  					=  	$_POST["cargo"]; 
		$nome  						=  	$_POST["nome"]; 
		$sobrenome  				=  	$_POST["sobrenome"]; 
		$email 						=  	$_POST["email"]; 
		$telefone_residencial  		=  	$_POST["telefone_residencial"]; 
		$telefone_celular  		 	=  	$_POST["telefone_celular"]; 
		$rg  						=  	$_POST["rg"]; 
		$cpf  						=  	$_POST["cpf"]; 
		$senha 						=  	$_POST["senha"];
		$senhaConfirma 				=	$_POST["senha_confirma"];
		$cript_senha 			= md5($senha); // md5
		$cript_conf 			= md5($senhaConfirma);
		if ($cript_senha == $cript_conf) {
			include "../Funcoes/conexao.php";
			$sql = "INSERT INTO tb_funcionario VALUES (?,?,?,?,?,?,?,?,?,?)";
			$contatos = $fusca -> prepare($sql);	
			$contatos -> execute(array($id_funcionario,$cargo, $nome, $sobrenome, $email, $telefone_residencial, $telefone_celular, $cpf, $rg,$cript_senha));	
			$contatos = null; //Encerra a conexão com o BD
			echo "
				<script>
					alert('Cadastro realizado com sucesso!');
					window.location.href='Cadastro_Funcionarios.php';
				</script>";
		}else{
			echo "
				<script>
					alert('As senhas não conferem!');
					window.location.href='Cadastro_Funcionarios.php';
				</script>";
		}	
	}
?>
<html lang="PT-BR">
	<head>
		<meta charset="utf-8">
	  	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	   	<link rel="icon" href="../img/logo.png" type="image/x-icon">
	  	<title>Cadastro de Coraborador</title>
		<!--------------------------------------------Logar------------------------------------------>
		<!-----------------------------------------Fim Logar----------------------------------------->
		<!-----------------------------------------TODOS CSS----------------------------------------->
		<!-- Bootstrap CSS-->
		<link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<!--Template-->
		<link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
		<!-- Pageina CSS-->
		<link href="../vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
		<!-- Estilo Template-->
		<link href="../css/sb-admin.css" rel="stylesheet">
		<!--------------------------------------FIM DE TODOS CSS-------------------------------------->
	</head>
	<body id="page-top">
		<!--------------------------------------INCLUDE MENU---------------------------------------->
		<?php include '../Menu_Lateral/Menu_Gerente.php'; ?>	
		<!-------------------------------------------CONTEUDO--------------------------------------->
		<br><br><br><br><center><h1>Cadastro de Colaborador</h1></center>
		<div class="content-wrapper">
	    	<div class="container-fluid">
				<div class="card mb-3">
        			<div class="card-header">
        				<div class="card-body">
          					<div class="table-responsive">
								<form method="POST" action="">
									<div class="col-sm-12">
										<div class="row">
											<div class="col-sm-6 form-group">
												<label>Nome</label>
												<input type="text" name="nome" placeholder="Nome do colaborador" class="form-control" required autofocus>
											</div>
											<div class="col-sm-6 form-group">
												<label>Sobrenome</label>
												<input type="text" name="sobrenome" placeholder="Sobrenome do colaborador" class="form-control" required>
											</div>
											<!--<div class="radio">
												<label><input type="radio" name="optradio">Option 2</label>
												<label><input type="radio" name="optradio">Option 3</label>
											</div>-->
										</div>					
										<div class="row">
											<div class="col-sm-4 form-group">
												<label>E-mail</label>
												<input type="email" name="email" placeholder="Insira o E-Mail" class="form-control" required>
											</div>	
											<div class="col-sm-4 form-group">
												<label>Telefone residencial</label>
												<input type="text" name="telefone_residencial" placeholder="(##)####-####" class="form-control" onkeypress="return valTELEFONERESIDENCIAL(event,this); return false;" maxlength="13" title="(##)####-####">
											</div>	
											<div class="col-sm-4 form-group">
												<label>Telefone celular</label>
												<input type="text" name="telefone_celular" placeholder="(##)9####-####" class="form-control" onkeypress="return valTELEFONECELULAR(event,this); return false;" maxlength="14" title="(##)#####-####">
											</div>		
										</div>
										<div class="row">
											<div class="col-sm-4 form-group">
												<label>RG</label>
												<input type="text" name="rg" placeholder="Somente números" class="form-control"onkeypress="return valRG(event,this); return false;" maxlength="12" title="##.###.###-#" required>
											</div>		
											<div class="col-sm-4 form-group">
												<label>CPF</label>
												<input type="text" name="cpf" placeholder="Somente números" class="form-control" onkeypress="return valCPF(event,this); return false;" maxlength="14" title="###.###.###-##" required>
											</div>	
											<div class="col-sm-4 form-group">
												<label>Cargo</label>
												<select name="cargo" placeholder="Cargo do funcionário" class="form-control" required>
													<option></option>
													<option>Caixa</option>
													<option>Cozinha</option>
													<option>Fornecedor</option>
													<option>Garçom</option>
													<option>Recepção</option>
												</select>
											</div>
											<div class="col-sm-4 form-group">
												<label>Senha</label>
												<input type="password" name="senha" placeholder="Máximo 12 caracteres" class="form-control" maxlength="12" required>
											</div>	
											<div class="col-sm-4 form-group">
												<label>Confirmar senha</label>
												<input type="password" placeholder="Confirme a senha" id="senha_confirma" name="senha_confirma"  class="form-control" required>
											</div>
										</div>
										<center>
											<input class="btn" type="submit" name="salvar" value="Salvar" style="width: 100px; float: left;">				
										</center>
									</div>
								</form>
							</div>
						</div>
					</div>
   				 </div>
    		</div>
    	</div>
		<!---------------------------------------FIM CONTEUDO--------------------------------------->
		<style>
			.btn{
				float:right;
				background:#71A140;
				color:#fff;
			}
		</style>
		<!-------------------------------- Botão de voltar ao topo---------------------------------->
		<a class="scroll-to-top rounded" href="#page-top">
			<i class="fa fa-angle-up"></i>
		</a>
		<!-- Logout Modal-->
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
		<!------------------------------FIM Botão de voltar ao topo---------------------------------->
		<!--------------------------------------INCLUDE FOOTER--------------------------------------->
		<?php include '../Menu_Lateral/footer.html'; ?>	
		<!----------------------------------------FIM INCLUDE---------------------------------------->
		<!------------------------------------------- JAVA------------------------------------------->
		<script type="text/javascript">
			/*permite somente valores numéricos*/
			function valCPF(e,campo){
				var tecla=(window.event)?event.keyCode:e.which;
				if((tecla > 47 && tecla < 58)){
					mascara(campo, '###.###.###-##');
					return true;
				}else{
					if (tecla != 8) return false;
					else return true;
				}
			}
			function valRG(e,campo){
				var tecla=(window.event)?event.keyCode:e.which;
				if((tecla > 47 && tecla < 58)){
					mascara(campo, '##.###.###-#');
					return true;
				}else{
					if (tecla != 8) return false;
					else return true;
				}
			}
			/*permite somente valores numéricos*/
			function valTELEFONERESIDENCIAL(e,campo){
				var tecla=(window.event)?event.keyCode:e.which;
				if((tecla > 47 && tecla < 58)){
					mascara(campo, '(##)####-####');
					return true;
				}else{
					if (tecla != 8) return false;
					else return true;
				}
			}
			/*permite somente valores numéricos*/
			function valTELEFONECELULAR(e,campo){
				var tecla=(window.event)?event.keyCode:e.which;
				if((tecla > 47 && tecla < 58)){
					mascara(campo, '(##)#####-####');
					return true;
				}else{
					if (tecla != 8) return false;
					else return true;
				}
			}
			/*permite somente valores numericos*/
			function valCEP(e,campo){
				var tecla=(window.event)?event.keyCode:e.which;
				if((tecla > 47 && tecla < 58)){
					mascara(campo, '#####-###');
					return true;
				}else{
					if (tecla != 8) return false;
					else return true;
				}
			}
			/*cria a mascara*/
			function mascara(src, mask){
				var i = src.value.length;
				var saida = mask.substring(1,2);
				var texto = mask.substring(i);
				if (texto.substring(0,1) != saida){
					src.value += texto.substring(0,1);
				}
			}
			/*consistencia se o valor do CPF e um valor valido seguindo os criterios da Receita Federal do territorio nacional*/
			function consistenciaCPF(campo) {
				cpf = campo.replace(/\./g, '').replace(/\-/g, '');
				erro = new String;
				if (cpf.length < 11){
					erro += "Sao necessarios 11 digitos para verificacao do CPF! \n\n"; 
					var nonNumbers = /\D/;
				}	
				if (cpf == "00000000000" || cpf == "11111111111" || cpf == "22222222222" || cpf == "33333333333" || cpf == "44444444444" || cpf == "55555555555" || cpf == "66666666666" || cpf == "77777777777" || cpf == "88888888888" || cpf == "99999999999"){
					erro += "Numero de CPF invalido!"
				}
				var a = [];
				var b = new Number;
				var c = 11;
				for (i=0; i<11; i++){
					a[i] = cpf.charAt(i);
					if (i < 9) b += (a[i] * --c);
				}
				if ((x = b % 11) < 2){
					a[9] = 0 
				}else{
					a[9] = 11-x 
				}
				b = 0;
				c = 11;
				for (y=0; y<10; y++) b += (a[y] * c--); 
				if ((x = b % 11) < 2){
					a[10] = 0;
				}else{
					a[10] = 11-x;
				}
				if ((cpf.charAt(9) != a[9]) || (cpf.charAt(10) != a[10])){
					erro +="Digito verificador com problema!";
				}
				if (erro.length > 0){
					alert(erro);
					return true;
				}
				return false;
			}
		</script>
		<!-- Bootstrap core JavaScript-->
		<script src="../vendor/jquery/jquery.min.js"></script>
		<script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
		<!-- Core plugin JavaScript-->
		<script src="../vendor/jquery-easing/jquery.easing.min.js"></script>
		<!-- Page level plugin JavaScript-->
		<script src="../vendor/chart.js/Chart.min.js"></script>
		<script src="../vendor/datatables/jquery.dataTables.js"></script>
		<script src="../vendor/datatables/dataTables.bootstrap4.js"></script>
		<!-- Custom scripts for all pages-->
		<script src="../js/sb-admin.min.js"></script>
		<!-- Custom scripts for this page-->
		<script src="../js/sb-admin-datatables.min.js"></script>
		<script src="../js/sb-admin-charts.min.js"></script>
		<!----------------------------------------FIM JAVA-------------------------------------------->
	</body>
</html>