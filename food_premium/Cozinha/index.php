<?php
	session_start();
	$id = $_SESSION["id_cliente"];
	if(!isset($_SESSION['id_cliente'])){
		header("Location: ../logar.php");
	}
?>
<?php
	include "../Funcoes/conexao.php";
	$sql = "SELECT * FROM tb_pedidos";
	$contatos = $fusca -> prepare($sql);
	$contatos -> execute();
	foreach($contatos as $edita){
		$si = $edita["Situacao"];
		if(isset($_GET['id'])){
			$id = $_GET['id'];
			$Situacao1 = $si;	
			$Situacao = "F"; 
			$query = "UPDATE tb_pedidos SET Situacao='F' WHERE id_pedido ='$id'";
			$sql = $fusca -> prepare($query);
			$sql -> execute();			
			$fusca = NULL;
			header("location:index.php");
		}
	}
?>		
<!DOCTYPE html>
<html lang="PT-BR">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="icon" href="../img/logo.png" type="image/x-icon">
		<title>Cozinha | Sweet Salty</title>
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
		<?php include '../Menu_Lateral/Menu_Cozinha.php'; ?>	
		<!----------------------------------------FIM INCLUDE--------------------------------------->
		<!-------------------------------------------CONTEUDO--------------------------------------->
		<br><br><br>
		<div class="container-fluid" class='print'>
    		<div class="card-header">		
    			<center><h5>Pedidos</h5></center>
  			</div>
    		<div class="card-body" class='print'>
    			<div class="table-responsive" class='print' style="margin-top: 15px;">
        			<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" class='print'>
						<thead>
              				<tr>
								<th>Numero</th>
								<th>Pedido</th>
								<th>Quantidade</th>
								<th>Unidade</th>
								<th>Finalizar</th>
				       		</tr>
			     		</thead>
					    <tbody>
							<?php
								include "../Funcoes/conexao.php";
								$sql = "SELECT id_pedido,Pedido,Quantidade, cardapio_quan FROM tb_pedidos LEFT JOIN tb_cardapio ON tb_pedidos.cardapio_id = tb_cardapio.cardapio_id WHERE tb_pedidos.Situacao = 'C'";
								$contatos = $fusca -> prepare($sql);
								$contatos-> execute();
								foreach($contatos as $lista){
									$id 				= $lista["id_pedido"];
									$Pedido 		= $lista["Pedido"];
									$Qtd 				= $lista["Quantidade"];
									$unidade 		= $lista["cardapio_quan"];
									$finalizar 	= "<center><a data-toggle='modal' data-target='#Modal$id'><img src='../img/Finalizado.png' title='Finalizado' name='final'></a></center>";
									echo "<tr>";
									echo "<td>".$id."</td>";
									echo "<td>".$Pedido."</td>";
									echo "<td>".$Qtd."</td>";
									echo "<td>".$unidade."</td>";
									echo "<td>".$finalizar."</td>";
									echo "</tr>";
									echo "
										<div class='modal fade' id='Modal$id' tabindex='-1' role='dialog' aria-labelledby='exampleModalCenterTitle' aria-hidden='true'>
											<div class='modal-dialog modal-dialog-centered' role='document'>
											    <div class='modal-content'>
											    	<div class='modal-header'>
												        <h5 class='modal-t'itle' id'='exampleModalLongTitle'>Finalizar</h5>
													    <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
													    	<span aria-hidden='true'>&times;</span>
													    </button>
													</div>
													<div class='modal-body'>
														Deseja finalizar $Pedido?
												    </div>
													<div class='modal-footer'>
														<button type='button' class='btn btn-secondary' data-dismiss='modal'>Cancelar</button>
														<form action='Finalizar_pedido.php?id=$id' method='POST'>
							    		    				<button type='submit' class='btn btn-primary'>Finalizar</button>
														</form>
													</div>
												</div>
											</div>
										</div>";
								}
				     		?>
            			</tbody>
    				</table>
  				</div>
			</div>
		</div><br><br><br><br>			
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
		<!------------------------------------------- JAVA------------------------------------------->
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
		<script>
			<?php
				$contador = $contatos->rowCount();
			?>
			const linhas_1 = <?php echo $contador;?>;
			let intervalo = setInterval(function(){
			 	$.post("intervalo.php", function(linhas){
        			//alert("Data: " + linhas);
    				linhas_2 = linhas;
			 		if(linhas_1 != linhas_2){
    					location.reload();
    				}
			 	});
    			//alert(linhas_1 == linhas_2);
			},3000);
		</script>
	</body>
</html>
