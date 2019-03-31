<!DOCTYPE html>
<html lang="PT-BR">
	<head>
	  <meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	  <link rel="icon" href="../img/vermelha.png" type="image/x-icon">
	  <title>Gráfico de fornecedores | Sweet Salty</title>
	  <!--------------------------------------------Logar------------------------------------------>
	    <?php 
	    session_start();
	    $id = $_SESSION["id_funcionario"];
			if(!isset($_SESSION['id_funcionario'])){
				header("Location: ../Funcoes/logar.php");
			}
		?>
		<?php
			include "../Funcoes/conexao.php";
			$sql = "SELECT COUNT(*) as funcionario FROM tb_funcionario WHERE Cargo = 'Fornecedor'";
			$contatos = $fusca->prepare($sql);
			$contatos->execute();
			
			foreach($contatos as $contar){
				$id_fu = $contar["funcionario"];
			}
		?>
		<?php
			include "../Funcoes/conexao.php";
			$sql = "SELECT id_fornecedor, COUNT(id_fornecedor) as 'QTD' FROM tb_estoque GROUP by id_fornecedor order by id_fornecedor asc";
			$grafico = $fusca->prepare($sql);
			$grafico->execute();
			
			$fndr = "Fornecedor";
			$sql2 = "SELECT * FROM tb_funcionario WHERE Cargo = '$fndr'";
			include "../Funcoes/conexao.php";
			$fornec = $fusca -> prepare($sql2);
			$fornec-> execute();
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
		<br><br><br><center><h1>Gráfico de fornecedores</h1></center>
		  <div class="content-wrapper">
    		<div class="container-fluid">
					<div class="card mb-3">
        		<div class="card-header">
        				<div class="card-body">
          				<div class="table-responsive">
											<div class="td">
									    <div id="piechart" style="width: 100%; height: 500px;"></div>
											</div>
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
                 align-items: center
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

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Gênero', 'Percentual'],
        <?php
            foreach ($grafico as $biscoito){
                $data_faturamento = $biscoito["id_fornecedor"];
                $total            = $biscoito["QTD"];
                echo "['$data_faturamento', $total],";
            }
        ?>
        ]);
        
         <?php
			    		foreach($fornec as $f){
				    		$for = $f['Nome'];
				    		$id_fornecedor = $f['id_funcionario'];
				    	}
					?>

        var options = {
          title: 'Fornecedores que mais fornecem produtos'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
      
    </script>
		<!----------------------------------------FIM JAVA-------------------------------------------->
	  </div>
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