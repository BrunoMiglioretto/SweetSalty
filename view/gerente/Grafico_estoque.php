<!DOCTYPE html>
<html lang="pt-br">
	<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="icon" href="../img/logo.png" type="image/x-icon">
        <title>Gráfico de estoque | Sweet Salty</title>
        <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href="../vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
        <link href="../css/sb-admin.css" rel="stylesheet">
        <link href="../css/grafico.css" rel="stylesheet">
		<link href="styleGraficos.css" rel="stylesheet">	
	</head>
	<body id="page-top">
		<?php include '../Menu_Lateral/Menu_Gerente.php'; ?>
		<div class="titulo">
			<h1 class="h1">Gráfico</h1>
		</div>
		<div class="content-wrapper">
			<div class="container-fluid graficoGeral">
				<div class="card mb-3">
					<div class="card-header">
                		<div class="card-body">
							<div class="table-responsive">
								<div class="legenda">
									<div class="ilegenda">
										<div class="itemLegenda">
											Tipo de gráfico<br>
											<select class="selecao" onchange="drawChart(this.value)">
												<option></option>
												<option>Setor</option>
												<option>Coluna</option>
											</select>
										</div>
										<div class="itemLegenda">
											Conteúdo do gráfico<br>
											<select class="selecao">
                                                <option></option>
                                                <option value="C">Clientes</option>
                                                <option value="F">Funcionarios</option>
											</select>
										</div>
									</div>
								</div>
                                <div class="grafico">
                                    <div id="piechart" style="width: 100%; height: 500px;"></div>
                                </div>
                            </div>	
                        </div>
                    </div>
                </div>
            </div>
        </div>
		<a class="scroll-to-top rounded" href="#page-top" >
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
		<?php include '../Menu_Lateral/footer.html'; ?>	
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
        <script type="text/javascript">
            google.charts.load('current', {'packages':['corechart']});
            function drawChart(tipoGrafico) {
                var data = google.visualization.arrayToDataTable([
                ['Gênero', 'Percentual'],
                <?php
                    foreach ($grafico as $biscoito){
                        $data_faturamento = $biscoito["Tipo_produto"];
                        $total            = $biscoito["QTD"];
                        echo "['$data_faturamento', $total],";
                    }
                ?>
                ]);
                var options = {
                'title':    'Tipo de alimento mais cadastrado',
                            'padding':0,
                            'width': 650,
                            'height': 400,
                            'backgroundColor': '#F7F7F7'
                };
                if(tipoGrafico == "Setor")
                    var chart = new google.visualization.PieChart(document.getElementById('piechart'));
                if(tipoGrafico == "Coluna")
                    var chart = new google.visualization.ColumnChart(document.getElementById('piechart'));
                chart.draw(data, options);
            }
        </script>
	    <script type="text/javascript">
            var LHCChatOptions = {};
            LHCChatOptions.opt = {widget_height:340,widget_width:300,popup_height:520,popup_width:500};
            (function() {
                var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
                var referrer = (document.referrer) ? encodeURIComponent(document.referrer.substr(document.referrer.indexOf('://')+1)) : '';
                var location  = (document.location) ? encodeURIComponent(window.location.href.substring(window.location.protocol.length)) : '';
                po.src = '//127.0.0.1:8081/chatmaster/lhc_web/index.php/chat/getstatus/(click)/internal/(position)/bottom_right/(ma)/br/(top)/350/(units)/pixels/(leaveamessage)/true?r='+referrer+'&l='+location;
                var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
            })();
        </script>
	</body>
</html>