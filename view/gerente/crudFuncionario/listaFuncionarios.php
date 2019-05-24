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
        <link rel="icon" href="../img/logo-min.png" type="image/x-icon">
        <title>Funcionário | Sweet Salty</title>
        <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href="../vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
        <link href="../css/sb-admin.css" rel="stylesheet">
        <style>
            .campo{
                margin: 15px 0px 0px 0px;
                height: 50px;
            }
            .campo p{
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
                    	<table class="table table-bordered" id="" width="100%" class='print'>
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
        <div class='modal fade' id='Modal' tabindex='-1' role='dialog' aria-labelledby='exampleModalCenterTitle' aria-hidden='true'>
            <div class='modal-dialog modal-dialog-centered' role='document'>
                <div class='modal-content'>
                    <div class='modal-header'>
                        <p class='modal-title' id='tituloModal'></p>
                        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                            <span aria-hidden='true'>&times;</span>
                        </button>
                    </div>
                    <div class='modal-body'>
                        <p id="mensagemModal"></p>
                    </div>
                    <div class='modal-footer'>
                        <button type='button' class='btn btn-secondary' data-dismiss='modal'>Cancelar</button>
                        <button type='button' class='btn btn-primary' data-dismiss='modal' onclick="deletarFuncionario()">Excluir</button>
                    </div>
                </div>
            </div>
        </div>
        <div class='modal fade' id='modalMaisDados' tabindex='-1' role='dialog' aria-labelledby='exampleModalCenterTitle' aria-hidden='true'>
            <div class='modal-dialog modal-dialog-centered' role='document'>
                <div class='modal-content'>
                    <div class='modal-header'>
                        <h5 class='modal-title' id='exampleModalLongTitle'></h5>
                        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                            <span aria-hidden='true'>&times;</span>
                        </button>
                    </div>
                    <div class='modal-body'>
                        <div class='campo'>
                            <p><b>Nome completo:</b></p><input type='text' id="nome" disabled>
                        </div>
                        <div class='campo'>
                            <p><b>Cargo:</b></p><input type='text' id="cargo" disabled>
                        </div>
                        <div class='campo'>
                            <p><b>E-mail:</b></p><input type='text' id="email" disabled>
                        </div>
                        <div class='campo'>
                            <p><b>Telefone:</b></p><input type='text' id="telefone" disabled>
                        </div>
                        <div class='campo'>
                            <p><b>CPF:</b></p><input type='text' id="cpf" disabled>
                        </div>
                        <div class='campo'>
                            <p><b>RG:</b></p><input type='text' id="rg" disabled>
                        </div>
                    </div>
                    <div class='modal-footer'>
                        <button type='button' class='btn btn-secondary' data-dismiss='modal'>Fechar</button>
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
        <script>
            function guardarIdCadastro(idCadastroSelecionado, nomeSelecionado){
				idCadastro = idCadastroSelecionado;
				nome = nomeSelecionado;

				titulo = "Excluir " + nome.toLowerCase();
				mensagem = `Deseja mesmo excluir ${nome}?`;

				$("#tituloModal").html(titulo);
				$("#mensagemModal").html(mensagem);
			}

            function deletarFuncionario() {
                $.ajax({
                    url : "../../controller/gerenteController/crudFuncionarioController/deletarFuncionarioController.php",
                    method : "POST",
                    data : {
                        idFuncionario : idCadastro
                    }
                }).done(function() {
                    atualizarTabela();
                });
            }

            function atualizarTabela() {
                $.ajax({
                    url : "../../controller/gerenteController/crudFuncionarioController/visualizarFuncionarios.php"
                }).done(function(n) {
                    $("tbody").html(n);
                });
            }

            $(document).ready(function() {
                atualizarTabela();
            });

            function maisDados(idCadastro) {
				let d = $(`#dados${idCadastro}`).val();

                dado = JSON.parse(d);

                console.log(dado.data);

                $("#nome").val(dado.data.nome);
                $("#cargo").val(dado.data.cargo);
                $("#email").val(dado.data.email);
                $("#telefone").val(dado.data.numero);
                $("#cpf").val(dado.data.cpf);
                $("#rg").val(dado.data.rg);
                $("#exampleModalLongTitle").html("Mais informações sobre " + dado.data.nome);

                $("#modalMaisDados").modal();
			}
        
        </script>
	</body>
</html>