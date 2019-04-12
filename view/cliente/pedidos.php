<?php
    session_start();

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
        <link rel="icon" href="../img/logo.png" type="image/x-icon">
        <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">		
		<title>Pedidos | Sweet Salty</title>
	    <script src="https://code.jquery.com/jquery-2.1.0.min.js"></script>
		<script src="../vendor/jquery/jquery.min.js"></script>
		<script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
		<script src="../vendor/jquery-easing/jquery.easing.min.js"></script>
	    <script>

            function excluirPedido(idPedido, idCardapio){
                $.ajax({
                    url : "../../controller/clienteController/carrinho/excluirPedidoController.php",
                    method : "POST",
                    data : {
                        idPedido : idPedido,
                        idCardapio : idCardapio
                    }
                }).done(function() {
                    setTimeout(function() {
                        atualizarPedido();
                    }, 50);
                });
            }

            function atualizarPedido(){
                $.ajax({
                    url : "../../controller/clienteController/carrinho/visualizarPedidosController.php"
                }).done(function(pedidos) {
                    $("#tabelaPedidos").html(pedidos);
                });
            }

            $(document).ready(function() {
                atualizarPedido();
                // campoSubtotal = $("#campoSubtotal");
                // campoSubtotal.value = $("subtotal"[0]).val();
            });

            function editarQuantidade (e) {
                document.getElementById(e).style.display="block";
                document.getElementById("d"+e).style.display="none";
                document.getElementById(e).focus();
            } 
            function editarTempo1 (e,id) {
                document.getElementById(e).style.display="none";
                document.getElementById("d"+e).style.display="block";
                var t = document.getElementById(e).value;
                if(t >= 13){
                    document.getElementById("d"+e).innerHTML= 13;
                    document.getElementById(e).value = 13;
                    t = 13;
                }
                else if(t <1){    
                    document.getElementById("d"+e).innerHTML= 1;
                    document.getElementById(e).value = 1;
                    t = 1;
                }else{
                    document.getElementById("d"+e).innerHTML=t;
                }
                var v =document.getElementById("v"+e).value;
                var total = t * v;
                total = total.toFixed(2).replace(".",",");
                document.getElementById("m"+e).innerHTML=total;
      		    $.ajax({
                    type:'POST',
                    url:'ajaxQuantidade.php',
                    data:'qtd='+t+"&id="+id,
                    success:function(html){
         	            $('#valortotal').html(html);
                    }
		  	    });
		  	   
            }
        </script>
        <style>
    	    .dataTables_filter, .dataTables_length, .dataTables_info, .pagination{
    		    visibility: hidden!important;
    	    }
        </style>
        <style>
            .pedido_N{
                width: 250px;
                padding: 20px 3px 20px 3px;
                margin: 0px;
                background-color: #F7F7F7;
                border: 2px solid #F15821;
                border-radius: 4px;
                text-align: center;
                position: fixed;
                right: 50px;
                top: 50px;
                font-family: Raleway, sans-serif;
                display: none;
            }
        </style>
	</head>
	<body id="page-top">
        <?php   
            include 'menuLateral.php';
        ?>
        <div class="pedido_N">
            <p>Pedido realizado com sucesso!</p>
        </div>
        <br><br><br><center><h1 style="font-family: 'Raleway', sans-serif; font-size:50px; color:#F15821;">Meu Pedido</h1></center>
        <div class="content-wrapper">
            <div class="container-fluid">
                <div class="card mb-3">
        			<div class="card-header">
          				<?php echo "<span id='valortotal'><input type='text' style='float:right;width:100px; background-color: #F7F7F7;height:50px; font-size:20px;border-radius: 5px; border: 1px solid transparent;' id='campoSubtotal' readonly='readonly'></span><input type='text' readonly='readonly' value='Valor total:' style='float:right;width:100px;font-size:20px; background-color: #F7F7F7;height:50px;border-radius: 5px; font-family: `Raleway`, sans-serif; color:#F15821;border: 1px solid transparent;'>"?>
        				<div class="card-body">
                            <div class="td">
                                <div class="container-fluid" class='print'>
                                    <div class="card-body" class='print'>
	          							<div class="table-responsive" class='print' id="atualiza">
            								<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" class='print'>
                                                <thead>
    							                	<tr>
                                                        <th>Pedido</th>
                                                        <th>Categoria</th>
                                                        <th>Quantidade</th>
                                                        <th>Valor unitário</th>
                                                        <th>Excluir</th>
                                                   </tr>
                                                </thead>
                                                <tbody id="tabelaPedidos">

								                </tbody>
            							    </table>
          								</div>
          								<div style='float: right;'>
          									<form method="POST" action=>
          									    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#cozinha">
                                                    Enviar para Cozinha
                                                </button>
          										<div class="modal fade" id="cozinha" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Enviar</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                Deseja mesmo enviar para a cozinha?
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Não</button>
                                                                <input type="submit" value="Enviar" name="Enviar" class="btn btn-secondary" style="background-color:#71a140">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
          									</form>
        								</div>
                                    </div>
                                </div><br>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><br><br>
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
                        <a class="btn btn-primary" href="../logout.php">Sair</a>
                    </div>
                </div>
            </div>
        </div>
        <?php include '../footer.html'; ?>	
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
			function menos( id_qnt ){
				var qnt = parseInt( id( id_qnt ).value );
				if( qnt > 1 )
					id( id_qnt ).value = qnt - 1; 
			}
			function mais( id_qnt ){
				id( id_qnt ).value = parseInt( id( id_qnt ).value ) + 1; 
			} 
		</script>
	</body>
</html>