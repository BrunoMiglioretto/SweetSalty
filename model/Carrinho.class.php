<?php

class Carrinho{
	
	private $cliente;	
	private $pedidos;
	
	public function visualizarPedidos(){
	
			
	}
	
	public function colocarPedido($idCardapio){
		
	}
	
	public function editarPedido($idCardapio){
		
	}
	
	public function excluirPedido($idCardapio){
		
	}
	
	public function enviarPedido(){
		
	}
	
	public function getCliente(){
		return $this->cliente;
	}
	
	public function getPedidos(){
		return $this->pedidos;
	}
	
	public function setCliente(Cliente $cliente){
		$this->cliente = $cliente;
	}
	
	public function setPedidos($pedidos){
		$this->pedidos = $pedidos;
	}
}
