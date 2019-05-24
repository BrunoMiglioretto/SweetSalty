<?php

class Grafico {

    public function capturarDadosGraficosPizzaProdutos($conjunto, $dataComeco) {
        $conexao = new Conexao;
        $con = $conexao->conexaoPDO();
    
        if($conjunto == "categorias") {
            $queryDados = "SELECT tb_cardapio_cat.nome_cardapio_cat, SUM(quant) AS quantidade  
                FROM tb_historico_alimento_pedido INNER JOIN tb_cardapio 
                ON tb_historico_alimento_pedido.id_cardapio = tb_cardapio.id_cardapio INNER JOIN tb_cardapio_subcat
                ON tb_cardapio.id_cardapio_subcat = tb_cardapio_subcat.id_cardapio_subcat INNER JOIN tb_cardapio_cat
                ON tb_cardapio_subcat.id_cardapio_cat = tb_cardapio_cat.id_cardapio_cat INNER JOIN tb_historico_pedido
                ON tb_historico_pedido.id_historico_pedido = tb_historico_alimento_pedido.id_historico_pedido
                WHERE date_historico > '$dataComeco'
                GROUP BY tb_cardapio_cat.id_cardapio_cat";
        }

        else{
            $queryDados = "SELECT tb_cardapio_subcat.nome_cardapio_subcat, SUM(quant) AS quantidade  
                FROM tb_historico_alimento_pedido INNER JOIN tb_cardapio 
                ON tb_historico_alimento_pedido.id_cardapio = tb_cardapio.id_cardapio INNER JOIN tb_cardapio_subcat
                ON tb_cardapio.id_cardapio_subcat = tb_cardapio_subcat.id_cardapio_subcat INNER JOIN tb_cardapio_cat
                ON tb_cardapio_subcat.id_cardapio_cat = tb_cardapio_cat.id_cardapio_cat INNER JOIN tb_historico_pedido
                ON tb_historico_pedido.id_historico_pedido = tb_historico_alimento_pedido.id_historico_pedido
                WHERE tb_cardapio_cat.nome_cardapio_cat = '$conjunto' AND date_historico > '$dataComeco'
                GROUP BY tb_cardapio_subcat.id_cardapio_subcat";
        }

        $dados = $con->prepare($queryDados);
        $dados->execute();

        return $dados;
    }

    public function capturarDadosGraficosPizzaClientesCadastro() {
        $conexao = new Conexao;
        $con = $conexao->conexaoPDO();
        
        $queryCadastros = "SELECT sexo, count(sexo) AS quantidade FROM tb_cliente GROUP BY sexo";
        $cadastros = $con->prepare($queryCadastros);
        $cadastros->execute();

        return $cadastros;
    }

    public function capturarDadosGraficosPizzaClientesFaixaEtaria($faixa) {
        $dataMinima = new DateTime();
        $dataMaxina = new DateTime();
        
        if($faixa == "anos1020"){
            $faixaMinima = $dataMinima->modify('-10 year');
            $faixaMaxima = $dataMaxina->modify('-20 year');
        }else if($faixa == "anos2030") {
            $faixaMinima = $dataMinima->modify('-20 year');
            $faixaMaxima = $dataMaxina->modify('-30 year');
        }else if($faixa == "anos3040") {
            $faixaMinima = $dataMinima->modify('-30 year');
            $faixaMaxima = $dataMaxina->modify('-40 year');
        }else if($faixa == "anosMais40") {
            $faixaMinima = $dataMinima->modify('-40 year');
            $faixaMaxima = $dataMaxina->modify('-120 year');
        }

        $minima = $faixaMinima->format('Y-m-d');
        $maxima = $faixaMaxima->format('Y-m-d');

        $conexao = new Conexao;
        $con = $conexao->conexaoPDO();

        $queryCadastros = "SELECT sexo, count(sexo) AS quantidade FROM tb_cliente WHERE data_nascimento > '$maxima' AND data_nascimento < '$minima' GROUP BY sexo";
        $cadastros = $con->prepare($queryCadastros);
        $cadastros->execute();

        return $cadastros;
    }

    public function capturarDadosGraficosColunasProdutos($listaItens, $dataComeco) {
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

        $queryGraficoColuna = "SELECT tb_historico_alimento_pedido.id_cardapio, tb_cardapio.nome, 
        SUM(CASE WHEN date_historico > '$dataComeco' THEN quant ELSE 0 END) AS quantidade  
            FROM tb_historico_alimento_pedido INNER JOIN tb_cardapio ON
            tb_historico_alimento_pedido.id_cardapio = tb_cardapio.id_cardapio INNER JOIN tb_historico_pedido ON
            tb_historico_alimento_pedido.id_historico_pedido = tb_historico_pedido.id_historico_pedido
            WHERE $itensString
            GROUP BY tb_historico_alimento_pedido.id_cardapio";
        
       
        $graficoColuna = $con->prepare($queryGraficoColuna);
        $graficoColuna->execute();

        return $graficoColuna;
    }

}
