<?php

session_start();

include "../../../model/Usuario.class.php";
// Cliente
include "../../../model/Cliente/Cliente.class.php";
include "../../../model/Cliente/ClienteGoogleFacebook.class.php";
include "../../../model/Cliente/ClientePadrao.class.php";
include "../../../model/Cliente/validador.class.php";
include "../../../model/Cliente/validarEmail.class.php";

include "../../../model/Conexao.class.php";

// Pega todos os dados do formulario

$informarcoes[0] = $_POST["email"];
$informarcoes[1] = $_POST["nome"];
$informarcoes[2] = 41;
$informarcoes[3] = $_POST["numeroTelefone"];
$informarcoes[4] = $_POST["sexo"];
$informarcoes[5] = $_POST["dataNascimento"];
$informarcoes[6] = $_POST["senha"];
$informarcoes[7] = $_POST["confSenha"];


$cliente = new ClientePadrao;
if(!$cliente->cadastrar($informarcoes)){ // Retorna False se algum dado estiver errado
	echo "
		<script>
			alert('Algum dado está errado');
			window.location = '../../../view/cadastro_cliente.php';
		</script>";
}else{
	
	echo "Cadastrado";
} 
// Se for inserido no banco, ele continua

// Instancia a classe ValidarEmail que esta herdando da classe Validador que por sua vez é uma classe abstrata.
$cliente2 = new ValidarEmail;
$cliente2->EnviarEmail($informarcoes[0]);
$cliente2->getEmail(); // pega o status do email, se for falso, significa que não conseguiu enviar para o e-mail do usuário.
					  
	if(getEmail() == false){ 
		echo "<script>alert('Ocorreu algum erro no envio do e-mail, tente novamente.')</script>";
		echo "<script>window.location ='../../../view/CadastroCliente.php'</script>";
	}else // se retornar um e-mail, foi possivel enviar para o usuário.
		echo "<script>alert('enviamos um e-mail de confirmação, sertifique seu sua caixa de e-mails.)</script>"; 
		echo "<script>window.location ='../../../view/logar.php'</script>";
		




