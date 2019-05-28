<?php
    session_start();
    chdir('../');

?>
<!DOCTYPE html>
<html lang="PT-BR">
	<head>
        <meta charset="utf-8">
        <title>Pedidos Enviados | Sweet Salty</title>
        <base href="../">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href="../vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
        <link href="../css/sb-admin.css" rel="stylesheet">
        <link rel="icon" href="../img/logo-min.png" type="image/x-icon">
        <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
        <script src="../alertifyjs/alertify.min.js"></script>
		<link rel="stylesheet" href="../alertifyjs/css/alertify.min.css">
		<link rel="stylesheet" href="../alertifyjs/css/themes/default.min.css">
        <style>
            .inputQuant{
                border: 0;
                background-color: transparent;
                width: 100%;
                padding-left: 3px;
            }
        </style>
	</head>
	<body id="page-top">
        <?php include 'menuLateral.php' ?>	
        <div class='content-wrapper'>	
            <div class='container-fluid'>
                <br><br><br><center><h1 style="font-family: 'Raleway', sans-serif; font-size:50px; color:#F15821;" class="trn">Pedidos Enviados</h1></center>
                <div class='card mb-3'>
                    <div class='card-header'>
                        <div class="row mb-3">
                            <div class="col-6">
                                <button type='button' class='btn btn-primary trn' style='position:absolute;bottom: 0;left: 30px;' onclick="validarFecharConta()">Finalizar Pedido</button>
                            </div>
                            <div class="col-6">
                                <input type='text' readonly='readonly' id='campoTotal' value='' style='float:right;width:100px;color:#F15821; height:50px; background-color: #F7F7F7;font-size:20px;border-radius: 5px; border: 1px solid transparent;' disabled>
                                <input type='text' value='<?= ($_SESSION["linguagem"]=="pt"?"Valor total":"Amount")?>:' readonly='readonly' style='background-color: #F7F7F7;float:right;width:100px; height:50px; font-size:20px;border-radius: 5px; border: 1px solid transparent;' disabled>
                            </div>
                        </div>
                        <div class='card-body'>
                            <div class='table-responsive' class='print'>
                                <table class='table table-bordered' id='tabela' width='100%' cellspacing='0' class='print'>
                                    <thead>
                                        <tr>
                                            <th class="trn">Pedido</th>
                                            <th class="trn">Categoria</th>
                                            <th class="trn">Quantidade</th>
                                            <th class="trn">Subtotal</th>
                                            <th class="trn">Situação</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            include "../../controller/clienteController/carrinho/visualizarPedidosFinalizadoController.php";
                                        
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><br><br><br>";
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
        <div class="modal fade" id="modalFormasPagamento" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
			    <div class="modal-content">
			        <div class="modal-header">
			            <h5 class="modal-title" id="exampleModalLabel">Selecione a forma de pagamento</h5>
			            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			                <span aria-hidden="true">&times;</span>
			            </button>
			        </div>
			        <div class="modal-body" style="float:right;">
			      	    <p>
                            <button style="padding:16px; background:transparent; border-radius:5px; border:solid 1px #c5c5c5;" onclick="enviarSolicitacaoDeFinalizar('m')"><img src="img/pagamento/dinheiro.png">&nbsp Dinheiro</button>
                            <button style="padding:16px; background:transparent; border-radius:5px; border:solid 1px #c5c5c5;" onclick="enviarSolicitacaoDeFinalizar('d')"><img src='img/pagamento/debito.png'>&nbsp Débito</button>
                            <button style="padding:16px; background:transparent; border-radius:5px; border:solid 1px #c5c5c5;" onclick="enviarSolicitacaoDeFinalizar('c')"><img src="img/pagamento/credito.png">&nbsp Crédito</button>
                            <button style="padding:16px; background:transparent; border-radius:5px; border:solid 1px #c5c5c5;" onclick="enviarSolicitacaoDeFinalizar('r')"><img src="img/pagamento/alimentacao.png">&nbsp Refeição</button>
                        </p>
			        </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    </div>
                </div>
            </div>
		</div>
        <?php include '../footer.html'; ?>	
		<script src="../vendor/jquery/jquery.min.js"></script>
		<script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
		<script src="../vendor/jquery-easing/jquery.easing.min.js"></script>
		<script src="../vendor/chart.js/Chart.min.js"></script>
		<script src="../vendor/datatables/jquery.dataTables.js"></script>
		<script src="../vendor/datatables/dataTables.bootstrap4.js"></script>
		<script src="../js/sb-admin.min.js"></script>
		<script src="../js/sb-admin-datatables.min.js"></script>
		<script src="../js/sb-admin-charts.min.js"></script>
        <script>
            $(document).ready(function() {

                total = $("#total").val();

                $("#campoTotal").val(`R$ ${total}`);

                $("#tabela").dataTable({
                    "searching": false,
                    "paging": false,
                    "info": false,
                    "lengthChange":false,
                    language :{
                        "emptyTable":     "Nenhum pedido enviado"
                    }
                });
            });

            function validarFecharConta() {
                $.ajax({
                    url : "../../controller/clienteController/pagamento/finalizarPedidoController.php"
                }).done(function(resposta) {
                    if(resposta == 0)
                        alertNaoTemItem();
                    else if(resposta == 1)
                        alertEmPreparo();
                    else
                        alertModoPagamento();
                });
            }

            function alertNaoTemItem() {
                alertify.alert("").setting({
                    transition : "zoom",
                    title : "Finalizar",
                    message : "Não é possível finalizar o seu pedido pois ainda não há nenhum item para pagar.",
                    movable : false
                });
            }

            function alertEmPreparo() {
                alertify.alert("").setting({
                    transition : "zoom",
                    title : "Finalizar",
                    message : "Não é possível finalizar o seu pedido pois ainda há itens a serem entregues.",
                    movable : false
                });
            }

            function alertModoPagamento() {
                $("#modalFormasPagamento").modal();
            }

            function enviarSolicitacaoDeFinalizar(forma) {
                $.ajax({
                    url : "../../controller/clienteController/pagamento/definirFormaPagamentoController.php",
                    method : "POST",
                    data : {
                        forma : forma
                    }
                }).done(function(forma) {
                    console.log(forma);
                    if(forma == "m")
                        window.location = "pedidos/definirQuantiaDinheiro.php";
                    else
                        window.location = "pedidos/pedidoFinalizado.php";
                });
            }

        </script>
        <script src="../dicionario/jquery.translate.js"></script>
        <script src="../dicionario/loginCadastroManualCliente.js"></script>
        <script>
            $(document).ready(function() {
                var translator = $('body').translate({lang: "<?= $_SESSION["linguagem"]?>", t: dict});
            });
        </script>
	</body>
</html>