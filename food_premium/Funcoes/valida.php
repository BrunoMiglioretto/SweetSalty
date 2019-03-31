<?php 
	session_start();
	$email =  filter_input(INPUT_POST,'userEmail', FILTER_SANITIZE_STRING);

	include ("conexao.php");
	$verif_conta = "SELECT *  FROM tb_cadastro WHERE email = '$email'";
	$conectando  = $fusca -> prepare($verif_conta);
	$conectando -> execute(); 
	$verificou  = $conectando -> rowCount();
		if($verificou != 0){
			//echo "Encontrou um usuário";
			$userName = filter_input(INPUT_POST,'userName', FILTER_SANITIZE_STRING);
			$_SESSION['userName']  = $userName;
			$_SESSION['userEmail'] = $email;
			$resultado = '../food_premium/Cliente/mesa.php';
			$_SESSION['home'] = $resultado;
			echo $resultado;
		}else{
			$resultado = "erro";
			echo (json_encode($resultado));
		}
?>