<?php

class Garcom extends Funcionario{

    public function visualizarPedidos(){
        $queryPedidos = "SELECT * FROM tb_alimento_pedido INNER JOIN tb_cardapio 
        ON tb_alimento_pedido.id_cardapio = tb_cardapio.id_cardapio INNER JOIN tb_pedido
        ON tb_alimento_pedido.id_pedido = tb_pedido.id_pedido INNER JOIN tb_cadastro
        ON tb_cadastro.id_cadastro = tb_pedido.id_cadastro INNER JOIN tb_mesa
        ON tb_mesa.id_cadastro = tb_cadastro.id_cadastro 
        WHERE tb_alimento_pedido.situacao = 3 ORDER BY hora_envio";
        $conexao = new Conexao;
        $con = $conexao->conexaoPDO();
        $pedidos = $con->prepare($queryPedidos);
        $pedidos->execute();

        return $pedidos;
    }

    public function marcarPedidoEntregue($idPedido, $idCardapio){
        $queryAttSituacao = "UPDATE tb_alimento_pedido SET situacao = 4 WHERE id_cardapio = $idCardapio AND id_pedido = $idPedido";
        $conexao = new Conexao;
        $con = $conexao->conexaoPDO();
        $attSituacao = $con->prepare($queryAttSituacao);
        $attSituacao->execute();
    }
}
