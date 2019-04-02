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
    <a class="navbar-brand" href="../Cozinha/index.php" title="Sweet Salty | Cozinha"><?php echo "<h6>Sweet Salty | $nome </h6>"?></a>
    
   
      <ul class="navbar-nav ml-auto">
     
        <li class="nav-item">
          <a class="nav-link" data-toggle="modal" data-target="#exampleModal" title="Sair">
            <i class="fa fa-fw fa-sign-out"></i>Sair</a>
        </li>
      </ul>
    </div>
  </nav>