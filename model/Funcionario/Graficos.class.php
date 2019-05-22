<?php

class Grafico {

    public function capturarDadosGraficosPizza($listaItens, $dataComeco) {
        $conexao = new Conexao;
        $con = $conexao->conexaoPDO();
        
        $itensString = "";
        
        foreach($listaItens as $key => $item) {

            if(isset($listaItens[$key + 1]))
                $parteComando = "tb_historico_alimento_pedido.id_cardapio = $item OR ";
            else
                $parteComando = "tb_historico_alimento_pedido.id_cardapio = $item";

            $itensString = $itensString.$parteComando;
        }

        $queryGraficoPizza = "SELECT tb_historico_alimento_pedido.id_cardapio, tb_cardapio.nome, SUM(quant) AS quantidade  
            FROM tb_historico_alimento_pedido INNER JOIN tb_cardapio ON
            tb_historico_alimento_pedido.id_cardapio = tb_cardapio.id_cardapio
            WHERE $itensString 
            GROUP BY tb_historico_alimento_pedido.id_cardapio";
       
        $graficoPizza = $con->prepare($queryGraficoPizza);
        $graficoPizza->execute();

        return $graficoPizza;
    }

}
