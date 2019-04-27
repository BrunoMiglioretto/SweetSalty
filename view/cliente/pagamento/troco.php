<?php
 	session_start();
    $id_c = $_SESSION['id_cliente'];
?>
<?php
    include "../Funcoes/conexao.php";
    $sql = "SELECT SUM(Valor * Quantidade) as total FROM tb_pedidos WHERE Situacao ='PC' and id_cliente= '$id_c'";
    $contatos = $fusca->prepare($sql);
    $contatos->execute();    
    foreach($contatos as $contar){
        $id_total = $contar["total"];
    }
?>
<?php
    if(isset($_POST["enviar"])){
        $id_pagamento  	 =  ""; 
        $id_cliente  	 = $id_c; 
        $Troco           = $_POST["resul3"]; 
        include "../Funcoes/conexao.php";
        $sql = "INSERT INTO tb_troco VALUES (?,?,?)";
        $contatos = $fusca -> prepare($sql);	
        $contatos -> execute(array($id_pagamento,$id_cliente,$Troco));	
        $comando = "UPDATE tb_pedidos SET Situacao = 1 WHERE id_cliente = $id_c";
        $pedido = $fusca->prepare($comando);
        $pedido->execute();
        $pedido = NULL;
        $contatos = NULL; //Encerra a conexão com o BD	
        //header("Location: listar.php");
        echo"   <script>
                    window.location.href='pagamento.php';
                </script>";
    }
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
		<?php
			$sql = "SELECT Situacao FROM tb_pedidos";
			include "../Funcoes/conexao.php";
			$contatos = $fusca -> prepare($sql);
			$contatos-> execute();	
			foreach($contatos as $lista){
			    $situacao	    = $lista["Situacao"];
			}
		?>
		<?php
            echo "  <br><br><br><br>
                    <center><h1 style='font-family: `Raleway`, sans-serif; font-size:50px; color:#F15821;'>Pagamento - Dinheiro</h1></center>
    	    	    <div class='content-wrapper' class='print'>	
	    	            <div class='container-fluid' class='print'>
	    		            <div class='card-body' class='print'>
	    		                <div class='card-header'>
	    		                    <input type='text' value='Valor total:' readonly='readonly' style='width:100px; height:45px; font-size:20px;border-radius: 5px; border: 1px solid transparent; background-color: #F7F7F7;'>
	    		                    <input type='text' id='n2' readonly='readonly' value='R$".number_format($id_total, 2, ',', ' ')."'style='width:100px;color:#F15821; height:45px; font-size:20px;border-radius: 5px; border: 1px solid transparent;background-color: #F7F7F7;' ><br>
	    		                    <div class='card-body'>
	    			                    <div class='table-responsive' class='print'>
          	";
    	?>
                                            <h5>Troco para: R$<input type='text' name='troco' id='n1' onkeyup='calcular();' onclick='zerar()' value="0,00" style='width:100px; height:40px; font-size:20px;border-radius: 5px; border: 1px solid transparent;background-color: #F7F7F7;'><br></h5>
                                            <form method="POST" action="">
                                                <input type='text'  value='Seu troco será: R$' readonly='readonly' style='width:160px; height:45px; font-size:20px;border-radius: 5px; border: 1px solid transparent;background-color: #F7F7F7;' >
                                                <input style="width:100px; height:45px; font-size:20px;border-radius: 5px; border: 1px solid transparent;background-color: #F7F7F7;" readonly='readonly' type='text' name='resul3' id="resultado"><br>
                                                <button type="button" class="btn btn-secondary" style='float:right;background-color: #b3d392; border: 0px;'  id="concluir"  data-toggle="modal" data-target="#modal_concluir" disabled>Concluir</button>
                                                <!-- Modal -->
                                                <div class="modal fade" id="modal_concluir" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Concluir pedido</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                Deseja mesmo concluir o pedido?
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                                                <button type="submit" class="btn btn-primary" name="enviar">Concluir</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
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
				        <a class="btn btn-primary" href="../../controller/clienteController/sairController.php">Sair</a>
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
		<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
		<script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
		<!-- Core plugin JavaScript-->
		<!-- Page level plugin JavaScript-->
		<script src="../vendor/chart.js/Chart.min.js"></script>
		<script src="../vendor/datatables/jquery.dataTables.js"></script>
		<script src="../vendor/datatables/dataTables.bootstrap4.js"></script>
		<!-- Custom scripts for all pages-->
		<script src="../js/sb-admin.min.js"></script>
		<!-- Custom scripts for this page-->
		<script src="../js/sb-admin-datatables.min.js"></script>
		<script src="../js/sb-admin-charts.min.js"></script>
        <script type="text/javascript">
            function id( el ){
                return document.getElementById( el );
            }
            function menos( id_qnt ) {
                var qnt = parseInt( id( id_qnt ).value );
                if( qnt > 0 )
                    id( id_qnt ).value = qnt - 1; 
            } 
            function mais( id_qnt ){
                id( id_qnt ).value = parseInt( id( id_qnt ).value ) + 1; 
            }
        </script>
        <script src="../vendor/jquery.mask.min.js"></script>
		<script>
		    function calcular(){
    		    let valor = document.getElementById('n1').value;
                var teste = parseFloat(<?php echo $id_total;?>);
                $("#n1").mask("990,00", {reverse: true});
                valor = valor.replace(",",".");
                valor = parseFloat(valor);
                var r = valor - teste;
                let concluir = document.getElementById('concluir');
                if(r<0 && r!=0){
                    r=0;
                    concluir.style.backgroundColor = '#b3d392';
                    document.getElementById('concluir').disabled = true;
                }else{
                    concluir.style.backgroundColor = '#71A140';
                    document.getElementById('concluir').disabled = false;
                }
                r = r.toFixed(2).replace(".",",");
                document.getElementById('resultado').value = r;
		    }
		    function zerar(){
		        document.getElementById('n1').value = '';
                document.getElementById('concluir').disabled = true;
                document.getElementById('resultado').value = '';
		    }
		</script>
		<!----------------------------------------FIM JAVA-------------------------------------------->
	</body>
</html>