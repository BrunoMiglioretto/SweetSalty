<!DOCTYPE html>
<?php
	$id = $_GET['id_cliente'];
	include "../../Funcoes/conexao.php";
	$sql = "SELECT * FROM tb_clientes WHERE id_cliente = $id";
	$contatos = $fusca -> prepare($sql);
	$contatos -> execute();

	foreach($contatos as $edita){
		
		

		if(isset($_POST['salvar'])){
			$nome 					=  $_POST["Nome_Cliente"];
			$email 					=  $_POST["Email"]; 
			$cel  					=  $_POST["Celular"];
			$datanasc 			=  $_POST["Data_Nascimento"]; 
			$senha  				=  $_POST["Senha"];
			$senhaConfirma 	=	 $_POST["senha_confirma"];
			$sexo  					=  $_POST["Sexo"]; 
			
			if (1) {
				
      	$query = "UPDATE tb_clientes SET
						Nome_Cliente='$nome',
						Email='$email',
						Celular='$cel',
						Data_Nascimento='$datanasc',
						Senha='$senha',
						Sexo='$sexo'
				 	WHERE id_cliente = '$id'";
				 	
					$sql = $fusca -> prepare($query);
					$sql -> execute();			
					$sql = null;
					
					echo "<script>
							alert('Cliente editado com sucesso!');
							window.location.href='../lista_clientes.php';
						</script>";
						
        } else {
            
            echo "<script>
							alert('As senhas não conferem!');
							window.location.href='Editar_Cliente.php?id_cliente=$id';
						</script>";
						
        }
				
		
		}
	}
?>
<html lang="PT-BR">
	<head>
	  <meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	  <link rel="icon" href="../../img/logo.png" type="image/x-icon">
	  <title>Estoque | Sweet Salty</title>
	  <!--------------------------------------------Logar------------------------------------------>
	  <!-----------------------------------------Fim Logar----------------------------------------->
	  <!-----------------------------------------TODOS CSS----------------------------------------->
	  <!-- Bootstrap CSS-->
	  <link href="../../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	  <!--Template-->
	  <link href="../../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	  <!-- Pageina CSS-->
	  <link href="../../vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
	  <!-- Estilo Template-->
	  <link href="../../css/sb-admin.css" rel="stylesheet">
	  <!--------------------------------------FIM DE TODOS CSS-------------------------------------->
	</head>
	<body>
		<!--------------------------------------INCLUDE MENU---------------------------------------->
			<?php include 'Menu_CRUD.php'; ?>	
		<!----------------------------------------FIM INCLUDE--------------------------------------->
		<br><br><br><br><center><h1>Editar Cliente</h1></center>
		<div class="content-wrapper">
	    <div class="container-fluid">
				<div class="card mb-3">
	        <div class="card-header">
	        <div class="card-body">
	          <div class="table-responsive">
												<form method="POST" action="">
													<div class="col-sm-12">
														<div class="row">
															<div class="col-sm-4 form-group">
																<label>Nome</label>
																<input type="text"  placeholder="Nome" name="Nome_Cliente" class="form-control" required value="<?PHP echo $edita['Nome_cliente'];?>">
															</div>
															<div class="col-sm-4 form-group">
															 <label>E-mail</label>
																<input type="email" placeholder="Email" name="Email" class="form-control" class="form-control" required value="<?PHP echo $edita['Email'];?>">
															</div>	
															<div class="col-sm-4 form-group">
																<label>Sexo</label><br>
																<input type="radio" name="Sexo" <?PHP if($edita['Sexo'] == 'F'){ 			echo "checked";}?>   value='F'>Feminino &nbsp&nbsp
																<input  type="radio" name="Sexo"  <?PHP if($edita['Sexo'] == 'M'){			echo "checked";}?>   value='M'>Masculino
															</div>
														</div>					
														<div class="row">
															<div class="col-sm-6 form-group">
																<label>Telefone Celular</label>
																<input type="text" placeholder="Telefone Celular" name="Celular"  class="form-control" required value="<?PHP echo $edita['Celular'];?>">
															</div>
															<div class="col-sm-6 form-group">
																<label>Data de Nascimento</label>
																<input type="date" placeholder="Data de Nascimento" name="Data_Nascimento"  class="form-control" required value="<?PHP echo $edita['Data_Nascimento'];?>">
															</div>
														</div>
																	<input type="hidden" placeholder="Senha" id="senha" name="Senha"  class="form-control" required value="<?PHP echo $edita['Senha'];?>">
													<div class="">
														<input class="btn btn-primary" type="submit" name="salvar" value="Salvar" style="width: 100px;">	
														<div>
												</form>
										</div>
									</div>
								</div>
	   				 </div>
	    		</div>
	    	</div>
    </div>
	
	<!---------------------------------------FIM CONTEUDO--------------------------------------->
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
				<a class="btn btn-primary" href="../../logout.php">Sair</a>
			  </div>
			</div>
		  </div>
		</div>
		<!------------------------------FIM Botão de voltar ao topo---------------------------------->
		<!--------------------------------------INCLUDE FOOTER--------------------------------------->
			<?php include '../../Menu_Lateral/footer.html'; ?>	
		<!----------------------------------------FIM INCLUDE---------------------------------------->
		<!------------------------------------------- JAVA------------------------------------------->
		<!-- Bootstrap core JavaScript-->
		<script src="../../vendor/jquery/jquery.min.js"></script>
		<script src="../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
		<!-- Core plugin JavaScript-->
		<script src="../../vendor/jquery-easing/jquery.easing.min.js"></script>
		<!-- Page level plugin JavaScript-->
		<script src="../../vendor/chart.js/Chart.min.js"></script>
		<script src="../../vendor/datatables/jquery.dataTables.js"></script>
		<script src="../../vendor/datatables/dataTables.bootstrap4.js"></script>
		<!-- Custom scripts for all pages-->
		<script src="../../js/sb-admin.min.js"></script>
		<!-- Custom scripts for this page-->
		<script src="../../js/sb-admin-datatables.js"></script>
		<script src="../../js/sb-admin-charts.min.js"></script>
		<script>
			function teste(){
				window.print();
			}
		</script>
		<!----------------------------------------FIM JAVA-------------------------------------------->
	  </div>
	</body>
</html>