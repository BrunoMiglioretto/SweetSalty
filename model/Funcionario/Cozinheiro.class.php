<?php

class Cozinheiro extends Funcionario{
    
    public function visualizarPedidos(){
        $sql = "SELECT * FROM tb_alimento_pedido WHERE situacao = 2";
        $conexao = new Conexao;
        $con = $conexao->conexaoPDO();
        $pedidos = $con->prepare($sql);
        $pedidos->execute();

        return $pedidos;
    }

    public function concluirPedido($idPedido){
        
    }

    public function concluirTodosPedido(){
        
    }

    private function baixaEstoque($idCardapio){

    } 
}
