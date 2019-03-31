<?php
    session_start();
    $id_c = $_SESSION['id_cliente'];
?>
<?php
    include "../Funcoes/conexao.php";
    $sql = "SELECT SUM(Valor * Quantidade) as total FROM tb_pedidos WHERE id_cliente = '$id_c' and Situacao = 'N'";
    $contatos = $fusca->prepare($sql);
    $contatos->execute();			
    foreach($contatos as $contar){
        $id_ = $contar["total"];
        $id_v =number_format($id_,2,',',' ');
    }
?>
<?php
	include "../Funcoes/conexao.php";
	$sql = "SELECT * FROM tb_pedidos";
	$contatos = $fusca -> prepare($sql);
	$contatos -> execute();
	foreach($contatos as $edita){
		$si = $edita["Situacao"];
		if(isset($_POST['Enviar'])){
            $Situacao1      = $si;	
            $Situacao       = "C"; 
            $query 		    = "UPDATE tb_pedidos SET Situacao='C' WHERE id_cliente ='$id_c' and Situacao = 'N'";
            $sql 		    = $fusca -> prepare($query);
            $sql -> execute();			
            $sql = null;
            echo "
                <script>
                    window.location.href='pedido_pronto.php';
                </script>";
		}
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
		<title>Pedidos | Sweet Salty</title>
	  <!--------------------------------------FIM DE TODOS CSS-------------------------------------->
	    <script src="https://code.jquery.com/jquery-2.1.0.min.js"></script>
	    <!-- Bootstrap core JavaScript-->
		<script src="../vendor/jquery/jquery.min.js"></script>
		<script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
		<!-- Core plugin JavaScript-->
		<script src="../vendor/jquery-easing/jquery.easing.min.js"></script>
	    <script>
            function editarQuantidade (e) {
                document.getElementById(e).style.display="block";
                document.getElementById("d"+e).style.display="none";
                document.getElementById(e).focus();
            } 
            function editarTempo1 (e,id) {
                document.getElementById(e).style.display="none";
                document.getElementById("d"+e).style.display="block";
                var t = document.getElementById(e).value;
                if(t >= 13){
                    document.getElementById("d"+e).innerHTML= 13;
                    document.getElementById(e).value = 13;
                    t = 13;
                }
                else if(t <1){    
                    document.getElementById("d"+e).innerHTML= 1;
                    document.getElementById(e).value = 1;
                    t = 1;
                }else{
                    document.getElementById("d"+e).innerHTML=t;
                }
                var v =document.getElementById("v"+e).value;
                var total = t * v;
                total = total.toFixed(2).replace(".",",");
                document.getElementById("m"+e).innerHTML=total;
      		    $.ajax({
                    type:'POST',
                    url:'ajaxQuantidade.php',
                    data:'qtd='+t+"&id="+id,
                    success:function(html){
         	            $('#valortotal').html(html);
                    }
		  	    });
		  	   
            }
        </script>
        <style>
    	    .dataTables_filter, .dataTables_length, .dataTables_info, .pagination{
    		    visibility: hidden!important;
    	    }
        </style>
        <style>
            .pedido_N{
                width: 250px;
                padding: 20px 3px 20px 3px;
                margin: 0px;
                background-color: #F7F7F7;
                border: 2px solid #F15821;
                border-radius: 4px;
                text-align: center;
                position: fixed;
                right: 50px;
                top: 50px;
                font-family: Raleway, sans-serif;
                display: none;
            }
        </style>
	</head>
	<body id="page-top">
		<!--------------------------------------INCLUDE MENU---------------------------------------->
        <?php include '../Menu_Lateral/Menu_Cliente.php'; ?>
        <div class="pedido_N">
            <p>Pedido realizado com sucesso!</p>
        </div>
		<!----------------------------------------FIM INCLUDE--------------------------------------->
		<!-------------------------------------------CONTEUDO--------------------------------------->
        <br><br><br><center><h1 style="font-family: 'Raleway', sans-serif; font-size:50px; color:#F15821;">Meu Pedido</h1></center>
        <div class="content-wrapper">
            <div class="container-fluid">
                <div class="card mb-3">
        			<div class="card-header">
          				<?php echo "<span id='valortotal'><input type='text' style='float:right;width:100px; background-color: #F7F7F7;height:50px; font-size:20px;border-radius: 5px; border: 1px solid transparent;' value='R$ $id_v ' readonly='readonly'></span><input type='text' readonly='readonly' value='Valor total:' style='float:right;width:100px;font-size:20px; background-color: #F7F7F7;height:50px;border-radius: 5px; font-family: `Raleway`, sans-serif; color:#F15821;border: 1px solid transparent;'>"?>
        				<div class="card-body">
                            <div class="td">
                                <div class="container-fluid" class='print'>
                                    <div class="card-body" class='print'>
	          							<div class="table-responsive" class='print' id="atualiza">
            								<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" class='print'>
                                                <thead>
    							                	<tr>
                                                        <th>Categoria</th>
                                                        <th>Pedido</th>
                                                        <th>Quantidade</th>
                                                        <th>Valor unitário</th>
                                                        <th>Excluir</th>
                                                   </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                        $sql = "SELECT * FROM tb_pedidos WHERE id_cliente = '$id_c' and Situacao = 'N'";
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
                                                            echo "<td>".$categoria."</td>";
                                                            echo "<td>".$pedido."</td>";                                                            echo "<td onmouseover='editarQuantidade(\"".$i."\")' onmouseout='editarTempo1(\"".$i."\",\"".$id."\")'><input type='text' value='".$quantidade."' style='width:50px;display:none;padding: 0px;' id='".$i."'
                                                            ><span id='d".$i."'>".$quantidade."</span></td>";
                                                            echo "<td> R$ <span id='m".$i."'>".number_format($valor,2,",",".")."</span><input type='hidden' value='".$valor."' id='v".$i."'><input type='hidden' value='".$total."' id='t".$i."'></td>";
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
                                                                                    Deseja excluir $pedido?
                                                                                </div>
                                                                                <div class='modal-footer'>
                                                                                    <button type='button' class='btn btn-secondary' data-dismiss='modal'>Cancelar</button>
                                                                                    <a href='excluir_pedido.php?id_pedido=$id'><button type='button' class='btn btn-primary'>Excluir</button></a>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>";//Modal
                                                            echo "</tr>";				
                                                            $i++;
                                                        }
                                                        echo "<input type='hidden' value='".$i."' id='totalcontador'>";
													?>
								                </tbody>
            							    </table>
          								</div>
          								<div style='float: right;'>
          									<form method="POST" action="">
          									    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#cozinha">
                                                    Enviar para Cozinha
                                                </button>
          										<div class="modal fade" id="cozinha" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Enviar</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                Deseja mesmo enviar para a cozinha?
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Não</button>
                                                                <input type="submit" value="Enviar" name="Enviar" class="btn btn-secondary" style="background-color:#71a140">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
          									</form>
        								</div>
                                    </div>
                                </div><br>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><br><br>
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
			function menos( id_qnt ){
				var qnt = parseInt( id( id_qnt ).value );
				if( qnt > 1 )
					id( id_qnt ).value = qnt - 1; 
			}
			function mais( id_qnt ){
				id( id_qnt ).value = parseInt( id( id_qnt ).value ) + 1; 
			} 
		</script>
		<script>
            $(document).ready(function(){
                let p_novo = <?php echo $_GET['p_novo'];?>;
                if(p_novo == 1){
                    $('.pedido_N').fadeIn(1000);
                    $('.pedido_N').on('click', function(){
                        $('.pedido_N').fadeOut(500);
                    })
                }
            });
        </script>
		<script src="atualizarValor.js"></script>
		<!----------------------------------------FIM JAVA-------------------------------------------->
	</body>
</html>