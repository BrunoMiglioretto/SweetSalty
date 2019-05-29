<?php
    session_start();
    
    chdir("../");

?>

<!DOCTYPE html>
<html lang="PT-BR">
	<head>
        <base href="../">
	    <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="icon" href="../img/logo.png" type="image/x-icon">
        <title>Gráficos | Sweet Salty</title>
        <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href="../vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
        <link href="../css/sb-admin.css" rel="stylesheet">
        <link href="../alertifyjs/css/alertify.min.css" rel="stylesheet">
		<link href="../alertifyjs/css/themes/default.min.css" rel="stylesheet">
		<script src="../alertifyjs/alertify.min.js"></script>
	</head>
	<body id="page-top">
		<?php include 'menuLateral.php'?>
		
        <br><br><br>
        <div class="content-wrapper">
    		<div class="container-fluid">
                <div class="container">
                    <div class="row">
                        <div class="col-12 text-center">
                            <h1>Gráficos</h1>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-pizza" role="tab" aria-controls="pills-pizza" aria-selected="true">Pizza</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-coluna" role="tab" aria-controls="pills-coluna" aria-selected="false">Coluna</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-linha" role="tab" aria-controls="pills-linha" aria-selected="false">Linha</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="pills-tabContent">


                                <!--------------------------- Sessão Pizza  --------------------------->

                                <div class="tab-pane fade show active" id="pills-pizza" role="tabpanel" aria-labelledby="pills-home-tab">    
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="card">
                                                <div class="card-header">
                                                    Gráfico de Pizza
                                                </div>
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-7">
                                                            <div class="grafico" id="graficoPizza" style="width: 350px; height: 300px;">

                                                            </div>
                                                        </div>
                                                        <div class="col-5">
                                                            <div class="card" style="margin: 20px;">
                                                                <div class="card-header">
                                                                    Opções
                                                                </div>
                                                                <div class="card-body">
                                                                    <div class="row">
                                                                        <div class="col-12 text-center mt-2">
                                                                            <div class="btn-group " data-toggle="buttons">
                                                                                <label class="btn btn-primary active" onclick="modalPizzaProdutos()">
                                                                                    Produtos
                                                                                </label>
                                                                                <label class="btn btn-primary" onclick="modalPizzaClientes()">
                                                                                    Clientes
                                                                                </label>
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
                                    </div>
                                </div>

                                 <!--------------------------- Sessão coluna  --------------------------->

                                <div class="tab-pane fade" id="pills-coluna" role="tabpanel" aria-labelledby="pills-profile-tab">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="card">
                                                <div class="card-header">
                                                    Gráfico de Coluna
                                                </div>
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-7">
                                                            <div class="grafico" id="graficoColuna" style="width: 500px; height: 300px;">

                                                            </div>
                                                        </div>
                                                        <div class="col-5">
                                                            <div class="card" style="margin: 20px;">
                                                                <div class="card-header">
                                                                    Opções
                                                                </div>
                                                                <div class="card-body">
                                                                    <div class="row">
                                                                        <div class="col-12 text-center mt-2">
                                                                            <div class="btn-group " data-toggle="buttons">
                                                                                <label class="btn btn-primary active" onclick="modalColunaProdutos()">
                                                                                    Produtos
                                                                                </label>
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
                                    </div>
                                </div>

                                 <!--------------------------- Sessão Linha  --------------------------->

                                <div class="tab-pane fade" id="pills-linha" role="tabpanel" aria-labelledby="pills-contact-tab">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="card">
                                                <div class="card-header">
                                                    Gráfico de Linha
                                                </div>
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-8">
                                                            <div class="grafico" id="graficoLinha" style="width: 550px; height: 300px;">

                                                            </div>
                                                        </div>
                                                        <div class="col-4">
                                                            <div class="card" style="margin: 20px;">
                                                                <div class="card-header">
                                                                    Opções
                                                                </div>
                                                                <div class="card-body">
                                                                    <div class="row">
                                                                        <div class="col-12 text-center mt-2">
                                                                            <div class="btn-group " data-toggle="buttons">
                                                                                <label class="btn btn-primary active" onclick="modalLinhaProdutos()">
                                                                                    Produtos
                                                                                </label>
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
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
    		</div>
        </div>
        <br>
        <br>
        <br>







        <!--------------------------- Modal Pizza Produtos --------------------------->
        <div class="modal fade bd-example-modal-lg" id="modalPizzaProdutos" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Configurações do gráfico pizza</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-6">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="">Item do gráfico</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                            <input type="radio" value="categorias" name="radioItemGraficoPizzaProduto" aria-label="Radio button for following text input" checked>
                                                        </div>
                                                    </div>
                                                    <input type="text" class="form-control" value="Categorias" disabled>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 text-center">
                                            ou
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 mt-4">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                            <input type="radio" value="inputDate" name="radioItemGraficoPizzaProduto" aria-label="Radio button for following text input">
                                                        </div>
                                                    </div>
                                                    <select class="form-control" id="subCategoriaPizzaProdutos">
                                                        <option value='bebidas'>Bebidas</option>
                                                        <option value='doces'>Doces</option>
                                                        <option value='salgados'>Salgados</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-1"></div>
                                <div class="col-5">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="exampleFormControlSelect1">Mostrar vendas</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                            <input type="radio" value="select" name="radioDataComeco" aria-label="Radio button for following text input" checked>
                                                        </div>
                                                    </div>
                                                    <select class="form-control" id="selectDataComeco">
                                                        <option value='hoje'>Hoje</option>
                                                        <option value='semana'>Semana</option>
                                                        <option value='mes'>Mês</option>
                                                        <option value='bimestre'>Bimestre</option>
                                                        <option value='trimestre'>Trimestre</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 text-center">
                                            ou
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 mt-4">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                            <input type="radio" value="inputDate" name="radioDataComeco" aria-label="Radio button for following text input">
                                                        </div>
                                                    </div>
                                                    <input type="date" class="form-control" id="inputDataComeco" max="<?= date("Y-m-d", strtotime(time())) ?>" min="1900-01-01">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="gerarGrafico()">Atualizar</button>
                    </div>
                </div>
            </div>
        </div>

        <!--------------------------- Modal Pizza Cliente --------------------------->
        <div class="modal fade bd-example-modal-lg" id="modalPizzaClientes" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Configurações do gráfico pizza</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-6">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="">Cadastros</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                            <input type="radio" value="cadastros" name="radioClientes" aria-label="Radio button for following text input" checked>
                                                        </div>
                                                    </div>
                                                    <input type="text" class="form-control" value="Quatidade de cadastros por sexo" disabled>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-1"></div>
                                <div class="col-5">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="">Faixa etária</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                            <input type="radio" value="faixaEtaria" name="radioClientes" aria-label="Radio button for following text input">
                                                        </div>
                                                    </div>
                                                    <select class="form-control" id="faixaEtaria">
                                                        <option value='anos1020'>10 - 20</option>
                                                        <option value='anos2030'>20 - 30</option>
                                                        <option value='anos3040'>30 - 40</option>
                                                        <option value='anosMais40'>Mais de 40</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="gerarGrafico()">Atualizar</button>
                    </div>
                </div>
            </div>
        </div>

        <!--------------------------- Modal Coluna Produtos --------------------------->
        <div class="modal fade bd-example-modal-lg" id="modalColunaProdutos" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Configurações do gráfico coluna</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-6">
                                    <div class="row">
                                        <div class="col-12">
                                            <label>Itens no gráfico</label>
                                            <div class="list-group" id="caixaDeItensGraficoColunaProdutos">

                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <button class="btn btn-primary mt-3" onclick="$(`#modalItemColuna`).modal()">Adicionar item</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="exampleFormControlSelect1">Mostrar vendas desdo inicio de(a)</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                            <input type="radio" value="select" name="inputColunaProdutosDataComeco" aria-label="Radio button for following text input" checked>
                                                        </div>
                                                    </div>
                                                    <select class="form-control" id="selectColunaProdutosDataComeco">
                                                        <option value="hoje">Hoje</option>
                                                        <option value="semana">Semana</option>
                                                        <option value="mes">Mês</option>
                                                        <option value="bimestre">Bimestre</option>
                                                        <option value="trimestre">Trimestre</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 text-center">
                                            ou
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 mt-4">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                            <input type="radio" name="inputColunaProdutosDataComeco" aria-label="Radio button for following text input">
                                                        </div>
                                                    </div>
                                                    <input type="date" id="dataColunaProdutos" class="form-control" placeholder="15/02/2019">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="gerarGraficoColunaProdutos()">Atualizar</button>
                    </div>
                </div>
            </div>
        </div>

        <!--------------------------- Modal Linha Produtos --------------------------->
        <div class="modal fade bd-example-modal-lg" id="modalLinhaProdutos" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-md">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Configurações do gráfico linha</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-12">
                                            <label>Itens no gráfico</label>
                                            <div class="list-group" id="caixaDeItensGraficoLinhaProdutos">

                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <button class="btn btn-primary mt-3" onclick="$(`#modalItemLinha`).modal()">Adicionar item</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="gerarGraficoLinhaProdutos()">Atualizar</button>
                    </div>
                </div>
            </div>
        </div>



