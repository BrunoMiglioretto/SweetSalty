<?php
	session_start();
	
	include "../../controller/clienteController/listaCardapioController.php";
?>
<!DOCTYPE html>
<html lang="PT-BR">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
		<link href="../vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
		<link href="../css/sb-admin.css" rel="stylesheet">
		<script type="text" src="Cliente/pace.min.js"></script>
		<link rel="icon" href="../img/logo.png" type="image/x-icon">
		<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
		<title>Cardápio de Doces | Sweet Salty</title>
		<script src="../vendor/jquery/jquery.min.js"></script>
		<script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
		<script src="../vendor/jquery-easing/jquery.easing.min.js"></script>
		<script src="../alertifyjs/alertify.min.js"></script>
		<link rel="stylesheet" href="../alertifyjs/css/alertify.min.css">
		<link rel="stylesheet" href="../alertifyjs/css/themes/default.min.css">
	</head>
	<body id="page-top">
		<?php include 'menuLateral.php'?>	
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
													$doces = Cardapio::visualizarAlimentos("Doces");											
													foreach($doces as $cardapio){
														$cardapio_id 				 = $cardapio["id_cardapio"];
														$cardapio_desc 				 = $cardapio["nome"];
														$cardapio_valor 			 = $cardapio["valor_unitario"];
														$cardapio_subcategoria       = $cardapio["nome_cardapio_subcat"];
														$cardapio_cat 				 = $cardapio["nome_cardapio_cat"];
														$calorias                    = $cardapio["calorias"];
														echo "<a class='list-group-item' style='color:#F15821;'><h6>".$cardapio_desc."<p style='margin-top:0px; float: right;'><i>$calorias cal</i>&nbsp&nbsp&nbspR$". $cardapio_valor."  &nbsp;";
												?>
													<input class='btn btn-primary' type='BUTTON' class='btn btn-info btn-lg' value='Adicionar' type='button' class='btn btn-xs btn-primary' data-toggle='modal' data-target='#myModal<?php echo $cardapio_id;?>'></h6></p></a>
													<div class="col-lg-6">
														<div class="panel panel-default">
															<div class="panel-heading"></div>
																<div class="panel-body">
																	<!-- Modal -->
																	<div class="modal fade" id="myModal<?php echo $cardapio_id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                                        <div class="modal-dialog">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                    <h4 class="modal-title" id="myModalLabel"><?php echo " Adicionar <input class='input' type='text' disabled name='cardapio_cat' value='$cardapio_cat' readonly='readonly' style='width:220px; background-color:transparent;border: 1px solid transparent;'/>&nbsp "?></h4>
                                                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                                                </div>
                                                                                <div class="modal-body">
                                                                                    <?php echo "<input class='input' type='text' disabled name='cardapio_desc' value='$cardapio_desc' readonly='readonly' style='width:220px; background-color:transparent;border: 1px solid transparent;'/>&nbsp R$<input class='input' type='text' disabled name='cardapio_valor' style='width:80px; border:0px;background-color:transparent;' readonly='readonly'value=' $cardapio_valor'/>"?>
                                                                                    <p style="float:right;">
                                                                                        <input type="button" class="btn btn-primary" value="-" onclick="menos( '<?php echo $cardapio_id;?>' )">
                                                                                        <input type="text"  name="quantidade" id="<?php echo $cardapio_id;?>" value="1" size="1" readonly="readonly" />
                                                                                        <input type="button" class="btn btn-primary" value="+" onclick="mais( '<?php echo $cardapio_id;?>' )">
                                                                                    </p>
																					<?= "<p>Tipo: ".$cardapio_subcategoria."</p>"?>
                                                                                </div>
                                                                                <div class="modal-footer">
                                                                                    <input type="button" class="btn btn-primary" name="salvar" data-dismiss="modal" onclick="addProduto(<?= $cardapio_id?>)" value="Adicionar">
                                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
																</div>
															</div>
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
		<br><br>
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
				if(id( id_qnt ).value < 10)
					id( id_qnt ).value = parseInt( id( id_qnt ).value ) + 1; 
			} 
		</script>
		<script>
            function addProduto(idProduto){
                let quantidade = $("input[id=" + idProduto + "]").val();
                $.ajax({
                    url: "../../controller/clienteController/carrinho/addPedidoController.php",
                    method : "POST",
                    data : {
                        idCardapio : idProduto,
                        quant : quantidade
                    }
                }).done(function(){
					alertify.set('notifier','position', 'bottom-center');
                    alertify.success('Adicionado aos pedidos', 'success', 5);
                });
                
            }
        </script>
	</body>
</html>