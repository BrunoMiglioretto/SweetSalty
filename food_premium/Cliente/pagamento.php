<?php
    session_start();
    $id_c = $_SESSION['id_cliente'];
    $id_p = $_SESSION['id_pedido'];
    //var_dump($id_c);
?>
<?php
    $sql = "SELECT * FROM tb_pedidos";
    include "../Funcoes/conexao.php";
    $contatos = $fusca -> prepare($sql);
    $contatos-> execute();    
?>
<?php
    include "../Funcoes/conexao.php";
    $sql = "SELECT SUM(Valor * Quantidade) as total FROM tb_pedidos WHERE id_cliente= '$id_c'  && (Situacao =1 || Situacao =2 || Situacao =3 || Situacao =4)";
    $contatos = $fusca->prepare($sql);
    $contatos->execute();
    foreach($contatos as $contar){
        $id_total = $contar["total"];
    }
    date_default_timezone_set('America/Sao_Paulo');
    $data = date("d/m/Y");
    $h = date("H:i");
?>
<!DOCTYPE html>
<html lang="PT-BR">
	<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-----------------------------------------TODOS CSS----------------------------------------->
        <!-- Bootstrap CSS-->
        <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <!--Template-->
        <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <!-- Pageina CSS-->
        <link href="../vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
        <!-- Estilo Template-->
        <link href="../css/sb-admin.css" rel="stylesheet">
        <link rel="icon" href="../img/logo.png" type="image/x-icon">
        <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
        <style>
            .dataTables_filter, .dataTables_length, .dataTables_info, .pagination{
                visibility: hidden!important;
            }    
        </style>
        <title>Pagamento | Sweet Salty</title>
        <!--------------------------------------FIM DE TODOS CSS-------------------------------------->
	</head>
	<body id="page-top">
		<!--------------------------------------INCLUDE MENU---------------------------------------->
        <?php include '../Menu_Lateral/Menu_Cliente.php'; ?>	
		<!----------------------------------------FIM INCLUDE--------------------------------------->
		<!-------------------------------------------CONTEUDO--------------------------------------->
        <br><br><br><center><h1 style="font-family: 'Raleway', sans-serif; font-size:50px; color:#F15821;">Efetuar Pagamento</h1></center><br>
        <div class='content-wrapper'>
    		<div class='container-fluid'>
                <div class='card mb-3'>
                    <div class='card-header'>
        				<div class='card-body'>
                            <div class='table-responsive'>
                                <div class='td'>
                                    <center><p style='font-family: `Raleway`, sans-serif; font-size:30px; color:#F15821;'><?php echo "Olá ".$_SESSION["Nome_cliente"]."!</h6>"?><h4 style="color:#F15821; margin: 50px;font-family: Raleway, sans-serif;">Sua conta ja foi finalizada!<br>Aguarde o garçom em sua mesa<br></h4><button type='button' class='btn btn-primary' style='float:center;' data-toggle='modal' data-target='#exampleModal1'>Ver Comprovante</button></p></center>
                                </div>
                            </div>
                        </div>
                    </div>
   				 </div>
    		</div>
    	</div>
    	<!-- Modal-->
        <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <img src='../img/logo.png' style='width:20%; '><h4 class="modal-title" id="exampleModalLabel" style='margin_top:10px;'>Sweet Salty</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
			        </div>
			        <div class="modal-body" style="float:right;">
                        <center><?php echo'Data:&nbsp'.$data.'&nbsp Hora:&nbsp'.$h;?> &nbsp CEP:80020-310<br>
                            Rua XV de Novembro 374 - Centro - Curitiba - PR<br><br></center>
                        <center><h3>Comprovante de Pagamento</h3></center>
			      	    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" class='print'>
                            <thead>
              	                <tr>
									<th>Pedido</th>
									<th>Quantidade</th>
									<th>Valor unitário</th>
				       	        </tr>
 							</thead>
                            <tbody>
                                <?php
                                    $sql = "SELECT * FROM tb_pedidos WHERE id_cliente = '$id_c' && (Situacao =1 || Situacao =2 || Situacao =3 || Situacao =4) ";
                                    include "../Funcoes/conexao.php";
                                    $contatos = $fusca -> prepare($sql);
                                    $contatos-> execute();
                                    $i=0;
                                    foreach($contatos as $lista){
                                        $id 		    = $lista["id_pedido"];
                                        $categoria 	    = $lista["cardapio_cat"];
                                        $pedido 		= $lista["Pedido"];
                                        $quantidade     = $lista["Quantidade"];
                                        $valor 			= $lista["Valor"];
                                        $excluir 		= "<center><a data-toggle='modal' data-target='#Modal$id'><img src='../img/excluir.png' title='Excluir'><a/></center>";
                                        $total=$valor * $quantidade;		
                                        echo "<tr>";
                                        echo "<td>".$pedido."</td>";
                                        echo "<td onmouseover='editarQuantidade(\"".$i."\")' onmouseout='editarTempo1(\"".$i."\",\"".$id."\")'><input type='text' value='".$quantidade."' style='width:50px;display:none' id='".$i."'><span id='d".$i."'>".$quantidade."</span></td>";
                                        echo "<td> R$ <span id='m".$i."'>".number_format($valor, 2, ',', ' ')."</span><input type='hidden' value='".$valor."' id='v".$i."'><input type='hidden' value='".$total."' id='t".$i."'></td>";
                                        echo "</tr>";				
                                        $i++;
                                    }
                                    echo "<input type='hidden' value='".$i."' id='totalcontador'>";
                                ?>
                            </tbody>    
					    </table>
					</div> 
					<center>
					    <input type='text' readonly='readonly' value='R$ <?php echo number_format($id_total, 2, ',', ' '); ?>' style='float:right;width:100px;color:#F15821; height:50px; font-size:20px;border-radius: 5px; border: 1px solid transparent;' ><input type='text' value='Valor total:' readonly='readonly' style='float:right;width:100px; height:50px; font-size:20px;border-radius: 5px; border: 1px solid transparent;'>
					</center>
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
		<script src="atualizarValor.js"></script>
		<!----------------------------------------FIM JAVA-------------------------------------------->
	</body>
</html>