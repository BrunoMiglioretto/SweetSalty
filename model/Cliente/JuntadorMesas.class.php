<?php

class JuntadorMesas{
    private $numeroMesaSolicitante;
    private $idClienteSolicitante;
    private $numeroMesaSolicitada;
    private $idClienteSolicitado;

    public function verificarSolicitacao($numeroMesaAtual){
        $queryVerificarSeTemSolicitacao = "SELECT count(*) AS tem FROM tb_solicitacao_mesa WHERE id_mesa_solicitada = $numeroMesaAtual OR id_mesa_solicitante = $numeroMesaAtual";
        $conexao = new Conexao;
        $con = $conexao->conexaoPDO();
        $verificarSeTemSolicitacao = $con->prepare($queryVerificarSeTemSolicitacao);
        $verificarSeTemSolicitacao->execute();

        foreach($verificarSeTemSolicitacao as $solicitado) {}

        if($solicitado["tem"] == 0)
            return 1;
        
        $queryStatusSolicitacao = "SELECT `status` FROM tb_solicitacao_mesa WHERE id_mesa_solicitante = $numeroMesaAtual OR id_mesa_solicitada = $numeroMesaAtual";
        $statusSolicitacao = $con->prepare($queryStatusSolicitacao);
        $statusSolicitacao->execute();

        foreach($statusSolicitacao as $status){}

        if($status["status"] == 0){
            
            $querySolicitacaoEmEspera = "SELECT count(*) AS esperaDeAceitacao FROM tb_solicitacao_mesa WHERE id_mesa_solicitante = $numeroMesaAtual";
            $solicitacaoEmEspera = $con->prepare($querySolicitacaoEmEspera);
            $solicitacaoEmEspera->execute();

            foreach($solicitacaoEmEspera as $emEspera) {}

            if($emEspera["esperaDeAceitacao"] == 1)
                return 3;
            else{
                $this->atribuirValores($numeroMesaAtual);
                return 2;
            }
        }
        else 
            return 4;
    }

    public function validarSolicitacao($mesaEscolhida, $mesaAtual, $idPedido){
        $queryExistenciaMesa = "SELECT count(*) AS existe FROM tb_mesa WHERE id_mesa = $mesaEscolhida and id_cadastro IS NOT null";
        $conexao = new Conexao;
        $con = $conexao->conexaoPDO();
        $existenciaMesa = $con->prepare($queryExistenciaMesa);
        $existenciaMesa->execute();

        foreach($existenciaMesa as $existe){}

        if($existe["existe"] == 0)
            return 1;

        $queryExistenciaOutraSolicitacao = "SELECT count(*) AS tem FROM tb_solicitacao_mesa WHERE id_mesa_solicitada = $mesaEscolhida";
        $existenciaOutraSolicitacao = $con->prepare($queryExistenciaOutraSolicitacao);
        $existenciaOutraSolicitacao->execute();

        foreach($existenciaOutraSolicitacao as $outraSolicitacao){}

        if($outraSolicitacao["tem"] == 1)
            return 2;

        $queryClienteSolicitado = "SELECT id_cadastro FROM tb_mesa WHERE id_mesa = $mesaEscolhida";
        $clienteSolicitado = $con->prepare($queryClienteSolicitado);
        $clienteSolicitado->execute();

        foreach($clienteSolicitado as $idSolicitado){
            $idClienteSolicitado = $idSolicitado["id_cadastro"];
        }

        $queryIdPedidoSolicitado = "SELECT id_pedido FROM tb_pedido WHERE id_cadastro = $idClienteSolicitado";
        $idPedidoSolicitado = $con->prepare($queryIdPedidoSolicitado);
        $idPedidoSolicitado->execute();

        foreach($idPedidoSolicitado as $pedidoSolicitado){}

        $queryPedidosEnviados = "SELECT count(*) AS pedidosEnviados FROM tb_alimento_pedido WHERE (id_pedido = $idPedido OR id_pedido = ".$pedidoSolicitado["id_pedido"].") and situacao > 1";
        $pedidosEnviados = $con->prepare($queryPedidosEnviados);
        $pedidosEnviados->execute();

        foreach($pedidosEnviados as $quant){
            $quantProdutosEnviados = $quant["pedidosEnviados"];
        }

        if($quantProdutosEnviados > 0)
            return 3;
        
        $this->setNumeroMesaSolicitada($mesaEscolhida);
        $this->setNumeroMesaSolicitante($mesaAtual);
        $this->solicitarJuncao();
        $this->atribuirValores($mesaAtual);

        return 4;
    }

