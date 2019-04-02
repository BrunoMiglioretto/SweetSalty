<!DOCTYPE html>
<html lang="PT-BR">
	<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="icon" href="../img/logo.png" type="image/x-icon">
        <title>Cardápio | Sweet Salty</title>
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
        <br><br><br><br><center><h1>Cardápios Cadastrados</h1></center>
        <div class="content-wrapper" class='print'>	
	        <div class="container-fluid" class='print'>
                <div class="card-header">
                    <a href="cadastro_cardapio.php"><button type="button" class="btn btn-primary">Novo</button></a>
                </div>
                <div class="card-body" class='print' style="margin-top: 15px;">
                    <div class="table-responsive" class='print'>
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" class='print'>		
                            <thead>			
                            	<tr>
                                    <th>Categoria</th>
                                    <th>Produto</th>
                                    <th>Valor</th>
                                    <th>Mais</th>
                                    <th>Editar</th>
                                    <th>Excluir</th>
		    			       	</tr>
			    		    </thead>
					        <tbody>
                                <?php
                                    $sql = "SELECT * FROM tb_cardapio ";
                                    include "../Funcoes/conexao.php";
                                    $contatos = $fusca -> prepare($sql);
                                    $contatos-> execute();
                                    foreach($contatos as $lista){
                                        $cardapio_id 			= $lista["cardapio_id"];
                                        $cardapio_desc 			= $lista["cardapio_desc"];
                                        $cardapio_valor 		= $lista["cardapio_valor"];
                                        $cardapio_cat 			= $lista["cardapio_cat"];
                                        $subcategoria 			= $lista["cardapio_subcategoria"];
                                        $quantidade 			= $lista["cardapio_quan"];
                                        $calorias               = $lista["calorias"];
                                        $ver 					= "<center><a data-toggle='modal' data-target='#Modal2$cardapio_id'><img src='../img/ver.png' title='Ver mais'></a></center>";
                                        $editar 				= "<center><a href='CRUD/Editar_cardapio.php?cardapio_id=$cardapio_id'><img src='../img/editar.png' title='Editar'><a/></center>";
                                        $excluir 				= "<center><a data-toggle='modal' data-target='#Modal$cardapio_id'><img src='../img/excluir.png' title='Excluir'><a/></center>";
                                        echo "<tr>";
                                        echo "<td>".$cardapio_cat."</td>";
                                        echo "<td>".$cardapio_desc."</td>";
                                        echo "<td> R$ ".number_format($cardapio_valor, 2, ',', ' ')."</td>";
                                        echo "<td>".$ver."</td>";
                                        echo "<td>".$editar."</td>";
                                        echo "<td>".$excluir."</td>";
                                        echo "  <div class='modal fade' id='Modal$cardapio_id' tabindex='-1' role='dialog' aria-labelledby='exampleModalCenterTitle' aria-hidden='true'>
                                                    <div class='modal-dialog modal-dialog-centered' role='document'>
                                                        <div class='modal-content'>
                                                            <div class='modal-header'>
                                                                <h5 class='modal-t'itle' id'='exampleModalLongTitle'>Excluir</h5>
                                                                <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                                                    <span aria-hidden='true'>&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class='modal-body'>
                                                                Deseja excluir $cardapio_desc Permanentemente?
                                                            </div>
                                                            <div class='modal-footer'>
                                                                <button type='button' class='btn btn-secondary' data-dismiss='modal'>Cancelar</button>
                                                                <a href='CRUD/Excluir_Cardapio.php?cardapio_id=$cardapio_id'>
                                                                <button type='button' class='btn btn-primary'>Excluir</button></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>";//Modal]
                                        echo  " <div class='modal fade' id='Modal2$cardapio_id' tabindex='-1' role='dialog' aria-labelledby='exampleModalCenterTitle' aria-hidden='true'>
                                                    <div class='modal-dialog modal-dialog-centered' role='document'>
                                                        <div class='modal-content'>
                                                            <div class='modal-header'>
                                                                <h5 class='modal-t'itle' id'='exampleModalLongTitle'>Mais informações sobre $cardapio_desc</h5>
                                                                <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                                                    <span aria-hidden='true'>&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class='modal-body'>
                                                                <h5>Produto:</h5>$cardapio_desc 
                                                                <h5>Categoria:</h5>$cardapio_cat
                                                                <h5>Subcategoria:</h5>$subcategoria
                                                                <h5>Quantidae:</h5>$quantidade
                                                                <h5>Valor:</h5>$cardapio_valor
                                                                <h5>Calorias:</h5>$calorias
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
		</div><br><br><br>
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