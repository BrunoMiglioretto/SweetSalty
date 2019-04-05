<?php

	session_start();
	$_SESSION['nome'];
	$_SESSION['email'];

	if(ISSET($_SESSION['email'])){
		echo $_SESSION['email'];
		echo $_SESSION['nome'];
	} else{
		echo "Não clicou no botão";
	}



?>