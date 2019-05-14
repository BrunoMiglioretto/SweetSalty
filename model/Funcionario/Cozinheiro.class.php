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

    public function concluirPedido($idPedido, $idCardapio){
        $queryAttSituacao = "UPDATE tb_alimento_pedido SET situacao = 3 WHERE id_cardapio = $idCardapio AND id_pedido = $idPedido";
        $conexao = new Conexao;
        $con = $conexao->conexaoPDO();
        $attSituacao = $con->prepare($queryAttSituacao);
        $attSituacao->execute();
    }

    public function concluirTodosPedido(){
        
    }

    private function baixaEstoque($idCardapio){

    } 
}
