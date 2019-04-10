<?php

class Carrinho{
	
	public function __construct($idUsuario){
		$sql1 = "SELECT id_pedido FROM tb_pedido WHERE id_cadastro =".$idUsuario;
		$conexao = new Conexao;
		$c = $conexao->conexao();
		$pedidoCliente = $c->prepare($sql1);
		$pedidoCliente->execute();
		if($pedidoCliente->rowCount() == 0){
			$sql2 = "INSERT INTO tb_pedido SET situacao = '1', hora = '2019-05-01', id_cadastro = ".$idUsuario.", subtotal = 0";
			$pedido = $c->prepare($sql2);
			$pedido->execute();
			$c = NULL;
		}
	}

	public function visualizarPedidos($idUsuario){
		
			
	}
	
	public function colocarPedido($idCardapio, $quant, $idCliente){
		// Pegar o id_pedido para saber para onde inserir
		$sql1 = "SELECT id_pedido FROM tb_pedido WHERE id_cadastro = ".$idCliente;
		$conexao = new Conexao;
		$c = $conexao->conexao();
		$idPedido = $c->prepare($sql1);
		$idPedido->execute();
		foreach($idPedido as $idPedidoCarrega){
			$idPedidoC = $idPedidoCarrega["id_pedido"];
		}
		// Verificar se já tem um item no banco para não coloca-lo denovo
		$sql2 = "SELECT quant FROM tb_alimento_pedido WHERE id_pedido =".$idPedidoC." and id_cardapio =".$idCardapio;
		$pedido = $c->prepare($sql2);
		$pedido->execute();
		if($pedido->rowCount() != 0){
			foreach($pedido as $carregaQuant){$quantBD = $carregaQuant["quant"];}
			$quantidade = $quant + $quantBD;
			$sql3 = "UPDATE tb_alimento_pedido SET quant = ".$quantidade." WHERE id_cardapio =".$idCardapio;
			$pedido = $c->prepare($sql3);
			$pedido->execute();
		}else{
			$sql4 = "INSERT INTO tb_alimento_pedido SET id_pedido = ".$idPedidoC.", id_cardapio = ".$idCardapio.", quant = ". $quant;
			$pedido = $c->prepare($sql4);
			$pedido->execute();
		}
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