    private function solicitarJuncao(){
        $queryInserirSolicitacao = "INSERT INTO tb_solicitacao_mesa SET id_mesa_solicitante = ".$this->getNumeroMesaSolicitante().",
                                                                        id_mesa_solicitada = ".$this->getNumeroMesaSolicitada().",
                                                                        status = 0";
        $conexao = new Conexao;
        $con = $conexao->conexaoPDO();
        $inserirSolicitacao = $con->prepare($queryInserirSolicitacao);
        $inserirSolicitacao->execute();
    }

    public function pegarSolicitacao(){
        $queryPegarSolicitacao = "SELECT * FROM tb_solicitacao_mesa INNER JOIN tb_mesa
                ON tb_solicitacao_mesa.id_mesa_solicitante = tb_mesa.id_mesa INNER JOIN tb_cadastro 
                ON tb_mesa.id_cadastro = tb_cadastro.id_cadastro
                WHERE tb_mesa.id_mesa = ".$this->getNumeroMesaSolicitante();
        $conexao = new Conexao;
        $con = $conexao->conexaoPDO();
        $pegarSolicitacao = $con->prepare($queryPegarSolicitacao);
        $pegarSolicitacao->execute();
        return $pegarSolicitacao;
    }

    private function atribuirValores($numeroMesaAtual){
        $queryDadosSolicitacao = "SELECT * FROM tb_solicitacao_mesa WHERE id_mesa_solicitante = $numeroMesaAtual OR id_mesa_solicitada = $numeroMesaAtual";
        $conexao = new Conexao;
        $con = $conexao->conexaoPDO();
        $dadosSolicitacao = $con->prepare($queryDadosSolicitacao);
        $dadosSolicitacao->execute();

        foreach($dadosSolicitacao as $dados){
            $numeroMesaSolicitante = $dados["id_mesa_solicitante"];
            $numeroMesaSolicitada = $dados["id_mesa_solicitada"];
        }

        $this->setNumeroMesaSolicitante($numeroMesaSolicitante);
        $this->setNumeroMesaSolicitada($numeroMesaSolicitada);

        $queryClienteSolicitante = "SELECT id_cadastro FROM tb_mesa INNER JOIN tb_solicitacao_mesa ON tb_mesa.id_mesa = tb_solicitacao_mesa.id_mesa_solicitante WHERE id_mesa = $numeroMesaSolicitante";
        $clienteSolicitante = $con->prepare($queryClienteSolicitante);
        $clienteSolicitante->execute();

        foreach($clienteSolicitante as $idSolicitante){}

        $this->setIdClienteSolicitante($idSolicitante["id_cadastro"]);

        $queryClienteSolicitado = "SELECT id_cadastro FROM tb_mesa RIGHT JOIN tb_solicitacao_mesa ON tb_mesa.id_mesa = tb_solicitacao_mesa.id_mesa_solicitada WHERE id_mesa = $numeroMesaSolicitada";
        $clienteSolicitado = $con->prepare($queryClienteSolicitado);
        $clienteSolicitado->execute();

        foreach($clienteSolicitado as $idSolicitado){}

        $this->setIdClienteSolicitado($idSolicitado["id_cadastro"]);
    }

    public function cancelarSolicitacao(){
        $queryCancelar = "DELETE FROM tb_solicitacao_mesa WHERE id_mesa_solicitante = ".$this->getNumeroMesaSolicitante();
        $conexao = new Conexao;
        $con = $conexao->conexaoPDO();
        $cancelar = $con->prepare($queryCancelar);
        $cancelar->execute();
    }

    public function juntarMesas(){
        $queryAttStatus = "UPDATE tb_solicitacao_mesa SET `status` = 1 WHERE id_mesa_solicitada = ".$this->getNumeroMesaSolicitada();
        $conexao = new Conexao;
        $con = $conexao->conexaoPDO();
        $attStatus = $con->prepare($queryAttStatus);
        $attStatus->execute();

        return $this->juntarPedidos();
    }

