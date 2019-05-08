<?php

abstract class Cliente extends Usuario{
    private $sexo;
    private $dataNascimento;

    abstract public function editarPerfil($informacoes);

    public function escolherPagamento($forma, $idPedido){
        $conexao = new Conexao;
        $con = $conexao->conexaoPDO();
        
        $queryPagamento = "INSERT INTO tb_pagamento SET 
        id_cadastro = ".$this->getIdUsuario().",
        forma_pagamento = '$forma',
        troco = 0,
        id_pedido = $idPedido,
        situacao_pagamento = 0";

        $pagamento = $con->prepare($queryPagamento);
        $pagamento->execute();
    }

    public function fecharConta($idPedido){
        $conexao = new Conexao;
        $con = $conexao->conexaoPDO();
        
        $queryVerificarExistenciaItem = "SELECT count(*) AS existe FROM tb_alimento_pedido WHERE id_pedido = $idPedido";
        $verificarExistenciaItem = $con->prepare($queryVerificarExistenciaItem);
        $verificarExistenciaItem->execute();

        foreach($verificarExistenciaItem as $existe) {}

        if($existe["existe"] == 0)
            return 0;

        $queryVerificarItensEntregues = "SELECT count(*) AS itensNaoEntregues FROM tb_alimento_pedido WHERE id_pedido = $idPedido AND situacao != 4";
        $verificarItensEntregues = $con->prepare($queryVerificarItensEntregues);
        $verificarItensEntregues->execute(); 

        foreach($verificarItensEntregues as $itens) {}

        if($itens["itensNaoEntregues"] != 0)
            return 1;
        else
            return 2;
    }

    public function definirQuantiaDinheiro($quantia, $idPedido) {
        $conexao = new Conexao;
        $con = $conexao->conexaoPDO();
        
        $queryTotal = "SELECT subtotal FROM tb_historico_pedido WHERE id_historico_pedido = $idPedido";
        $total = $con->prepare($queryTotal);
        $total->execute();

        foreach($total as $valor) {
            $subtotal = $valor["subtotal"];
        }

        if($subtotal > $quantia)
            return $subtotal;
        
        $troco = $quantia - $subtotal;

        $queryAtualizarTroco = "UPDATE tb_pagamento SET troco = $troco, situacao = 1 WHERE id_pedido = $idPedido";
        $atualizarTroco = $con->prepare($queryAtualizarTroco);
        $atualizarTroco->execute();
 
        return "true";
    } 

    public function sair(){
        
    }

    public function getSexo(){
        return $this->sexo;
    }

    public function getDataNascimento(){
        return $this->dataNascimento;
    }
    
    public function setSexo($sexo){
        $this->sexo = $sexo;
    }

    public function setDataNascimento($dataNascimento){
        $this->dataNascimento = $dataNascimento;
    }

} 
