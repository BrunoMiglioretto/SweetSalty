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
		$sql = "SELECT * FROM tb_pedido INNER JOIN tb_alimento_pedido ON tb_pedido.id_pedido = tb_alimento_pedido.id_pedido 
										INNER JOIN tb_cardapio ON tb_alimento_pedido.id_cardapio = tb_cardapio.id_cardapio
										WHERE id_cadastro =".$idUsuario." and situacao = 1";
		$conexao = new Conexao;
		$c = $conexao->conexao();
		$pedidos = $c->prepare($sql);
		$pedidos->execute();
		return $pedidos;
	}
	
	public function colocarPedido($idCardapio, $quant, $idCliente){
		// Pega o valor do produto
		$sql1 = "SELECT valor_unitario FROM tb_cardapio WHERE id_cardapio =".$idCardapio;
		$conexao = new Conexao;
		$c = $conexao->conexao();
		$valorCardapio = $c->prepare($sql1);
		$valorCardapio->execute();
		foreach($valorCardapio as $carregaValor){
			$valor = $carregaValor["valor_unitario"];
		}
		$sql2 = "UPDATE tb_pedido SET subtotal = subtotal + ($quant * $valor) WHERE id_cadastro =".$idCliente;
		$conexao = new Conexao;
		$c = $conexao->conexao();
		$valorPedido = $c->prepare($sql2);
		$valorPedido->execute();

		// Pegar o id_pedido para saber para onde inserir
		$sql3 = "SELECT id_pedido FROM tb_pedido WHERE id_cadastro = ".$idCliente;
		$idPedido = $c->prepare($sql3);
		$idPedido->execute();
		foreach($idPedido as $idPedidoCarrega){
			$idPedidoC = $idPedidoCarrega["id_pedido"];
		}
		// Verificar se já tem um item no banco para não coloca-lo denovo
		$sql4 = "SELECT quant FROM tb_alimento_pedido WHERE id_pedido =".$idPedidoC." and id_cardapio =".$idCardapio;
		$pedido = $c->prepare($sql4);
		$pedido->execute();
		if($pedido->rowCount() != 0){
			foreach($pedido as $carregaQuant){$quantBD = $carregaQuant["quant"];}
			$quantidade = $quant + $quantBD;
			$sql5 = "UPDATE tb_alimento_pedido SET quant = ".$quantidade." WHERE id_cardapio =".$idCardapio;
			$pedido = $c->prepare($sql5);
			$pedido->execute();
		}else{
			$sql6 = "INSERT INTO tb_alimento_pedido SET id_pedido = ".$idPedidoC.", id_cardapio = ".$idCardapio.", quant = ". $quant;
			$pedido = $c->prepare($sql6);
			$pedido->execute();
		}
		$c = NULL;
		return true;
	}

	public function pegarSubtotal($idCliente){
		$sql = "SELECT subtotal FROM tb_pedido WHERE id_cadastro =".$idCliente;
		$conexao = new Conexao;
		$c = $conexao->conexao();
		$subtotal = $c->prepare($sql);
		$subtotal->execute();
		foreach($subtotal as $carregaSubtotal){
			$subtotal = $carregaSubtotal["subtotal"];
		}
		return $subtotal;
	}
	
	public function editarPedido($idCardapio, $quant){
		
	}
	
	public function excluirPedido($idCardapio){
		
	}
	
	public function enviarPedido($idUsuario){
		
	}
	
}
