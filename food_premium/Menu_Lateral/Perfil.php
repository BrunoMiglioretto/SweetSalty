    <?php 
		  session_start();
			if(!isset($_SESSION['id_funcionario'])){
				header("Location:../Funcoes/logar.php");
			}else{
				$id =$_SESSION['id_funcionario'];
			}
			
			include "../Funcoes/conexao.php";
			$sql = "SELECT * FROM tb_funcionario WHERE id_funcionario = $id";
			$contatos = $fusca -> prepare($sql);
			$contatos -> execute();
			
			foreach($contatos as $edita){
			
			if(isset($_POST['salvar'])){
				$cargo  		=  $_POST["Cargo"]; 
				$nome 			=  $_POST["Nome"]; 
				$sobrenome  =  $_POST["Sobrenome"]; 
				$email 			=  $_POST["Email"]; 
				$tel_resi  	=  $_POST["Telefone_residencial"]; 
				$tel_cel  	=  $_POST["Telefone_celular"]; 
				$CPF  			=  $_POST["CPF"]; 
				$RG  				=  $_POST["RG"]; 
				$senha  		=  $_POST["Senha"]; 
				$senhaConfirma 	=	 $_POST["senha_confirma"];	
				
				if ($senha == $senhaConfirma) {	
					
				$query = "UPDATE tb_funcionario SET
										Cargo='$cargo',
										Nome='$nome',
										Sobrenome='$sobrenome',
										Email='$email',
										Telefone_residencial='$tel_resi',
										Telefone_celular='$tel_cel',
										CPF='$CPF',
										RG='$RG',
										Senha='$senha'
								 	WHERE id_funcionario = '$id'";
				$sql = $fusca -> prepare($query);
				$sql -> execute();			
				$sql = null;
				
				echo "<script>
						alert('Perfil editado com sucesso!');
						window.location.href='Perfil.php';
					</script>";
					
				}  else {
            
            echo "<script>
							alert('As senhas não conferem!');
							window.location.href='Perfil.php?id_funcionario=$id';
						</script>";
						
        }
			}
		}
	?>
	<html lang="PT-BR">
	<head>
	  <meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	  <link rel="icon" href="../img/vermelha.png" type="image/x-icon">
	  <title>Perfil | Sweet Salty</title>
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
	<body>
		<!--------------------------------------INCLUDE MENU---------------------------------------->
			<?php 
			    if($_SESSION["cargo"]=='Recepcao'){
    			include '../Menu_Lateral/Menu_Recepcao.php'; 
			    }
			    if($_SESSION["cargo"]=='Gerente'){
    			include '../Menu_Lateral/Menu_Gerente.php'; 
    			}
    			if($_SESSION["cargo"]=='Caixa'){
    			include '../Menu_Lateral/Menu_Caixa.php'; 
    			}
    			if($_SESSION["cargo"]=='Fornecedor'){
    			include '../Menu_Lateral/Menu_Fornecedor.php'; 
    			}
    			if($_SESSION["cargo"]=='Garçom'){
    			include '../Menu_Lateral/Menu_Garcom.php'; 
    			}
    			if($_SESSION["cargo"]=='Cozinha'){
    			include '../Menu_Lateral/Menu_Cozinha.php'; 
    			}
    			
    			?>	
		<!----------------------------------------FIM INCLUDE--------------------------------------->
		<!-------------------------------------------CONTEUDO--------------------------------------->
				<br><br><br><div class="container">
					
					<div class="content-wrapper">
				    <div class="container-fluid">
							<div class="card mb-3">
				        <div class="card-header">
				        <div class="card-body">
				          <div class="table-responsive">
										<div class="">
											<div class="left">
												<center><h1 title="Meu perfil">Meu perfil</h1></center><br>
													<form method="POST" action="">
														<div class="col-sm-12">
															<div class="row">
																<div class="col-sm-6 form-group">
																	<label>Nome</label>
																	<input type="text" title="Nome" placeholder="Nome" name="Nome" class="form-control" required value="<?PHP echo $edita['Nome'];?>">
																</div>
																<div class="col-sm-6 form-group">
																	<label>Sobrenome</label>
																	<input title="Sobrenome" name="Sobrenome" class="form-control" title="Sobrenome" value="<?PHP echo $edita['Sobrenome'];?>"a>
																</div>
															</div>					
															<div class="row">
																<div class="col-sm-4 form-group">
																	<label>E-mail</label>
																  <input title="E-mail" type="email" placeholder="Email" name="Email" class="form-control" class="form-control" required value="<?PHP echo $edita['Email'];?>">
																</div>	
																<div class="col-sm-4 form-group">
																		<label>Telefone Residencial</label>
																	<input title="Telefone Residencial" type="text" placeholder="Telefone Residencial" name="Telefone_residencial" onkeypress="return valTELEFONE(event,this); return false;" maxlength="13" class="form-control" required value="<?PHP echo $edita['Telefone_residencial'];?>">	
																</div>	
																<div class="col-sm-4 form-group">
																	<label>Telefone Celular</label>
																  <input title="Telefone Celular" type="text" placeholder="Telefone Celular" name="Telefone_celular" onkeypress="return valTELEFONE(event,this); return false;" maxlength="14" class="form-control" required value="<?PHP echo $edita['Telefone_celular'];?>">
																</div>		
															</div>
															<div class="row">
																<div class="col-sm-4 form-group">
																	<label>RG</label>
																  <input title="RG" type="text" placeholder="RG" name="RG"  readonly="readonly" class="form-control" required value="<?PHP echo $edita['RG'];?>">
																</div>		
																<div class="col-sm-4 form-group">
																	<label>CPF</label>
																	<input title="CPF" type="text" placeholder="CPF" name="CPF"  readonly="readonly" class="form-control" required value="<?PHP echo $edita['CPF'];?>">
																</div>	
																<div class="col-sm-4 form-group">
																	<label>Cargo</label>
																	<input title="Cargo" type="text" placeholder="Cargo" name="Cargo"  class="form-control" readonly="readonly" required value="<?PHP echo $edita['Cargo'];?>">
																</div>
																<div class="col-sm-4 form-group">
																	<label>Senha</label>
																  <input title="Senha" type="password" placeholder="Senha" name="Senha"  class="form-control" required value="<?PHP echo $edita['Senha'];?>">
																</div>	
																<div class="col-sm-4 form-group">
																	<label>Confirmar senha</label>
																	<input title="Confirmar senha" type="password" placeholder="Confirmar senha" id="senha_confirma" name="senha_confirma"  class="form-control" required>
																</div>
															</div>						
															<input title="Salvar" type="submit" name="salvar" value="Salvar" class='btn btn-primary' style='float: right;'>				
														</div>
													</form>
											</div>
										</div>
									</div>
								</div>
							</div>
   				 </div>
    		</div>
    	</div>
    </div>
		</div>
		<!---------------------------------------FIM CONTEUDO--------------------------------------->
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
		<!------------------------------FIM Botão de voltar ao topo---------------------------------->
		<!--------------------------------------INCLUDE FOOTER--------------------------------------->
			<?php include '../Menu_Lateral/footer.html'; ?>	
		<!----------------------------------------FIM INCLUDE---------------------------------------->
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
		</div>
	</body>
</html> 
