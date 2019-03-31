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
	if(isset($_POST["salvar"])){
		
		$id_cliente  		=  ""; 
		$nome  		      	=  $_POST["nome"]; 
		$email              =  $_POST["email"];
		$cargo              =  "Cliente";
		$telefone_celular  	=  $_POST["telefone_celular"]; 
		$data_nascimento    =  $_POST["data_nascimento"];
		$senha              =  $_POST["senha"];
		$senha_crip = md5($senha);
		$sexo              	=  $_POST["sexo"];
		$senhaConfirma 		=  $_POST["senha_confirma"];
		$mesa 				=  0;
		if(filter_var($email, FILTER_VALIDATE_EMAIL)){ // validação do email.
			if(strlen($senha < 8)){ // validação da senha.
				echo "<scritp> alert('Digite sua senha com no mínimo oito caracteres.') </script>";
			}else {
			include "Funcoes/conexao.php";
			$comando_email = "SELECT Email FROM tb_clientes WHERE Email = '$email'";
			$verifica_email = $fusca->prepare($comando_email);
			$verifica_email->execute();
			$contador_email = $verifica_email->rowCount();
			$comando_email_funcionarios = "SELECT Email FROM tb_funcionario WHERE Email = '$email'";
			$verifica_email_funcionario = $fusca->prepare($comando_email_funcionarios);
			$verifica_email_funcionario->execute();
			if($contador_email<1 && $contador_email_funcionario<1){
				if ($senha == $senhaConfirma){
					$sql = "INSERT INTO tb_clientes VALUES (?,?,?,?,?,?,?,?,?)";
					$contatos = $fusca -> prepare($sql);	
					$contatos -> execute(array($id_cliente,$nome,$email,$cargo,$telefone_celular,$data_nascimento,$senha_crip,$sexo,$mesa));
		  			$fusca = NULL;
		  			echo "	
		  				<script>
							alert('Cadastro realizado com sucesso!');
							window.location.href='logar.php';
						</script>";
				}else{
					$fusca = NULL;
		            echo "	
		            	<script>
							alert('As senhas não conferem!');
							
						</script>";
				}
			}else{
				$fusca = NULL;
				echo "
				<script>
					alert('E-mail já em uso');
				</script>";
				}
			}
			
		}
	}
	
?>
	<body class="">
		<a href="logar.php"><nav id="nav"><img src="../food_premium/img/logo.png" class="img"></nav></a>
		<br><center><h1>Cadastro de cliente</h1></center>
		<div class="container-fluid">
			<div class="card mb-3">
				<div class="card-header">
					<div class="card-body">
						<div class="table-responsive">
							<form method="POST" action="../controller/cadastrarClientePadraoController.php">
								<div class="col-sm-12">
									<div class="row">
										<div class="col-lg-6 col-sm-12 form-group">
											<label>Nome completo</label>
											<input type="text" name="nome" placeholder="" class="form-control" required autofocus>
										</div>
										<div class="col-lg-6 col-sm-12 form-group">
											<label>E-mail</label>
											<input type="email" name="email" placeholder="" class="form-control">
										</div>
									</div>
									<div class="row">
										<div class="col-lg-4 col-sm-12 form-group">
											<label>Sexo</label><br>
											<input type="radio" name="sexo" value="F"required /> Feminino
											<input type="radio" name="sexo" value="M"/> Masculino
										</div>
										<div class="col-lg-4 col-sm-6 form-group">
											<label>Telefone celular</label>
											<input type="text" name="numeroTelefone" placeholder="" class="form-control" required onkeypress="return valTELEFONECELULAR(event,this); return false;" maxlength="14" title="Telefone celular">
										</div>
										<div class="col-lg-4 col-sm-6 form-group">
											<label>Data de nascimento</label>
											<input type="date" name="dataNascimento" placeholder="" class="form-control" required>
										</div>
									</div>
									<div class="row">
										<div class="col-lg-6 col-sm-12 form-group">
											<label>Senha</label>
											<input type="password" name="senha" placeholder="" class="form-control" maxlength="12" required>
										</div>
										<div class="col-lg-6 col-sm-12 form-group">
											<label>Confirmar senha</label>
											<input type="password" id="senha_confirma" name="confSenha"  class="form-control" required>
										</div>										
									</div><br>
									<center>
										<input class="btn btn-primary btn-block" style="width:100px;" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal" type="submit" name="salvar" value="Salvar">				
									</center>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		<script type="text/javascript">
			/*permite somente valores numéricos*/
			// function valCPF(e,campo){
			// 	var tecla=(window.event)?event.keyCode:e.which;
			// 	if((tecla > 47 && tecla < 58)){
			// 		mascara(campo, '###.###.###-##');
			// 		return true;
			// 	}else{
			// 		if (tecla != 8) return false;
			// 		else return true;
			// 	}
			// }
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
			/*cria a mascara*/
			function mascara(src, mask){
				var i = src.value.length;
				var saida = mask.substring(1,2);
				var texto = mask.substring(i);
				if (texto.substring(0,1) != saida){
					src.value += texto.substring(0,1);
				}
			}
		</script>
		<!-- Bootstrap core JavaScript-->
		<script>
			$('#myModal').modal({
				backdrop: 'static',
				keyboard: false
			});
		</script>
		<script src="../food_premium/vendor/jquery/jquery.min.js"></script>
		<script src="../food_premium/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
		<script src="../food_premium/vendor/jquery-easing/jquery.easing.min.js"></script>
	</body>
</html>