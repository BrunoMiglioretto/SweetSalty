<?php

    include "../../controller/clienteController/verificacaoSessionClienteController.php";
    
    if($v){
        echo "
            <script>
                window.location = '../logar.php';
            </script>";
        $nomeCompleto = "";
    }else
        $nomeCompleto = $cliente->getNomeCompleto();

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
<nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
    <a class="navbar-brand desktop" style="overflow:hidden; width:auto" href="../cliente/index.php" title="Sweet Salty | Voltar para página inicial">
        <h6 class='desktop-t'>Sweet Salty | Seja bem vindo(a), <?= $nomeCompleto?></h6>
    </a>
    <a class="navbar-brand moble" href="" title="Sweet Salty | Voltar para página inicial">
        <h6 class='moble-m'>Sweet Salty</h6>
    </a>
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
                        <a href="listasCardapio/listaBebidas.php">Bebidas</a>
                    </li>
                    <li title="Doces">
                        <a href="listasCardapio/listaDoces.php">Doces</a>
                    </li>
                    <li title="Salgados">
                        <a href="listasCardapio/listaSalgados.php">Salgados</a>
                    </li>
                </ul>
            </li>
            <li class='nav-item' data-toggle='tooltip' data-placement='right'>
                <a class='nav-link' href='pedidos/pedidos.php' title='Pedido'>
                    <i class='fa fa-shopping-cart'></i>
                    <span class='nav-link-text'>Pedidos</span>
                    <span class='badge badge-primary badge-pill' style='background:#F15821;float:right;'></span>
                </a>
            </li>
            <li class='nav-item' data-toggle='tooltip' data-placement='right'>
                <a class='nav-link' href='pedidos/pedidosEnviados.php' title='Pedidos enviados'>
                <i class="fa fa-paper-plane" aria-hidden="true"></i>
                    <span class='nav-link-text'>Pedidos Enviados</span>
                    <span class='badge badge-primary badge-pill' style='background:#F15821;float:right;'></span>
                </a>
            </li>
            <li class='nav-item' data-toggle='tooltip' data-placement='right'>
                <a class='nav-link' href='' title='Realidade Aumentada'>
                    <i class='fa fa-camera'></i>
                    <span class='nav-link-text' >Realidade Aumentada</span>
                    <span class='badge badge-primary badge-pill' style='background:#F15821;float:right;'></span>
                </a>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Acesse mais informações">
                <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" title="Mais botões" href="#collapseMais" data-parent="#exampleAccordion">
                    <i class="fa fa-fw fa-plus" ></i>
                    <span class="nav-link-text">Mais</span>
                </a>
                <ul class="sidenav-second-level collapse" id="collapseMais">
                    <li title="Perfil">
                        <a 
                            href="
                                <?php
                                    if($tipo == "ClientePadrao")
                                        echo "perfil/perfilPadrao.php";
                                    if($tipo == "ClienteGoogleFacebook")
                                        echo "perfil/perfilGF.php";
                                ?>
                            "
                        >Perfil
                        </a>
                    </li>
                    <li title="Mudar de mesa">
                        <a href="mesas/mudarMesa.php">Mudar de mesa</a>
                    </li>
                    <li title="Juntar mesas">
                        <a href="../../controller/clienteController/juncaoMesas/verificarSolicitacaoMesaController.php">Juntar mesas</a>
                    </li>
                </ul>
            </li>
        </ul>
        <ul class="navbar-nav sidenav-toggler">
            <li class="nav-item">
                <a class="nav-link text-center" id="sidenavToggler" title="Fechar/Abrir Menu">
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
 