<!--------------------------- Modal Excolha Item Coluna --------------------------->
        <div class="modal fade bd-example-modal-lg" id="modalItemColuna">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Selecione os produtos</h5>
                        <button type="button" class="close" data-dismiss="modal">
                            <span>&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="table-responsive" class='print' id="atualiza">
                            <table class="table table-bordered" id="tabelaColuna" width="100%" cellspacing="0" class='print'>
                                <thead>
                                    <tr>
                                        <th style="width: 50%;">Nome</th>
                                        <th style="width: 25%;">Categoria</th>
                                        <th style="width: 25%;">Adicionar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                        
                                    <?php 
                                        include "../../controller/gerenteController/graficoController/crudCardapioController/visualizarCardapioController.php"; 
                                    ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Voltar</button>
                    </div>
                </div>
            </div>
        </div>

<!--------------------------- Modal Excolha Item Linhas --------------------------->
        <div class="modal fade bd-example-modal-lg" id="modalItemLinha">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Selecione os produtos</h5>
                        <button type="button" class="close" data-dismiss="modal">
                            <span>&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="table-responsive" class='print' id="atualiza">
                            <table class="table table-bordered" id="tabelaLinha" width="100%" cellspacing="0" class='print'>
                                <thead>
                                    <tr>
                                        <th style="width: 50%;">Nome</th>
                                        <th style="width: 25%;">Categoria</th>
                                        <th style="width: 25%;">Adicionar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                        
                                    <?php 
                                        include "controller/gerenteController/graficoController/crudCardapioController/visualizarCardapioLinhaController.php"; 
                                    ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Voltar</button>
                    </div>
                </div>
            </div>
        </div>






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
                        <a class="btn btn-primary" href="../../controller/sairFuncionarioController.php">Sair</a>
			        </div>
			    </div>
		    </div>
		</div>   
		<?php include 'view/footer.html'?>	
		<script src="../vendor/jquery/jquery.min.js"></script>
		<script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
		<script src="../vendor/jquery-easing/jquery.easing.min.js"></script>
		<script src="../vendor/chart.js/Chart.min.js"></script>
		<script src="../vendor/datatables/jquery.dataTables.js"></script>
		<script src="../vendor/datatables/dataTables.bootstrap4.js"></script>
		<script src="../js/sb-admin.min.js"></script>
		<script src="../js/sb-admin-datatables.min.js"></script>
		<script src="../js/sb-admin-charts.min.js"></script>
		<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script src="graficos/graficosJs.js"></script>
        <script>
        
            $(document).ready(function() {
                $("#tabelaColuna").DataTable({
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
					}
                });

                $("#tabelaLinha").DataTable({
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
					}
                });
            });
        
        </script>
	</body>
</html>