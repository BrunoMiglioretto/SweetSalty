<?php
 	session_start();
  $id_c = $_SESSION['id_cliente'];
  //var_dump($id_c);
?>
<?php
	if(isset($_POST["enviar"])){
		$id_pagamento  	 		=  ""; 
		$id_cliente  				=  $_SESSION["id_cliente"]; 
		$forma_pagamento    =  $_POST["pagamento"]; 
		$valor_pago     	  =  $_POST["valor"]; 

		include "../Funcoes/conexao.php";
		$sql = "INSERT INTO tb_pagamento VALUES (?,?,?,?)";
		$contatos = $fusca -> prepare($sql);	
		$contatos -> execute(array($id_pagamento,$id_cliente,$forma_pagamento,$valor_pago));	
		$contatos = null; //Encerra a conexão com o BD	
		//header("Location: listar.php");
		
		echo"<script>
    		alert('Sucesso!');
    		window.location.href='Inserir_Produto.php';
    </script>";
		} 
		?>
		<?php
			include "../Funcoes/conexao.php";
			$sql = "SELECT SUM(Valor) as total FROM tb_pedidos WHERE Situacao = 'F' and id_cliente= '$id_c'";
			$contatos = $fusca->prepare($sql);
			$contatos->execute();
			
			foreach($contatos as $contar){
				$id_total = $contar["total"];
			}
		?>

