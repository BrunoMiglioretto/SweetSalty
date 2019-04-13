<?php

class Cardapio extends Alimento{
	
	private $idCardapioSubcat;
	
	public function adicionarCardapio(){
		
	}
	
	public function manterCardapio(){
		
	}
	
	public static function visualizarAlimentos($tipo){
		$sql = "SELECT * FROM tb_cardapio INNER JOIN tb_cardapio_subcat
				ON tb_cardapio.id_cardapio_subcat = tb_cardapio_subcat.id_cardapio_subcat INNER JOIN tb_cardapio_cat
				ON tb_cardapio_subcat.id_cardapio_cat = tb_cardapio_cat.id_cardapio_cat 
				WHERE nome_cardapio_subcat = '$tipo'";
		$conexao = new Conexao;
		$con = $conexao->conexaoPDO();
		$cardapio = $con->prepare($sql);
		$cardapio->execute();
		return $cardapio;
	}
}
