<?php

class Alimento{
	
	private $idAlimento;
	private $quant;
	private $nome;
	private $valorUnitario;
	
	public function excluirAlimento(){
		
	}
	
	public function visualizarAlimento(){
		
	}
	
	abstract public function visualizarAlimentos($tipo);
	
	public function attEstoque($estoque){
		
	}
}