<!DOCTYPE html>
<html lang="PT-BR">
	<head>
	  <meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	  <!-----------------------------------------TODOS CSS----------------------------------------->
	  <!-- Bootstrap CSS-->
	  <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	  <!--Template-->
	  <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	  <!-- Pageina CSS-->
	  <link href="../vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
	  <!-- Estilo Template-->
	  <link href="../css/sb-admin.css" rel="stylesheet">
	  <link rel="icon" href="../img/vermelha.png" type="image/x-icon">
		<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
		<style>
    	
    	.dataTables_filter, .dataTables_length, .dataTables_info, .pagination{
    		visibility: hidden!important;
    	}
    	
    </style>
		
		<title>Pedidos | Sweet Salty</title>
	  <!--------------------------------------FIM DE TODOS CSS-------------------------------------->
	</head>
	<body>
		<!--------------------------------------INCLUDE MENU---------------------------------------->
			<?php include '../Menu_Lateral/Menu_Cliente.php'; ?>	
		<!----------------------------------------FIM INCLUDE--------------------------------------->
		<!-------------------------------------------CONTEUDO--------------------------------------->
		<?php
			$sql = "SELECT Situacao FROM tb_pedidos";
			include "../Funcoes/conexao.php";
			$contatos = $fusca -> prepare($sql);
			$contatos-> execute();
			
			foreach($contatos as $lista){
			$situacao				= $lista["Situacao"];
			}
		?>
		
		<?php
		if($situacao == 'C'){
			echo "
		<br><br><br><br><center><h1 style='font-family: `Raleway`, sans-serif; font-size:50px; color:#F15821;'>Pedido enviado!</h1></center><br><br>
		  <div class='content-wrapper'>
    		<div class='container-fluid'>
					<div class='card mb-3'>
        		<div class='card-header'>
        				<div class='card-body'>
          				<div class='table-responsive'>
											<div class='td'>
												<center><p style='font-family: `Raleway`, sans-serif; font-size:30px; color:#F15821;'>Seu pedido está sendo preparado!</p></center>
											</div>
									</div>
								</div>
							</div>
   				 </div>
    		</div>
    	</div>";
    	}else if($situacao == 'F'){
    		echo "<br><br><br><br><center><h1 style='font-family: `Raleway`, sans-serif; font-size:50px; color:#F15821;'>Lista de pedidos</h1></center>
    		<div class='content-wrapper' class='print'>	
	    	<div class='container-fluid' class='print'>
	    		<div class='card-body' class='print'>
	    		 <div class='card-header'><input type='text' readonly='readonly' value='R$ $id_total' style='float:right;width:100px;color:#F15821; height:50px; font-size:20px;border-radius: 5px; border: 1px solid transparent;' ><input type='text' value='Valor total:' readonly='readonly' style='float:right;width:100px; height:50px; font-size:20px;border-radius: 5px; border: 1px solid transparent;'><button type='button' class='btn btn-primary' style='float:left;' data-toggle='modal' data-target='#exampleModal1'>Realizar Pagamento</button>
	    		  <div class='card-body'>
	    			<div class='table-responsive' class='print'>
            	<table class='table table-bordered' id='dataTable' width='100%' cellspacing='0' class='print'>
								<thead>
	              	<tr>
										<th>Categoria</th>
										<th>Pedido</th>
										<th>Quantidade</th>
										<th>Valor</th>
					       	</tr>
				     		</thead>
						     <tbody>";

										$sql = "SELECT * FROM tb_pedidos WHERE id_cliente='$id_c' and Situacao = 'F'";
											include "../Funcoes/conexao.php";
											$contatos = $fusca -> prepare($sql);
											$contatos-> execute();
										
											foreach($contatos as $lista){
												$id_cliente			= $lista["id_cliente"];
												$cardapio_cat		= $lista["cardapio_cat"];
												$pedido 				= $lista["Pedido"];
												$quantidade 		= $lista["Quantidade"];
												$valor 					= $lista["Valor"];

												echo "<tr>";
												echo "<td>".$cardapio_cat."</td>";
												echo "<td>".$pedido."</td>";
												echo "<td>".$quantidade."</td>";
												echo "<td>".$valor."</td>";
												echo "</tr>";	
											}
								echo "
								</tbody>
            	</table>
          	</div>
          </div>
         </div>
       </div>
        </div>
        <br><br><br><br>";
    	}
    	?>
    	<!-- Modal-->
			<div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			  <div class="modal-dialog" role="document">
			    <div class="modal-content">
			      <div class="modal-header">
			        <h5 class="modal-title" id="exampleModalLabel">Selecione a forma de pagamento</h5>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          <span aria-hidden="true">&times;</span>
			        </button>
			      </div>
			      <div class="modal-body" style="float:right;">
			        <a href="pagamento.php"><button style="background:transparent; border-radius:5px; border:solid 1px #c5c5c5;" type="submit" name="pagamento"><img src="../img/dinheiro.png">&nbspDinheiro</button></a>&nbsp
			        <a href="pagamento.php"><button style="background:transparent; border-radius:5px; border:solid 1px #c5c5c5;" type="submit" name="pagamento"><img src="../img/debito.png">&nbspDébito</button></a>&nbsp
			        <a href="pagamento.php"><button style="background:transparent; border-radius:5px; border:solid 1px #c5c5c5;" type="submit" name="pagamento"><img src="../img/credito.png">&nbspCrédito</button></a>&nbsp
			        <a href="pagamento.php"><button style="background:transparent; border-radius:5px; border:solid 1px #c5c5c5;" type="submit" name="pagamento"><img src="../img/alimentacao.png">&nbspRefeição</button></a>
			      </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-secondary" data-dismiss="modal" name="enviar">Cancelar</button>
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
			<script type="text/javascript">
			function id( el ){
				return document.getElementById( el );
			}
			function menos( id_qnt ) 
			{
				var qnt = parseInt( id( id_qnt ).value );
				if( qnt > 0 )
					id( id_qnt ).value = qnt - 1; 
			} 
			function mais( id_qnt )
			{
				id( id_qnt ).value = parseInt( id( id_qnt ).value ) + 1; 
			} 
		</script>
		<script src="atualizarValor.js"></script>
		<script>
			atualizarValor();
		</script>
		<!----------------------------------------FIM JAVA-------------------------------------------->
	  </div>
	</body>
</html>