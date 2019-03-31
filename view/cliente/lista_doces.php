<?php

	session_start();
    if(isset($_POST["salvar"])){
        $id_pedido  			 = ""; 
        $id_cliente				 = $_SESSION["id_cliente"]; 
        $cardapio_cat			 = $_POST["cardapio_cat"];
        $cardapio_desc		     = $_POST["cardapio_desc"]; 
        $quantidade				 = $_POST["quantidade"]; 
        $cardapio_valor		     = $_POST["cardapio_valor"]; 
        $situacao 				 = "N";
        include "../Funcoes/conexao.php";
        // Pegar o nome do item
        $palavra = str_split($cardapio_desc);
        $carrega_letra = '';
        $contador = 0;
        while($carrega_letra != '-' && $contador < 50){
            $carrega_letra = $palavra[$contador];
            $contador++;
        }
        $cardapio_item = substr($cardapio_desc,0,($contador - 2));
        // Pegar a categoria do item
        $cardapio_letras = strlen($cardapio_desc);
        $cardapio_cate = substr($cardapio_desc,($contador + 1),$cardapio_letras);
        $comando = "SELECT cardapio_id FROM tb_cardapio WHERE cardapio_desc = '$cardapio_item'";
        $item = $fusca->prepare($comando);
        $item->execute();
        foreach($item as $carrega){
            $cardapio_id = $carrega['cardapio_id'];
        }
        $sql = "INSERT INTO tb_pedidos VALUES (?,?,?,?,?,?,?,?)";
        $contatos = $fusca->prepare($sql);
        $contatos->execute(array($id_pedido,$id_cliente,$cardapio_cat,$cardapio_desc,$quantidade,$cardapio_valor,$situacao,$cardapio_id));	
        $contatos = null; //Encerra a conexão com o BD	
        echo "  <script>
                    window.location.href='pedidos.php?p_novo=1';
                </script>";
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
    <script type="text" src="Cliente/pace.min.js"></script>
	  <link rel="icon" href="../img/logo.png" type="image/x-icon">
		<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
	  <title>Cardápio de Doces | Sweet Salty</title>
	  <!-- Bootstrap core JavaScript-->
		<script src="../vendor/jquery/jquery.min.js"></script>
		<script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
		<!-- Core plugin JavaScript-->
		<script src="../vendor/jquery-easing/jquery.easing.min.js"></script>
	  <!--------------------------------------FIM DE TODOS CSS-------------------------------------->
	</head>
	<body id="page-top">
		<!--------------------------------------INCLUDE MENU---------------------------------------->
			<?php include '../Menu_Lateral/Menu_Cliente.php'; ?>	
		<!----------------------------------------FIM INCLUDE--------------------------------------->
		<!-------------------------------------------CONTEUDO--------------------------------------->
		<!-------------------------------------------CONTEUDO--------------------------------------->
		<br><br><br><center><h1 style="font-family: 'Raleway', sans-serif; font-size:50px; color:#F15821;">Doces</h1></center>
		  <div class="content-wrapper">
    		<div class="container-fluid">
					<div class="card mb-3">
        		<div class="card-header">
        				<div class="card-body">
          				<div class="table-responsive">
											<div class="td">
											<div class="card" style="background:#71A149;">
												    <div class="card-header" id="headingSix" data-toggle="collapse" data-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix"> 
												      <h5 class="mb-0">
												        <button style="color:#fff; font-size:20px;" class="btn btn-link collapsed" data-toggle="collapse" aria-expanded="false" >
												          Doces
												        </button>
												      </h5>
												    </div>
												    <div id="collapseSix" class="collapse" aria-labelledby="headingSix" data-parent="#accordion">
												      <div class="card-body">
																		<?php
																			include "../Funcoes/conexao.php";
																			$sql = "SELECT * FROM tb_cardapio WHERE cardapio_cat = 'Doces' order by cardapio_desc asc";
																			$listar = $fusca -> prepare($sql);
																			$listar -> execute();
																			
																			foreach($listar as $cardapio){
																				$cardapio_id_c = $cardapio["cardapio_id"];
																				$cardapio_desc = $cardapio["cardapio_desc"];
																				$cardapio_valor =$cardapio["cardapio_valor"];
																				$cardapio_cat =$cardapio["cardapio_cat"];
																				$calorias = $cardapio["calorias"];
																				echo "<a class='list-group-item' style='color:#F15821;'><h6>".$cardapio_desc."<p style='margin-top:0px; float: right;'><i>$calorias cal</i>&nbsp&nbsp&nbspR$". $cardapio_valor."  &nbsp;";
																			?><input class='btn btn-primary' type='BUTTON' class='btn btn-info btn-lg' value='Adicionar' type='button' class='btn btn-xs btn-primary' data-toggle='modal' data-target='#myModal<?php echo $cardapio_id_c;?>'></h6></p></a>
																					<div class="col-lg-6">
												                    <div class="panel panel-default">
												                        <div class="panel-heading">
												                        </div>
												                        <!-- /.panel-heading -->
												                        <div class="panel-body">
												                            <!-- Modal -->
												                           <form method="POST" action="">
												                            <div class="modal fade" id="myModal<?php echo $cardapio_id_c;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
												                                <div class="modal-dialog">
												                                    <div class="modal-content">
												                                        <div class="modal-header">
												                                        	<h4 class="modal-title" id="myModalLabel"><?php echo " Adicionar <input class='input' type='text' name='cardapio_cat' value='$cardapio_cat' readonly='readonly' style='width:220px; border: 1px solid transparent;'/>&nbsp "?></h4>
												                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
												                                        </div>
												                                        <div class="modal-body">
												                                         
												                                         <form id="modalExemplo" method="post" action="">
																																	<?php echo "<input class='input' type='text' name='cardapio_desc' value='$cardapio_desc' readonly='readonly' style='width:220px; border: 1px solid transparent;'/>&nbsp 
																																	R$<input class='input' type='text' name='cardapio_valor' style='width:80px;border:0px;' readonly='readonly'value=' $cardapio_valor'/>"?>
																																		<p style="float:right;">
																																			<input type="button" class="btn btn-primary" value="-" onclick="menos( '<?php echo $cardapio_id_c;?>' )">
																																		<input type="text"  name="quantidade" id="<?php echo $cardapio_id_c;?>" value="1" size="1" readonly="readonly" />
																																		<input type="button" class="btn btn-primary" value="+" onclick="mais( '<?php echo $cardapio_id_c;?>' )">
																																		</p>	
																																</form> 
												                                            
												                                         </div>
												                                        <div class="modal-footer">
												                                            <input type="submit" class="btn btn-primary" name="salvar" value="Adicionar">
								        																						<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
												                                        </div>
												                                    </div>
												                                    <!-- /.modal-content -->
												                                </div>
												                                <!-- /.modal-dialog -->
												                            </div>
												                            </form>
												                            <!-- /.modal -->
												                        </div>
												                        <!-- .panel-body -->
												                    </div>
												                    <!-- /.panel -->
												                </div>
																		<?php
																			}
																		?>
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
    	</div><br><br>
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
				if( qnt > 1 )
					id( id_qnt ).value = qnt - 1; 
			} 
			function mais( id_qnt )
			{
				if(id( id_qnt ).value < 13)
					id( id_qnt ).value = parseInt( id( id_qnt ).value ) + 1; 
			} 
		</script>
		<!----------------------------------------FIM JAVA-------------------------------------------->
	  </div>
	</body>
</html>