<?php 
    @session_start();
    if(!isset($_SESSION['id_cliente'])){
        header("Location: ../logar.php");
    }
    $id = $_SESSION['id_cliente'];
?>
<style>
    .desktop-t{
        margin-bottom: 0px;
    }
    .moble-m{
        margin: 0px;
    }
    .i{
        color:whitesmoke;
    }
    @media (min-width: 500px){
        .desktop{
            display: block;
        }
        .moble{
            display: none;
        }
    }
    @media (max-width: 501px){
        .desktop{
            display: none;
        }
        .moble{
            display: block;
        }
    }
</style>
<?php
    include "../Funcoes/conexao.php";
    $comando = "SELECT COUNT(*) as id_pedido FROM tb_pedidos WHERE id_cliente = $id and Situacao ='C'";
    $Cs = $fusca->prepare($comando);
    $Cs->execute();
    foreach($Cs as $carrega){
        $contador = $carrega['id_pedido'];
        if($contador != 0)
            $style = "block";
        else
            $style = "none";
    }
?>
<nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
    <a class="navbar-brand desktop" style="overflow:hidden; width:auto" href="../Cliente/index.php" title="Sweet Salty | Voltar para página inicial"><?php echo "<h6 class='desktop-t'>Sweet Salty | Seja bem vindo(a), ".htmlspecialchars($_SESSION["Nome_cliente"])."</h6>"?></a>
    <a class="navbar-brand moble" href="../Cliente/index.php" title="Sweet Salty | Voltar para página inicial"><?php echo "<h6 class='moble-m'>Sweet Salty</h6>"?></a>
    <i id="preparo" style="display:<?php echo $style;?>" class="i">Em preparo</i>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive"bottom="0" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Acesse o cardápio">
                <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" title="Cardápio" href="#collapseExamplePages" data-parent="#exampleAccordion">
                    <i class="fa fa-fw fa-book" ></i>
                    <span class="nav-link-text">Cardápio</span>
                </a>
                <ul class="sidenav-second-level collapse" id="collapseExamplePages">
                    <li title="Bebidas">
                        <a href="../Cliente/lista_bebidas.php">Bebidas</a>
                    </li>
                    <li title="Doces">
                        <a href="../Cliente/lista_doces.php">Doces</a>
                    </li>
                    <li title="Salgados">
                        <a href="../Cliente/lista_salgados.php">Salgados</a>
                    </li>
                </ul>
            </li>
            <?php
            include "../Funcoes/conexao.php";
              	$sql = "SELECT COUNT(*) as id_pedido FROM tb_pedidos WHERE id_cliente = $id and Situacao ='N'";
              	$contatos = $fusca->prepare($sql);
              	$contatos->execute();
              	foreach($contatos as $contar){
              		$id_p = $contar['id_pedido'];
                    if ($id_p != 0){
                        echo"
                            <li class='nav-item' data-toggle='tooltip' data-placement='right' title='Acesse seu pedido'>
                                <a class='nav-link' href='../Cliente/pedidos.php' title='Pedido'>
                                    <i class='fa fa-shopping-cart'></i>
                                    <span class='nav-link-text' >Pedido</span><span class='badge badge-primary badge-pill' style='background:#F15821;float:right;'>";
                                    echo $id_p;
                                    echo"</span>
                                </a>
                            </li>";
                    }
                }
            ?>
            <?php
                include "../Funcoes/conexao.php";
              	$sql = "SELECT COUNT(*) as id_pedido FROM tb_pedidos WHERE id_cliente = $id and Situacao ='PC'";
              	$contatos = $fusca->prepare($sql);
              	$contatos->execute();
              	foreach($contatos as $contar){
              		$id_p = $contar['id_pedido'];
                    if ($id_p != 0){
                        echo "
                        <li class='nav-item' data-toggle='tooltip' data-placement='right' title='Acesse seu pedido'>
                            <a class='nav-link' href='../Cliente/pedido_pronto.php' title='Finalizar'>
                                <i class='fa fa-money'></i>
                                <span class='nav-link-text' >Finalizar</span><span class='badge badge-primary badge-pill' style='background:#F15821;float:right;'>";
                                echo $id_p;
                                echo"</span>
                            </a>
                        </li>";
                    }
                }
            ?>
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Acesse seu perfil">
                <a title="Acesse seu perfil" class="nav-link" href="perfilCliente.php">
                    <i class="fa fa-user-circle-o"></i>
                    <span class="nav-link-text">Perfil</span>
                </a>
            </li>
        </ul>
        <ul class="navbar-nav sidenav-toggler">
            <li class="nav-item">
                <a class="nav-link text-center" id="sidenavToggler" title="Fechar menu lateral">
                    <i class="fa fa-fw fa-angle-left"></i>
                </a>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" data-toggle="modal" data-target="#exampleModal" title="Sair">
                    <i class="fa fa-fw fa-sign-out"></i>Sair
                </a>
            </li>
        </ul>
    </div>
  </nav>
    <script>
    	$(document).ready(function(){
    	    let n_temporario = -1;
    	    let intervalo = setInterval(function(){
        	 	$.post("intervalo.php", function(numero){
        	 	    //alert(numero + '_' + n_temporario);
        	 	    if(n_temporario != -1)
        			    if(numero != n_temporario)
        			        location.reload();
                        n_temporario = numero;
        	 	});
    	    },3000);
    	});
    </script>