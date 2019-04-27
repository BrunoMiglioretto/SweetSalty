<?php

class Cozinheiro extends Funcionario{
    
    public function visualizarPedidos(){
        $queryPedidos = "SELECT * FROM tb_alimento_pedido INNER JOIN tb_cardapio 
        ON tb_alimento_pedido.id_cardapio = tb_cardapio.id_cardapio WHERE situacao = 2 ORDER BY hora_envio";
        $conexao = new Conexao;
        $con = $conexao->conexaoPDO();
        $pedidos = $con->prepare($queryPedidos);
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
