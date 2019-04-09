<?php

class Carrinho{
	
	public function __construct($idUsuario){
		if(!isset($_SESSION["carrinho"])){
			$sql = "INSERT INTO tb_pedido SET situacao = '1', hora = '2019-05-01', id_cadastro = ".$idUsuario.", subtotal = 0";
			$conexao = new Conexao;
			$c = $conexao->conexao();
			$pedido = $c->prepare($sql);
			$pedido->execute();
			$c = NULL;
		}
	}

	public function visualizarPedidos($idUsuario){
		
			
	}
	
	public function colocarPedido($idCardapio, $quant, $idCliente){
		$sql1 = "SELECT id_pedido FROM tb_pedido WHERE id_cadastro = ".$idCliente;
		$conexao = new Conexao;
		$c = $conexao->conexao();
		$id_pedido = $c->prepare($sql1);
		$id_pedido->execute();
		foreach($id_pedido as $id_pedidoCarrega){
			$id_pedidoC = $id_pedidoCarrega["id_pedido"];
		}
		$sql2 = "INSERT INTO tb_alimento_pedido SET id_pedido = ".$id_pedidoC.", id_cardapio = ".$idCardapio.", quant = ". $quant;
		$pedido = $c->prepare($sql2);
		$pedido->execute();
		$c = NULL;
		return true;
	}
	
	public function editarPedido($idCardapio, $quant){
		
	}
	
	public function excluirPedido($idCardapio){
		
	}
	
	public function enviarPedido($idUsuario){
		
	}
	
}
