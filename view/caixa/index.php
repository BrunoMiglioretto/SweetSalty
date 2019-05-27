<?php
	include "../../controller/caixaController/verificacaoSessionCaixaController.php";

?>
<!DOCTYPE html>
<html lang="PT-BR">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="icon" href="../img/logo-min.png" type="image/x-icon">
		<title>Caixa | Sweet Salty</title>
		<link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
		<link href="../vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
		<link href="../css/sb-admin.css" rel="stylesheet">
		<link rel="stylesheet" href="../alertifyjs/css/alertify.min.css">
		<link rel="stylesheet" href="../alertifyjs/css/themes/default.min.css">
		<script src="../alertifyjs/alertify.min.js"></script>
	</head>
	<body>
		<?php include 'menuLateral.php'?>	
		<br><br><br>
		<div class="container-fluid" class='print'>
    		<div class="card-header">		
    			<center><h5>Pedidos</h5></center>
  			</div>
    		<div class="card-body" class='print'>
    			<div class="table-responsive" class='print' style="margin-top: 15px;">
        			<table class="table table-bordered" id="tabela" width="100%" cellspacing="0" class='print'>
						<thead>
              				<tr>
								<th>Nome do Cliente</th>
								<th>Mesa</th>
								<!-- <th>Quantidade de Itens</th> -->
								<th>Forma Pagamento</th>
								<th>Valor (R$)</th>
								<th>Troco (R$)</th>
								<th>Finalizar</th>
				       		</tr>
			     		</thead>
					    <tbody>
							
            			</tbody>
    				</table>
  				</div>
			</div>
		</div>
		<br><br><br><br>

		<div class='modal fade' id='modalFinalizar' tabindex='-1' role='dialog' aria-labelledby='exampleModalCenterTitle' aria-hidden='true'>
			<div class='modal-dialog modal-dialog-centered' role='document'>
				<div class='modal-content'>
					<div class='modal-header'>
						<h5 class='modal-title' id='tituloModal'>Entregue</h5>
						<button type='button' class='close' data-dismiss='modal' aria-label='Close'>
							<span aria-hidden='true'>&times;</span>
						</button>
					</div>
					<div class='modal-body' id="mensagemModal">

					</div>
					<div class='modal-footer'>
						<button type='button' class='btn btn-secondary' data-dismiss='modal'>Cancelar</button>
						<button type='button' class='btn btn-primary' data-dismiss='modal' onclick="marcarComoFinalizado()">Confirmar</button>
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
		<script>
			$(document).ready(function() {
				pegarPedidos();
				setInterval(function() {
					tabela.ajax.reload();
				}, 2000);
			});

			function pegarPedidos(){
				tabela = $("#tabela").DataTable({
					language :{
						"decimal":        "",
						"emptyTable":     "Nenhum pedido",
						"info":           "Mostrando _START_ de _END_ dos _TOTAL_ pedidos",
						"infoEmpty":      "Mostrando 0 de 0 dos 0 pedidos",
						"infoFiltered":   "(filtered from _MAX_ total entries)",
						"infoPostFix":    "",
						"thousands":      ".",
						"lengthMenu":     "Mostando _MENU_ pedidos",
						"loadingRecords": "Carregando...",
						"processing":     "Processando...",
						"search":         "Perquisar:",
						"zeroRecords":    "Nenhum registro correspondente encontrado",
						"paginate": {
							"first":      "Primeiro",
							"last":       "Ultimo",
							"next":       "Próximo",
							"previous":   "Anterior"
						},
						"aria": {
							"sortAscending":  ": activate to sort column ascending",
							"sortDescending": ": activate to sort column descending"
						}
					},
					"ajax" : {
						"method" : "POST",
						"url" : "../../controller/caixaController/visualizarPagamentosController.php"
					},
					columns: [
						{ data : 'nome_completo'},
						{ data : 'mesa'},
						{ data : 'forma_pagamento'},
						{ data : 'subtotal'},
						{ data : 'troco'},
						{ data : 'botao'}
					]
				});
			}

			function marcarComoFinalizado(){
				$.ajax({
					url : "../../controller/caixaController/marcarComoFinalizadoController.php",
					method : "POST",
					data : {
						idPagamento : idPagamento
					}
				}).done(function() {
					tabela.ajax.reload();
					alertify.notify("Marcado como finalizado", "success");
				});
			}

			function guardarIdCardapio(idPagamentoSelecionado){
				idPagamento = idPagamentoSelecionado;

				titulo = "Finalizar o pedido";
				mensagem = `Marcar como finalizado esse pedido?`;

				$("#tituloModal").html(titulo);
				$("#mensagemModal").html(mensagem);
			}

		</script>
	</body>
</html>
