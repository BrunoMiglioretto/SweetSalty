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
        <title>Colaborador | Sweet Salty</title>
        <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href="../vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
        <link href="../css/sb-admin.css" rel="stylesheet">
        <style>
            .campo{
                margin: 15px 0px 0px 0px;
                height: 50px;
            }
            p{
                font-size: 19px;
                float: left;
            }
            
            .campo input{
                border: 0;
                margin: 3px 10px;
                background-color: white;
                color: black;
            }
        </style>
	</head>
	<body id="page-top">
        <?php include 'menuLateral.php'; ?>	
        <br><br><br><br><center><h1>Colaboradores Cadastrados</h1></center>
        <div class="content-wrapper" class='print'>	
	    	<div class="container-fluid" class='print'>
	    		<div class="card-header">		
            		<a href="crudFuncionario/novoFuncionario.php"><button type="button" class="btn btn-primary">Novo</button></a>
          		</div>
	    		<div class="card-body" class='print'>
	    			<div class="table-responsive" class='print' style="margin-top: 15px;">
                    	<table class="table table-bordered" id="dataTable" width="100%" class='print'>
                            <thead>
                                <tr>
                                    <th>Nome</th>
                                    <th>Cargo</th>
                                    <th>Mais</th>
                                    <th>Editar</th>
                                    <th>Excluir</th>
		    			       	</tr>
                            </thead>
						     <tbody>
                                <?php
                                        include "../../controller/gerenteController/crudFuncionarioController/visualizarFuncionarios.php";

                                        // $ver 			= "";
                                        // $editar 		= "<a href='CRUD/Editar_Funcionario.php?id_funcionario=$id'><center><img src='../img/editar.png' title='Editar'></center></a>";
                                        // $excluir 		= "<a data-toggle='modal' data-target='#Modal$id'><center><img src='../img/excluir.png' title='Excluir'></center></a>";
                                        // echo "<tr>";
                                        // echo "<td>".$nome."</td>";
                                        // echo "<td>".$sobrenome."</td>";
                                        // echo "<td>".$cargo."</td>";
                                        // echo "<td align='center'>".$ver."</td>";
                                        // echo "<td>".$editar."</td>";
                                        // echo "<td>".$excluir."</td>";
                                        // echo "  <div class='modal fade' id='Modal$id' tabindex='-1' role='dialog' aria-labelledby='exampleModalCenterTitle' aria-hidden='true'>
                                        //             <div class='modal-dialog modal-dialog-centered' role='document'>
                                        //                 <div class='modal-content'>
                                        //                     <div class='modal-header'>
                                        //                         <h5 class='modal-t'itle' id'='exampleModalLongTitle'>Excluir</h5>
                                        //                         <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                        //                             <span aria-hidden='true'>&times;</span>
                                        //                         </button>
                                        //                     </div>
                                        //                     <div class='modal-body'>
                                        //                         Deseja excluir $nome"." $sobrenome Permanentemente?
                                        //                     </div>
                                        //                     <div class='modal-footer'>
                                        //                         <button type='button' class='btn btn-secondary' data-dismiss='modal'>Cancelar</button>
                                        //                         <a href='CRUD/Excluir_Funcionario.php?id_funcionario=$id&func=excluir'><button type='button' class='btn btn-primary'>Excluir</button></a>
                                        //                     </div>
                                        //                 </div>
                                        //             </div>
                                        //         </div>";//Modal
                                        // echo "  <div class='modal fade' id='Modal2$id' tabindex='-1' role='dialog' aria-labelledby='exampleModalCenterTitle' aria-hidden='true'>
                                        //             <div class='modal-dialog modal-dialog-centered' role='document'>
                                        //                 <div class='modal-content'>
                                        //                     <div class='modal-header'>
                                        //                         <h5 class='modal-t'itle' id'='exampleModalLongTitle'>Mais informações sobre $nome</h5>
                                        //                         <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                        //                             <span aria-hidden='true'>&times;</span>
                                        //                         </button>
                                        //                     </div>
                                        //                     <div class='modal-body'>
                                        //                         <h5>Nome completo:</h5>$nome $sobrenome
                                        //                         <h5>Cargo:</h5>$cargo
                                        //                         <h5>E-mail:</h5>$email
                                        //                         <h5>Telefone residencial:</h5>$telefone
                                        //                         <h5>Telefone celular:</h5>$celular
                                        //                         <h5>CPF:</h5>$CPF
                                        //                         <h5>RG:</h5>$RG
                                        //                     </div>
                                        //                     <div class='modal-footer'>
                                        //                         <button type='button' class='btn btn-secondary' data-dismiss='modal'>Fechar</button>
                                        //                     </div>
                                        //                 </div>
                                        //             </div>
                                        //         </div>";//Modal
                                        // echo "</tr>";				
                                ?>
		                    </tbody>
            	        </table>
          	        </div>
        	    </div>
            </div>
        </div><br><br><br><br>
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
                        <a class="btn btn-primary" href="../logout.php">Sair</a>
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
		<script src="../js/sb-admin-datatables.js"></script>
		<script src="../js/sb-admin-charts.min.js"></script>
	</body>
</html>