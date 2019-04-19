<?php

class Carrinho{
	
	private $idPedido;

	public function __construct($idUsuario){
		$sql1 = "SELECT id_pedido FROM tb_pedido WHERE id_cadastro =".$idUsuario;
		$conexao = new Conexao;
		$c = $conexao->conexaoPDO();
		$pedidoCliente = $c->prepare($sql1);
		$pedidoCliente->execute();
		if($pedidoCliente->rowCount() == 0){
			date_default_timezone_set('America/Sao_Paulo');
			$hora = date("h:i");
			$data = date("Y-m-d");
			$sql2 = "INSERT INTO tb_pedido SET hora = '".$hora."', data_pedido = '".$data."', id_cadastro = ".$idUsuario.", subtotal = 0";
			$pedido = $c->prepare($sql2);
			$pedido->execute();

		}
		$sql3 = "SELECT id_pedido FROM tb_pedido WHERE id_cadastro =".$idUsuario;
		$idP = $c->prepare($sql3);
		$idP->execute();

		foreach($idP as $p){
			$this->setIdPedido($p["id_pedido"]);
		}
	}

	public function visualizarPedidos(){
		$sql = "SELECT * FROM tb_pedido INNER JOIN tb_alimento_pedido ON tb_pedido.id_pedido = tb_alimento_pedido.id_pedido 
										INNER JOIN tb_cardapio ON tb_alimento_pedido.id_cardapio = tb_cardapio.id_cardapio
										INNER JOIN tb_cardapio_subcat ON tb_cardapio_subcat.id_cardapio_subcat = tb_cardapio.id_cardapio_subcat
										WHERE tb_pedido.id_pedido = ".$this->getIdPedido()." and situacao = 1";
		$conexao = new Conexao;
		$c = $conexao->conexaoPDO();
		$pedidos = $c->prepare($sql);
		$pedidos->execute();
		return $pedidos;
	}

	public function visualizarPedidosEnviados(){
		$sql = "SELECT * FROM tb_pedido INNER JOIN tb_alimento_pedido ON tb_pedido.id_pedido = tb_alimento_pedido.id_pedido 
										INNER JOIN tb_cardapio ON tb_alimento_pedido.id_cardapio = tb_cardapio.id_cardapio
										INNER JOIN tb_cardapio_subcat ON tb_cardapio_subcat.id_cardapio_subcat = tb_cardapio.id_cardapio_subcat
										WHERE tb_pedido.id_pedido = ".$this->getIdPedido()." and situacao != 1";
		$conexao = new Conexao;
		$c = $conexao->conexaoPDO();
		$pedidos = $c->prepare($sql);
		$pedidos->execute();
		return $pedidos;
	}
	
	public function colocarPedido($idCardapio, $quant){
		// Pega o valor do produto
		$sql1 = "SELECT valor_unitario FROM tb_cardapio WHERE id_cardapio =".$idCardapio;
		$conexao = new Conexao;
		$c = $conexao->conexaoPDO();
		$valorCardapio = $c->prepare($sql1);
		$valorCardapio->execute();
		foreach($valorCardapio as $carregaValor){
			$valor = $carregaValor["valor_unitario"];
		}
		// Adiciona o valor do produto no subtotal
		$sql2 = "UPDATE tb_pedido SET subtotal = subtotal + ($quant * $valor) WHERE id_pedido =".$this->getIdPedido();
		$conexao = new Conexao;
		$c = $conexao->conexaoPDO();
		$valorPedido = $c->prepare($sql2);
		$valorPedido->execute();

		// Verificar se já tem um item no banco para não coloca-lo denovo
		$sql3 = "SELECT quant FROM tb_alimento_pedido WHERE id_pedido =".$this->getIdPedido()." and id_cardapio =".$idCardapio;
		$pedido = $c->prepare($sql3);
		$pedido->execute();
		if($pedido->rowCount() != 0){
			foreach($pedido as $carregaQuant){$quantBD = $carregaQuant["quant"];}
			$quantidade = $quant + $quantBD;
			$sql4 = "UPDATE tb_alimento_pedido SET quant = ".$quantidade." WHERE id_cardapio =".$idCardapio;
			$pedido = $c->prepare($sql4);
			$pedido->execute();
		}else{
			$sql5 = "INSERT INTO tb_alimento_pedido SET id_pedido = ".$this->getIdPedido().", id_cardapio = ".$idCardapio.", quant = ". $quant.", situacao = 1";
			$pedido = $c->prepare($sql5);
			$pedido->execute();
		}
		return true;
	}

