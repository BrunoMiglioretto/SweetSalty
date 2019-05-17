<?php
    session_start();

    chdir("../");
?>		
<!DOCTYPE html>
<html lang="PT-BR">
	<head>
        <meta charset="utf-8">
        <base href="../">
        <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href="../vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
        <link href="../css/sb-admin.css" rel="stylesheet">
        <link rel="icon" href="../img/logo-min.png" type="image/x-icon">
        <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">		
		<title>Pedidos | Sweet Salty</title>
	    <script src="https://code.jquery.com/jquery-2.1.0.min.js"></script>
		<script src="../vendor/jquery/jquery.min.js"></script>
		<script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
		<script src="../vendor/jquery-easing/jquery.easing.min.js"></script>
        <script src="../alertifyjs/alertify.min.js"></script>
		<link rel="stylesheet" href="../alertifyjs/css/alertify.min.css">
		<link rel="stylesheet" href="../alertifyjs/css/themes/default.min.css">
	    <script>

            function attDadosModal(idPedido, idCardapio, nome){
                $("#idPedido").val(idPedido);
                $("#idCardapio").val(idCardapio);
                $("#nomeProdudoModal").html("Deseja mesmo excluir " + nome + "?");
            }

            function excluirPedido(){
                idPedido = $("#idPedido").val();
                idCardapio = $("#idCardapio").val();

                $.ajax({
                    url : "../../controller/clienteController/carrinho/excluirPedidoController.php",
                    method : "POST",
                    data : {
                        idPedido : idPedido,
                        idCardapio : idCardapio
                    }
                }).done(function() {
                    setTimeout(function() {
                        atualizarListaPedido();
                    }, 50);
                });
            }

            function atualizarListaPedido(){
                $.ajax({
                    url : "../../controller/clienteController/carrinho/visualizarPedidosController.php"
                }).done(function(pedidos) {
                    $("#tabelaPedidos").html(pedidos);
                    campoSubtotal = document.getElementById("campoSubtotal");
                    valor = document.getElementsByClassName("subtotal")[0].value;
                    campoSubtotal.value = "R$ " + valor;
                });
            }

            function atualizarPedido(campo, idCardapio){
                quant = campo.value;
                
                $.ajax({
                    url : "../../controller/clienteController/carrinho/attPedidoController.php",
                    method : "POST",
                    data : {
                        quant : quant,
                        idCardapio : idCardapio
                    }
                }).done(function() {
                    atualizarListaPedido()
                });
            }

            function enviarPedidos(){
                $.ajax({
                    url : "../../controller/clienteController/carrinho/enviarParaCozinhaController.php"
                }).done(function(n) {
                    if(n == "true")
                        window.location = "pedidos/pedidoEnviado.php";
                    else if(n == "false"){
                        alertify.alert("Sem itens","Adicione itens para enviar para cozinha").setting({
                            'transition' : 'zoom'
                        });
                    }else if(n == "2"){
                        alertify.confirm('Solicitação de junção', 'Há uma solicitação de junção de mesa, responda ela e em seguida envie para a cozinha', function() { 
                                window.location = "../../controller/clienteController/juncaoMesas/verificarSolicitacaoMesaController.php";
                            }, function() {}).set({
                                'transition' : 'zoom',
                                'defaultFocus' : '',
                                'movable': false,
                                labels:{
                                    ok: 'Ver Solicitação',
                                    cancel: 'Fechar'            
                                }
                        });
                    }else if(n == 3){
                        alertify.confirm('Junção de mesas', 'Não é possível enviar para cozinha enquanto há uma solicitação de junção de mesas', function() { 
                                window.location = "../../controller/clienteController/juncaoMesas/verificarSolicitacaoMesaController.php";
                            }, function() {}).set({
                                'transition' : 'zoom',
                                'defaultFocus' : '',
                                'movable': false,
                                labels:{
                                    ok: 'Ver Solicitação',
                                    cancel: 'Fechar'            
                                }
                        });
                    }
                });
            }

            $(document).ready(function() {
                atualizarListaPedido();
            });
            
        </script>
        <style>
    	    .dataTables_filter, .dataTables_length, .dataTables_info, .pagination{
    		    visibility: hidden!important;
    	    }
            .inputQuant{
                border: 0;
                background-color: transparent;
                width: 100%;
                padding-left: 3px;
            }
            .inputQuant:hover{
                box-shadow: 0px 0px 2px;
            }
        </style>
	</head>
	<body id="page-top">
        <?php include 'menuLateral.php' ?>
        <div class="content-wrapper">
            <div class="container-fluid">
                <br><br><br><center><h1 style="font-family: 'Raleway', sans-serif; font-size:50px; color:#F15821;">Meu Pedido</h1></center>
                <div class="card mb-3">
        			<div class="card-header">
                        <div class="row mb-3">
                            <div class="col-12">
                                <input type='text' readonly='readonly' id='campoSubtotal' value='' style='float:right;width:100px;color:#F15821; height:50px; background-color: #F7F7F7;font-size:20px;border-radius: 5px; border: 1px solid transparent;' disabled>
                                <input type='text' value='Valor total:' readonly='readonly' style='background-color: #F7F7F7;float:right;width:100px; height:50px; font-size:20px;border-radius: 5px; border: 1px solid transparent;' disabled>
                            </div>
                        </div>
        				<div class="card-body">
                            <div class="td">
                                <div class="container-fluid" class='print'>
                                    <div class="card-body" class='print'>
	          							<div class="table-responsive" class='print' id="atualiza">
            								<table class="table table-bordered" width="100%" cellspacing="0" class='print'>
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
                                                            <button type="button" class="btn btn-primary" onclick="enviarPedidos()" data-dismiss="modal">Enviar</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
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

        <!-- Modal excluir produto -->
        <div class='modal fade' id='ModalProduto' tabindex='-1' role='dialog' aria-labelledby='exampleModalCenterTitle' aria-hidden='true'>
            <div class='modal-dialog modal-dialog-centered' role='document'>
                <div class='modal-content'>
                    <div class='modal-header'>
                        <h5 class='modal-title' id='exampleModalLongTitle'>Excluir</h5>
                        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                            <span aria-hidden='true'>&times;</span>
                        </button>
                    </div>
                    <div class='modal-body'>
                        <p id="nomeProdudoModal"></p>
                    </div>
                    <div class='modal-footer'>
                        <button type='button' class='btn btn-secondary' data-dismiss='modal'>Cancelar</button>
                        <a data-dismiss='modal'><button onclick='excluirPedido()' class='btn btn-primary'>Excluir</button></a>
                        <input type="hidden" id='idPedido' value=''>
                        <input type="hidden" id='idCardapio' value=''>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal sair -->
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
        <?php include '../footer.html'; ?>	
		<script src="../vendor/chart.js/Chart.min.js"></script>
		<script src="../vendor/datatables/jquery.dataTables.js"></script>
		<script src="../vendor/datatables/dataTables.bootstrap4.js"></script>
		<script src="../js/sb-admin.min.js"></script>
		<script src="../js/sb-admin-datatables.min.js"></script>
		<script src="../js/sb-admin-charts.min.js"></script>
	</body>
</html>