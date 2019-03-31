      <?php 
    	    session_start();
    	    $id = $_SESSION['id_funcionario'];
    		if(!isset($_SESSION['id_funcionario'])){
    			header("Location:../Funcoes/logar.php");
    		}
    	?>
	    <?php
			$sql = "SELECT * FROM tb_funcionario WHERE id_funcionario =$id";
			include "../Funcoes/conexao.php";
			$contatos = $fusca -> prepare($sql);
			$contatos-> execute();

			foreach($contatos as $lista){
				$nome 									= $lista["Nome"];
				$sobrenome 							= $lista["Sobrenome"];
			}
		?>
<nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="../Fornecedor/index.php" title="Sweet Salty | Voltar para página inicial"><?php echo "<h6>Sweet Salty | Seja bem vindo(a), $nome </h6>"?></a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="../Funcoes/Perfil.php" title="Perfil">
            <i class="fa fa-user-circle-o"></i>
            <span class="nav-link-text">Perfil</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Charts">
          <a class="nav-link" href="../Chat/index.php" title="Chat">
            <i class="fa fa-envelope"></i>
            <span class="nav-link-text">Chat</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Charts">
          <a class="nav-link" href="../Fornecedor/Pedidos.php" title="Pedidos">
            <i class="fa fa-cubes"></i>
            <span class="nav-link-text">Pedidos</span>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav sidenav-toggler">
        <li class="nav-item">
          <a class="nav-link text-center" id="sidenavToggler">
            <i class="fa fa-fw fa-angle-left"></i>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" data-toggle="modal" data-target="#exampleModal" title="Sair">
            <i class="fa fa-fw fa-sign-out"></i>Sair</a>
        </li>
      </ul>
    </div>
  </nav>