	public function pegarSubtotal(){
		$sql = "SELECT subtotal FROM tb_pedido WHERE id_pedido =".$this->getIdPedido();
		$conexao = new Conexao;
		$c = $conexao->conexaoPDO();
		$subtotal = $c->prepare($sql);
		$subtotal->execute();
		foreach($subtotal as $carregaSubtotal){
			$subtotal = $carregaSubtotal["subtotal"];
		}
		return $subtotal;
	}
	
	public function editarPedido($idCardapio, $quant){
		// Pegar o pedido
		$sql1= "SELECT tb_cardapio.valor_unitario, tb_alimento_pedido.quant, tb_alimento_pedido.id_pedido
				FROM tb_cardapio INNER JOIN tb_alimento_pedido ON tb_cardapio.id_cardapio = tb_alimento_pedido.id_cardapio
				WHERE tb_alimento_pedido.id_cardapio =".$idCardapio." and tb_alimento_pedido.id_pedido =".$this->getIdPedido();
		$conexao = new Conexao;
		$c = $conexao->conexaoPDO();
		$retirarValor = $c->prepare($sql1);
		$retirarValor->execute();
		foreach($retirarValor as $v){
			$valor = $v["valor_unitario"];
			$quantAtual = $v["quant"];
		}
		$sql2 = "UPDATE tb_pedido SET subtotal = (subtotal - ".$valor * $quantAtual.") + ".$valor * $quant." WHERE id_pedido =".$this->getIdPedido();
		$attValor = $c->prepare($sql2);
		$attValor->execute();

		$sql3 = "UPDATE tb_alimento_pedido SET quant = ".$quant." WHERE id_pedido =".$this->getIdPedido()." and id_cardapio =".$idCardapio;
		$attValor = $c->prepare($sql3);
		$attValor->execute();
	}
	
	public function excluirPedido($idCardapio){
		// Pegar o pedido
		$sql1= "SELECT tb_cardapio.valor_unitario, tb_alimento_pedido.quant 
				FROM tb_cardapio INNER JOIN tb_alimento_pedido ON tb_cardapio.id_cardapio = tb_alimento_pedido.id_cardapio
				WHERE tb_alimento_pedido.id_cardapio =".$idCardapio." and tb_alimento_pedido.id_pedido =".$this->getIdPedido();
		$conexao = new Conexao;
		$c = $conexao->conexaoPDO();
		$retirarValor = $c->prepare($sql1);
		$retirarValor->execute();
		foreach($retirarValor as $v){
			$valor = $v["valor_unitario"];
			$quant = $v["quant"];
		}
		// Diminuir subtotal
		$sql2 = "UPDATE tb_pedido SET subtotal = subtotal - ".$valor * $quant." WHERE id_pedido =".$this->getIdPedido();
		$attValor = $c->prepare($sql2);
		$attValor->execute();

		// Deletar item do pedido
		$sql3 = "DELETE FROM tb_alimento_pedido WHERE id_cardapio =".$idCardapio." and id_pedido = ".$this->getIdPedido();
		$conexao = new Conexao;
		$c = $conexao->conexaoPDO();
		$pedidoExcluir = $c->prepare($sql3);
		$pedidoExcluir->execute();
	}
	
	public function enviarPedido(){
		$sql1 = "SELECT count(*) AS total FROM tb_alimento_pedido WHERE id_pedido =".$this->getIdPedido()." and situacao = 1";
		$conexao = new Conexao;
		$con = $conexao->conexaoPDO();
		$quantPedidos = $con->prepare($sql1);
		$quantPedidos->execute();
		foreach($quantPedidos as $qp){}
		
		if($qp["total"] == 0)
			return false;

		date_default_timezone_set('America/Sao_Paulo');
		$hora = date("h:i");
		$sql2 = "UPDATE tb_alimento_pedido SET situacao = 2, hora_envio = '$hora' WHERE id_pedido =".$this->getIdPedido();
		$enviar = $con->prepare($sql2);
		$enviar->execute();

		return true;
	}

	public function getIdPedido(){
		return $this->idPedido;
	}
	public function setIdPedido($idPedido){
		$this->idPedido = $idPedido;
	}

}
