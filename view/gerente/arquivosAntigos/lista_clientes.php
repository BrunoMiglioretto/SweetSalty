<!DOCTYPE html>
<html lang="PT-BR">
	<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="icon" href="./../img/logo.png" type="image/x-icon">
        <title>Colaborador | Sweet Salty</title>
        <!--------------------------------------------Logar------------------------------------------>
        <?php 
            session_start();
            if(!isset($_SESSION['id_funcionario'])){
                header("Location: ../logar.php");
            }
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
        <!--------------------------------------FIM DE TODOS CSS-------------------------------------->
	</head>
	<body id="page-top">
		<!--------------------------------------INCLUDE MENU---------------------------------------->
        <?php include '../Menu_Lateral/Menu_Gerente.php'; ?>	
		<!----------------------------------------FIM INCLUDE--------------------------------------->
		<!-------------------------------------------CONTEUDO--------------------------------------->
        <br><br><br><br><center><h1>Clientes Cadastrados</h1></center>
        <!--button onclick="teste()" class='print'>Download PDF</button-->			
		<div class="content-wrapper" class='print'>	
	        <div class="container-fluid" class='print'>
	    	    <div class="card mb-3">
	    		    <div class="card-header">
	                    <div class="card-body" class='print'>
	                        <div class="table-responsive" class='print'>
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" class='print'>	
									<thead>
                                    	<tr>
                                            <th>Nome</th>
                                            <th>E-mail</th>
                                            <!--<th>Data de Nascimento</th>
                                            <th>Celular</th>
                                            <th>Sexo</th>-->
                                            <th>Mais</th>
                                            <th>Editar</th>
                                            <th>Excluir</th>
                                        </tr>
					                </thead>
					                <tbody>
                                        <?php
                                            $sql = "SELECT * FROM tb_clientes";
                                            include "../Funcoes/conexao.php";
                                            $contatos = $fusca -> prepare($sql);
                                            $contatos-> execute();
                                            foreach($contatos as $lista){
                                                $id 			= $lista["id_cliente"];
                                                $nome 			= $lista["Nome_cliente"];
                                                $email 			= $lista["Email"];
                                                $cargo 			= $lista["Cargo"];
                                                $celular 		= $lista["Celular"];
                                                $CPF 			= $lista["Data_Nascimento"];
                                                $dataNova       = date('d/m/Y',strtotime($lista["Data_Nascimento"]));
                                                $sexo 			= $lista["Sexo"];
                                                $ver 			= "<a data-toggle='modal' data-target='#Modal2$id'><center><img src='../img/ver.png' title='Ver mais'></center></a>";
                                                $editar 		= "<a href='CRUD/Editar_Cliente.php?id_cliente=$id'><center><img src='../img/editar.png' title='Editar'></center></a>";
                                                $excluir 		= "<a data-toggle='modal' data-target='#Modal$id'><center><img src='../img/excluir.png' title='Excluir'></center></a>";
                                                echo "<tr>";
                                                echo "<td>".$nome."</td>";
                                                echo "<td>".$email."</td>";
                                                //echo "<td>".$dataNova."</td>";
                                                //echo "<td>".$celular."</td>";
                                                //echo "<td>".$sexo."</td>";
                                                echo "<td>".$ver."</td>";
                                                echo "<td>".$editar."</td>";
                                                echo "<td>".$excluir."</td>";
                                                echo "  <div class='modal fade' id='Modal$id' tabindex='-1' role='dialog' aria-labelledby='exampleModalCenterTitle' aria-hidden='true'>
                                                            <div class='modal-dialog modal-dialog-centered' role='document'>
                                                                <div class='modal-content'>
                                                                    <div class='modal-header'>
                                                                        <h5 class='modal-t'itle' id'='exampleModalLongTitle'>Excluir</h5>
                                                                        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                                                            <span aria-hidden='true'>&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class='modal-body'>
                                                                        Deseja excluir $nome"." permanentemente?
                                                                    </div>
                                                                    <div class='modal-footer'>
                                                                        <button type='button' class='btn btn-secondary' data-dismiss='modal'>Cancelar</button>
                                                                        <a href='CRUD/Excluir_Cliente.php?id_cliente=$id&func=excluir'><button type='button' class='btn btn-primary'>Excluir</button></a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>";//Modal
                                                echo "  <div class='modal fade' id='Modal2$id' tabindex='-1' role='dialog' aria-labelledby='exampleModalCenterTitle' aria-hidden='true'>
                                                            <div class='modal-dialog modal-dialog-centered' role='document'>
                                                                <div class='modal-content'>
                                                                    <div class='modal-header'>
                                                                        <h5 class='modal-t'itle' id'='exampleModalLongTitle'>Mais informações sobre $nome</h5>
                                                                        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                                                            <span aria-hidden='true'>&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class='modal-body'>
                                                                        <h5>Nome completo:</h5>$nome                 
                                                                        <h5>E-mail:</h5>$email
                                                                        <h5>Data de nascimento:</h5>$dataNova
                                                                        <h5>Telefone celular:</h5>$celular
                                                                        <h5>Sexo:</h5>$sexo
                                                                    </div>
                                                                    <div class='modal-footer'>
                                                                        <button type='button' class='btn btn-secondary' data-dismiss='modal'>Fechar</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>";//Modal			
                                                echo "</tr>";				
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><br><br><br><br>
		<!---------------------------------------FIM CONTEUDO--------------------------------------->
		<style>
			@media print {
                .print{
                    display:none;
                }
                .no-print { 
                    display:none; 
                }
                table{
                    width:100%;
                    font-size:18px;
                }
            }
	    </style>
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
		<script src="../js/sb-admin-datatables.js"></script>
		<script src="../js/sb-admin-charts.min.js"></script>
		<script>
			function teste(){
				window.print();
			}
		</script>
		<!----------------------------------------FIM JAVA-------------------------------------------->
	</body>
</html>