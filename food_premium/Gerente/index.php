<!DOCTYPE html>
<html lang="PT-BR">
	<head>
	    <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="icon" href="../img/logo.png" type="image/x-icon">
        <title>Gerente | Sweet Salty</title>
	    <!--------------------------------------------Logar------------------------------------------>
	    <?php
            session_start();
            $id = $_SESSION["id_funcionario"];
            if(!isset($_SESSION['id_funcionario'])){
                header("Location: ../logar.php");
            }
		?>
		<?php
			include "../Funcoes/conexao.php";
			$sql = "SELECT COUNT(*) as funcionarios FROM tb_funcionario";
			$contatos = $fusca->prepare($sql);
			$contatos->execute();
			foreach($contatos as $contar){
				$id_fu = $contar["funcionarios"];
			}
		?>
		<?php
			include "../Funcoes/conexao.php";
			$sql = "SELECT COUNT(*) as cliente FROM tb_clientes";
			$contatos = $fusca->prepare($sql);
			$contatos->execute();
			
			foreach($contatos as $contar){
				$id_c = $contar["cliente"];
			}
		?>
		<?php
			include "../Funcoes/conexao.php";
			$sql = "SELECT COUNT(*) as fornecedor FROM tb_funcionario WHERE Cargo = 'Fornecedor'";
			$contatos = $fusca->prepare($sql);
			$contatos->execute();
			
			foreach($contatos as $contar){
				$id_f = $contar["fornecedor"];
			}
		?>
		<?php
			include "../Funcoes/conexao.php";
			$sql = "SELECT Cargo, COUNT(Cargo) as 'QTD' FROM tb_funcionario GROUP by Cargo order by Cargo asc";
			$grafico = $fusca->prepare($sql);
			$grafico->execute();
		?>
        <!-----------------------------------------Fim Logar----------------------------------------->
        <!-----------------------------------------TODOS CSS----------------------------------------->
        <!-- Bootstrap CSS-->
        <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <!--Template-->
        <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <!-- Pageina CSS-->
        <link href="../vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
        <!-- Estilo Template-->
        <link href="../css/sb-admin.css" rel="stylesheet">
        <link href="../css/grafico.css" rel="stylesheet">
        <!--------------------------------------FIM DE TODOS CSS-------------------------------------->
	</head>
	<body id="page-top">
		<!--------------------------------------INCLUDE MENU---------------------------------------->
		<?php include '../Menu_Lateral/Menu_Gerente.php'; ?>	
		<!----------------------------------------FIM INCLUDE--------------------------------------->
		<!-------------------------------------------CONTEUDO--------------------------------------->
		<br><br><br><center><h1>Painel Geral</h1></center>
		<!--Bem Vindo, <?php echo $_SESSION['Nome']; ?>!-->
		<div class="content-wrapper">
    		<div class="container-fluid">
                <div class="card mb-3">
              		<div class="card-header">
        				<div class="card-body">
              				<div class="table-responsive">
                                <!--<div class="td">-->
                                    <ul class="list-group" style="width:100%;">
                                        <a href="Lista_Funcionarios.php" style="color:#000;">
                                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                                Colaboradores Cadastrados
                                                <span class="badge badge-primary badge-pill" style="background:#F15821;"><?php echo $id_fu;?></span>
                                            </li>
                                        </a>
                                        <a href="lista_clientes.php" style="color:#000;">
                                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                                Clientes Cadastrados
                                                <span class="badge badge-primary badge-pill" style="background:#F15821;"><?php echo $id_c;?></span>
                                            </li>
                                        </a>
                                    </ul>
								    <div id="piechart" style="background-color:#F7F7F7;width: 50%; height: 400px;"></div>
								<!--</div>-->
							</div>
						</div>
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
        <style>
            .td{
                display: flex;
                flex-direction: row;
                justify-content: center;
                align-items: center;
                margin-top:500px;
            }
		</style>    
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
		<!-------------Grafico--------------------->
		<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript">
            google.charts.load('current', {'packages':['corechart']});
            google.charts.setOnLoadCallback(drawChart);
            function drawChart(){
                var data = google.visualization.arrayToDataTable([
                ['Gênero', 'Percentual'],
                <?php
                    foreach ($grafico as $biscoito){
                        $data_faturamento = $biscoito["Cargo"];
                        $total            = $biscoito["QTD"];
                        echo "['$data_faturamento', $total],";
                    }
                ?>
                ]);
                var options = {
                    'title': 'Quantidade de Cargos',
                    'height': 380,
                    'backgroundColor': '#F7F7F7'
                };
                var chart = new google.visualization.PieChart(document.getElementById('piechart'));
                chart.draw(data, options);
            }
        </script>
   	    <script>
            function signOut() {
                var auth2 = gapi.auth2.getAuthInstance();
                auth2.signOut().then(function () {
                    console.log('User signed out.');
                });
            }
		</script>
		<!----------------------------------------FIM JAVA-------------------------------------------->
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