    private function juntarPedidos(){
        $queryPegarIdPedidoSolicitante = "SELECT id_pedido FROM tb_pedido WHERE id_cadastro = ".$this->getidClienteSolicitante();
        $conexao = new Conexao;
        $con = $conexao->conexaoPDO();
        $PegarIdPedidoSolicitante = $con->prepare($queryPegarIdPedidoSolicitante);
        $PegarIdPedidoSolicitante->execute();

        foreach($PegarIdPedidoSolicitante as $idPedido) {
            $idPedidoSolicitante = $idPedido["id_pedido"];
        }
        
        $queryItensClienteSolicitante = "SELECT * FROM tb_alimento_pedido WHERE id_pedido = $idPedidoSolicitante";
        $itensClienteSolicitante = $con->prepare($queryItensClienteSolicitante);
        $itensClienteSolicitante->execute();

        $queryPegarIdPedidoSolicitado = "SELECT id_pedido FROM tb_pedido WHERE id_cadastro = ".$this->getidClienteSolicitado();
        $conexao = new Conexao;
        $con = $conexao->conexaoPDO();
        $PegarIdPedidoSolicitado = $con->prepare($queryPegarIdPedidoSolicitado);
        $PegarIdPedidoSolicitado->execute();

        foreach($PegarIdPedidoSolicitado as $idPedido) {
            $idPedidoSolicitado = $idPedido["id_pedido"];
        }

        $queryItensClienteSolicitado = "SELECT * FROM tb_alimento_pedido WHERE id_pedido = $idPedidoSolicitado";
        $itensClienteSolicitado = $con->prepare($queryItensClienteSolicitado);
        $itensClienteSolicitado->execute();

        if($itensClienteSolicitado->rowCount() != 0){
            foreach($itensClienteSolicitado as $itens) {
                $queryVerificarItem = "SELECT * FROM tb_alimento_pedido WHERE id_cardapio = ".$itens["id_cardapio"]." AND id_pedido = $idPedidoSolicitante";
                $verificarItem = $con->prepare($queryVerificarItem);
                $verificarItem->execute();
                
                if($verificarItem->rowCount() == 1){
                    foreach($queryVerificarItem as $itemSolicitante) {}
                    foreach($verificarItem as $juntarItem) {}

                    $novaQuant = $itemSolicitante["quant"] + $juntarItem["quant"];

                    $queryAttQuant = "UPDATE tb_alimento_pedido SET quant = $novaQuant WHERE id_cardapio = ".$itens["id_cardapio"]." AND id_pedido = $idPedidoSolicitante";
                    $attQuant = $con->prepare($queryAttQuant);
                    $attQuant->execute();
                }else{
                    $queryAttPedido = "UPDATE tb_alimento_pedido SET id_pedido = $idPedidoSolicitante WHERE id_cardapio = ".$itens["id_cardapio"]." AND id_pedido = $idPedidoSolicitado";
                    $attPedido = $con->prepare($queryAttPedido);
                    $attPedido->execute();
                }
            }

            $this->refazerSubtotal($idPedidoSolicitante);
        }

        return $idPedidoSolicitante;
    
    }

    private function refazerSubtotal($idPedido){
        $subtotal = 0.00;
        
        $queryItensPedido = "SELECT id_cardapio, quant FROM tb_alimento_pedido WHERE id_pedido = $idPedido";
        $conexao = new Conexao;
        $con = $conexao->conexaoPDO();
        $itensPedido = $con->prepare($queryItensPedido);
        $itensPedido->execute();

        foreach($itensPedido as $item) {
            $queryPrecoCardapio = "SELECT valor_unitario FROM tb_cardapio WHERE id_cardapio = ".$item["id_cardapio"];
            $precoCardapio = $con->prepare($queryPrecoCardapio);
            $precoCardapio->execute();

            foreach($precoCardapio as $preco) {
                $subtotal += $preco["valor_unitario"] * $item["quant"];
            }
        }

        $queryAttSubtotal = "UPDATE tb_pedido SET subtotal = $subtotal WHERE id_pedido = $idPedido";
        $attSubtotal = $con->prepare($queryAttSubtotal);
        $attSubtotal->execute();
    }

    public function getNumeroMesaSolicitante(){
        return $this->numeroMesaSolicitante;
    }

    public function getidClienteSolicitante(){
        return $this->idClienteSolicitante;
    }

    public function getNumeroMesaSolicitada(){
        return $this->numeroMesaSolicitada;
    }

    public function getIdClienteSolicitado(){
        return $this->idClienteSolicitado;
    }

    public function setNumeroMesaSolicitante($numeroMesaSolicitante){
        $this->numeroMesaSolicitante = $numeroMesaSolicitante;
    }

    public function setIdClienteSolicitante($idClienteSolicitante){
        $this->idClienteSolicitante = $idClienteSolicitante;
    }
    
    public function setNumeroMesaSolicitada($numeroMesaSolicitada){
        $this->numeroMesaSolicitada = $numeroMesaSolicitada;
    }

    public function setIdClienteSolicitado($idClienteSolicitado){
        $this->idClienteSolicitado = $idClienteSolicitado;
    }

}