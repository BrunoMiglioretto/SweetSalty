<?php

abstract class Alimento{
	
	private $idAlimento;
	private $quant;
	private $nome;
	private $valorUnitario;
	
	abstract public static function visualizarAlimentos($tipo);

	public function excluirAlimento(){
		
	}
	
	public function visualizarAlimento(){
		
	}
	
	
	public function attEstoque($estoque){
		
	}
}
