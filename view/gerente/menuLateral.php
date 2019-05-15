<?php

    include "../../controller/gerenteController/verificacaoSessionGerenteController.php";
    
    if($v){
        echo "
            <script>
                window.location = '../logar.php';
            </script>";
        $nomeCompleto = "";
    }else
        $nomeCompleto = $gerente->getNomeCompleto();

?>

<nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="../Gerente/index.php" title="Sweet Salty | Voltar para a página inicial"><h6>Sweet Salty | Seja bem vindo(a), <?= $gerente->getNomeCompleto()?></h6></a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive"bottom="0" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
            <li class="nav-item" data-toggle="tooltip" data-placement="right" >
                <a class="nav-link" href="Perfil.php" title="Acesse seu perfil">
                    <i class="fa fa-user-circle-o"></i>
                    <span class="nav-link-text">Perfil</span>
                </a>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right" >
                <a class="nav-link" href="../Gerente/Grafico_estoque.php" title="Acesse os gráficos">
                    <i class="fa fa-fw fa-area-chart"></i>
                    <span class="nav-link-text">Gráficos</span>
                </a>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Acesse os gráficos">
                <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseExamplePages" data-parent="#exampleAccordion">
                    <i class="fa fa-list-alt"></i>
                    <span class="nav-link-text">Listas</span>
                </a>
                <ul class="sidenav-second-level collapse" id="collapseExamplePages">
                    <li>
                        <a href="lista_clientes.php">Clientes</a>
                    </li>
                    <li>
                        <a href="Lista_Funcionarios.php">Colaboradores</a>
                    </li>
                    <li>
                        <a href="lista_cardapio.php">Cardápio</a>
                    </li>
                    <li>
                        <a href="Estoque1.php">Estoque</a>
                    </li>
                </ul>
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