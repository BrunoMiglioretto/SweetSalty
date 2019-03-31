<?php

class Cozinheiro extends Funcionario{
    
    public function visualizarPedidos(){
        return $pedidos;
    }

    public function concluirPedido($idPedido){
        return $resultado;
    }

    public function concluirTodosPedido(){
        return $resultado;
    }

    private function baixaEstoque($idCardapio){

    } 
}
