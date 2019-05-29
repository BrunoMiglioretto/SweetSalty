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

    public function capturarDadosGraficosLinhaProdutos($listaItens) {
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

        $query = "SELECT nome, date_historico, SUM(quant) AS quant FROM tb_historico_pedido INNER JOIN tb_historico_alimento_pedido
            ON tb_historico_pedido.id_historico_pedido = tb_historico_alimento_pedido.id_historico_pedido INNER JOIN tb_cardapio
            ON tb_cardapio.id_cardapio = tb_historico_alimento_pedido.id_cardapio
            WHERE $itensString
            GROUP BY date_historico, tb_historico_alimento_pedido.id_cardapio
            HAVING (date_historico MOD 7) = 0";

        $dados = $con->prepare($query);
        $dados->execute();
        return $dados;

    }

    public function boot() {
        $conexao = new Conexao;
        $con = $conexao->conexaoPDO();
        
        // $data = new DateTime('2019-01-01');
        
        // for($i = 0; $i < 170; $i++) {
        //     $data->modify('+1 day');
        //     $query = "INSERT INTO tb_historico_pedido SET id_cadastro = 164, date_historico = '".$data->format('Y-m-d')."', hora = '', mesa = 4";
        //     $cadastro = $con->prepare($query);
        //     $cadastro->execute();
        // }
        

        $query = "SELECT id_cardapio FROM tb_cardapio";
        $cardapio = $con->prepare($query);
        $cardapio->execute();

        $itens = array(0 => 91,
                    1 => 95,
                    2 => 100,
                    3 => 101,
                    4 => 102,
                    5 => 104,
                    6 => 105,
                    7 => 107,
                    8 => 108,
                    9 => 109,
                    10 => 112,
                    11 => 113,
                    12 => 114,
                    13 => 116,
                    14 => 117,
                    15 => 119,
                    16 => 89,
                    17 => 90,
                    18 => 121,
                    19 => 122,
                    20 => 123,
                    21 => 147,
                    22 => 162,
                    23 => 154,
                    24 => 155,
                    25 => 156,
                    26 => 81,
                    27 => 164,
                    28 => 165,
                    29 => 166,
                    30 => 158,
                    31 => 159,
                    32 => 160,
                    33 => 161
        );

        ini_set('max_execution_time', 300);

        for($i = 15; $i < 145; $i++) {
            foreach($itens as $item){
                $quantRandomico = rand("1","300");
                $query = "INSERT INTO tb_historico_alimento_pedido SET id_historico_pedido = $i, id_cardapio = $item, quant = $quantRandomico";
                $pedido = $con->prepare($query);
                $pedido->execute();
            }
        }

    }

}
