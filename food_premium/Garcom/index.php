<?php
 	session_start();
  	$id = $_SESSION['id_funcionario'];
  	
  	if(isset($_GET['id_pedido'])){
  		$id_pedido = $_GET['id_pedido'];
  		include "../Funcoes/conexao.php";
  		$comando = "UPDATE tb_pedidos SET Situacao = 'PC' WHERE id_pedido = $id_pedido";
  		$pedido = $fusca->prepare($comando);
  		$pedido->execute();
  		$pedido = NULL;
  	}
?>
<!DOCTYPE html>
<html lang="PT-BR">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="icon" href="../img/logo.png" type="image/x-icon">
		<title>Garçom | Sweet Salty</title>
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
		<!----------------------------------------FIM INCLUDE--------------------------------------->
		<?php include '../Menu_Lateral/Menu_Cozinha.php'; ?>	
		<!-------------------------------------------CONTEUDO--------------------------------------->
		<br><br><br>
		<div class="content-fluid">
			<div class="container-fluid" class='print'>
				<div class="card-header">		
					<center><h5>Pedidos Prontos</h5></center>
				</div>
				<div class="card-body" class='print'>
					<div class="table-responsive" class='print' style="margin-top: 15px;">
						<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" class='print'>
							<thead>
								<tr>
									<th>Pedido</th>
									<th>Mesa</th>
									<th>Cliente</th>
									<th>Quantidade</th>
									<th>Concluir</th>
								</tr>
							</thead>
							<tbody>
								<form action="" method="GET">
									<?php
										include "../Funcoes/conexao.php";
										$sql = "SELECT * FROM tb_pedidos INNER JOIN tb_clientes ON tb_pedidos.id_cliente = tb_clientes.id_cliente WHERE tb_pedidos.Situacao = 'F'";
										$contatos = $fusca->prepare($sql);
										$contatos->execute();
										foreach($contatos as $lista){
											$id_pedido 			= $lista["id_pedido"];
											$mesa 					= $lista["mesa"];
											$id_cliente 		= $lista["id_cliente"];
											$pedido 				= $lista["Pedido"];
											$qtd						= $lista["Quantidade"];
											$nome 					= $lista["Nome_cliente"];
											echo "<tr>";
											echo "<td>".$pedido."</td>";
											echo "<td>".$mesa."</td>";
											echo "<td>".$nome."</td>";
											echo "<td>".$qtd."</td>";
											echo "<td><a href='index.php?id_pedido=$id_pedido' title='Finalizar'><img src='../img/Finalizado.png'></a></td>";
											echo "</tr>";
										}
									?>
								</form>
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
	  </div>
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
