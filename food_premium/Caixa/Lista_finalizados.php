<?php
	session_start();
  	$id = $_SESSION['id_funcionario'];
?>
<!DOCTYPE html>
<html lang="PT-BR">
	<head>
	  <meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	 	<link rel="icon" href="../img/vermelha.png" type="image/x-icon">
	  <title>Pedidos Finalizados | Sweet Salty</title>
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
		<?php include '../Menu_Lateral/Menu_Recepcao.php' ?>
		<!----------------------------------------FIM INCLUDE--------------------------------------->
		<!-------------------------------------------CONTEUDO--------------------------------------->
		<br><br><br>
		<div class="content-wrapper">
	    	<div class="container-fluid" class='print'>
	    		<div class="card-header">		
	    			<center><h5>Pedidos Finalizados</h5></center>
      			</div>
	    		<div class="card-body" class='print'>
	    			<div class="table-responsive" class='print'>
            			<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" class='print'>
							<thead>
              					<tr>
									<th>Cliente</th>
									<th>Mesa</th>
									<th>Forma de Pagamento</th>
									<th>Total</th>
									<th>Troco</th>
									<th>Finalizado</th>
				       			</tr>
			     			</thead>
					     	<tbody>
								<?php
									$v = 0;
									$id_armazenado = "";
									include "../Funcoes/conexao.php";
									$comando = "SELECT tb_clientes.id_cliente, Nome_cliente, mesa, Valor, Quantidade, Situacao, Troco FROM tb_pedidos INNER JOIN tb_clientes ON tb_pedidos.id_cliente = tb_clientes.id_cliente LEFT JOIN tb_troco ON tb_pedidos.id_cliente = tb_troco.id_cliente WHERE Situacao=1 OR Situacao=2 OR Situacao=3 OR Situacao=4";
									$contatos = $fusca->prepare($comando);
									$contatos->execute();
									$qtd_linhas = $contatos->rowCount();
									echo "<script>alert($qtd_linhas);</script>";
									foreach($contatos as $carrega){
										$id_cliente = $carrega['id_cliente'];
										$nome = $carrega['Nome_cliente'];
										$mesa = $carrega['mesa'];
										$valor = $carrega['Valor'];
										$quantidade = $carrega['Quantidade'];
										$pagamento = $carrega['Situacao'];
										$troco = $carrega['Troco'];
										if($v == 0){
											$id_armazenado = $id_cliente;
										}
										if($id_cliente == $id_armazenado){
											$nome_armazenado = $nome;
											$mesa_armazenado = $mesa;
											$pagamento_armazenado = $pagamento;
											$total = $total + ($valor*$quantidade);
											$troco_armazenado = $troco;
										}else{
											if($pagamento_armazenado == 1){
												$pagamento_armazenado = "Dinheiro";
											}
											if($pagamento_armazenado == 2){
												$pagamento_armazenado = "Débito";
											}
											if($pagamento_armazenado == 3){
												$pagamento_armazenado = "Crédito";
											}
											if($pagamento_armazenado == 4){
												$pagamento_armazenado = "Refeição";
											}
											echo "
												<tr>
													<td>$nome_armazenado</td>
													<td>$mesa_armazenado</td>
													<td>$pagamento_armazenado</td>
													<td>R$$total</td>
													<td>$troco_armazenado</td>
													<td><a href='historico.php?id_cliente=$id_armazenado'><img src='../img/Finalizado.png'></a></td>
												</tr>
											";	
											$total = 0;
											$id_armazenado = $id_cliente;
											$nome_armazenado = $nome;
											$mesa_armazenado = $mesa;
											$pagamento_armazenado = $pagamento;
											$total = $total + ($valor*$quantidade);
											$troco_armazenado = $troco;
										}
										if($v == ($qtd_linhas-1) && $v != 0){
											if($pagamento_armazenado == 1){
											$pagamento_armazenado = "Dinheiro";
											}
											if($pagamento_armazenado == 2){
												$pagamento_armazenado = "Débito";
											}
											if($pagamento_armazenado == 3){
												$pagamento_armazenado = "Crédito";
											}
											if($pagamento_armazenado == 4){
												$pagamento_armazenado = "Refeição";
											}
											echo "
												<tr>
													<td>$nome_armazenado</td>
													<td>$mesa_armazenado</td>
													<td>$pagamento_armazenado</td>
													<td>R$$total</td>
													<td>$troco_armazenado</td>
													<td><a href='historico.php?id_cliente=$id_armazenado'><img src='../img/Finalizado.png'></a></td>
												</tr>
											";	
										}
										$v++;
									}
									$contatos = NULL;
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
	  </div>
	</body>
</html>
