<?php

class Caixa extends Funcionario{
    
    public function visualizarPedidos(){
        $queryPagamento = "SELECT * FROM tb_pagamento INNER JOIN tb_historico_pedido
            ON tb_pagamento.id_pedido = tb_historico_pedido.id_historico_pedido INNER JOIN tb_cadastro
            ON tb_pagamento.id_cadastro = tb_cadastro.id_cadastro
            WHERE situacao_pagamento = 0";

        $conexao = new Conexao;
        $con = $conexao->conexaoPDO();
        $pagamentos = $con->prepare($queryPagamento);
        $pagamentos->execute();

        return $pagamentos;
    }

    public function finalizarPedido($idPagamento){
        $queryMarcarComoFinalizado = "UPDATE tb_pagamento SET situacao_pagamento = 1 WHERE id_pagamento = $idPagamento";
        $conexao = new Conexao;
        $con = $conexao->conexaoPDO();

        $finalizado = $con->prepare($queryMarcarComoFinalizado);
        $finalizado->execute();
    }
}
