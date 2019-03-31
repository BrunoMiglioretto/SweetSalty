<!DOCTYPE html>
<html lang="PT-BR">
	<head>
	  <meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	  <title>Página inicial | Sweet Salty</title>
	  <!-----------------------------------------TODOS CSS----------------------------------------->
	  <!-- Bootstrap CSS-->
	  <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	  <!--Template-->
	  <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	  <!-- Pageina CSS-->
	  <link href="../vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
	  <!-- Estilo Template-->
	  <link href="../css/sb-admin.css" rel="stylesheet">
	  
	  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	  <!--------------------------------------FIM DE TODOS CSS-------------------------------------->
	</head>
	<body>
		<!--------------------------------------INCLUDE MENU---------------------------------------->
			<?php include '../Menu_Lateral/Menu_Garcom.php' ?>
		<!----------------------------------------FIM INCLUDE--------------------------------------->
		<!-------------------------------------------CONTEUDO--------------------------------------->
			<br><br><br><br><center><h1>Cardápio</h1></center>
			<div class="content-wrapper">
    <div class="container-fluid">
        <div class="card-header">
        <div class="card-body">
          <div class="table-responsive">
	            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
                  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
                <div class="container">
                  <div class="panel-group" id="accordion">
                    <div class="panel panel-default">
                      <div class="panel-heading">
                        <h4 class="panel-title">
                          <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">Porções</a>
                        </h4>
                      </div>
                      <div id="collapse1" class="panel-collapse collapse in">
                        <div class="panel-body" id="op">Batata Frita <button>add</button></div>
                        <div class="panel-body" id="op">Batata Frita <button>add</button></div>
                        <div class="panel-body" id="op">Batata Frita <button>add</button></div>
                        <div class="panel-body" id="op">Batata Frita <button>add</button></div>
                      </div>
                    </div>
                    <div class="panel panel-default">
                      <div class="panel-heading">
                        <h4 class="panel-title">
                          <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">Pratos</a>
                        </h4>
                      </div>
                      <div id="collapse2" class="panel-collapse collapse">
                        <div class="panel-body" id="op">Batata Frita <button>add</button></div>
                        <div class="panel-body" id="op">Batata Frita <button>add</button></div>
                        <div class="panel-body" id="op">Batata Frita <button>add</button></div>
                        <div class="panel-body" id="op">Batata Frita <button>add</button></div>
                      </div>
                    </div>
                    <div class="panel panel-default">
                      <div class="panel-heading">
                        <h4 class="panel-title">
                          <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">Adicionais</a>
                        </h4>
                      </div>
                      <div id="collapse3" class="panel-collapse collapse">
                        <div class="panel-body" id="op">Bacon<button>add</button></div>
                        <div class="panel-body" id="op">Chedar <button>add</button></div>
                        <div class="panel-body" id="op">Batata Frita <button>add</button></div>
                        <div class="panel-body" id="op">Batata Frita <button>add</button></div>
                      </div>
                    </div>
                  </div> 
                </div>
            </table>
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
		<!--------------------------------------INCLUDE FOOTER--------------------------------------->
			<?php include '../Menu_Lateral/footer.html'; ?>	
		<!----------------------------------------FIM INCLUDE---------------------------------------->
		<style>
		    #op{
		        margin:15px;
		    }
		    button {
              border: none;
              outline: 0;
              display: inline-block;
              padding: 8px;
              color: white;
              background-color: #600;
              text-align: center;
              cursor: pointer;
              width: 10%;
              font-size: 10px;
              float:right;
            }
            
            a {
              text-decoration: none;
              font-size: 22px;
              color: black;
            }
            
            button:hover, a:hover {
              opacity: 0.7;
            }
        </style>
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
		<!----------------------------------------FIM JAVA-------------------------------------------->
	  </div>
	</body>
</html>
