<?php

class Mesa{
    private $numeroMesa;
    private $idCliente;

    public function __construct($idCliente){
        $this->setIdCliente($idCliente);
    }

    public function definirMesa($mesaEscolhida){

        $verificado = $this->verificarMesa($mesaEscolhida);

        if(!($verificado))
            return false;
        
        $queryDefinirMesa = "UPDATE tb_mesa SET id_cadastro = ".$this->getIdCliente()." WHERE id_mesa = $mesaEscolhida";
        $conexao = new Conexao;
        $con = $conexao->conexaoPDO();
        $definirMesa = $con->prepare($queryDefinirMesa);
        $definirMesa->execute();

        $this->setNumeroMesa($mesaEscolhida);

        return true;

    }

    public function mudarMesa($mesaEscolhida){
        $verificado = $this->verificarMesa($mesaEscolhida);

        if(!($verificado))
            return false;
        
        $this->sairMesa();

        $queryMudarMesa = "UPDATE tb_mesa SET id_cadastro = ".$this->getIdCliente()." WHERE id_mesa = $mesaEscolhida";
        $conexao = new Conexao;
        $con = $conexao->conexaoPDO();
        $mudarMesa = $con->prepare($queryMudarMesa);
        $mudarMesa->execute();

        $this->setNumeroMesa($mesaEscolhida);

        return true;
    }

    public function verificarMesa($mesaEscolhida){
        // Verifica se a mesa está ocupada
        $queryVerificarMesa = "SELECT count(*) AS mesaLivre FROM tb_mesa WHERE id_mesa = $mesaEscolhida and id_cadastro != ".$this->getIdCliente();
        $conexao = new Conexao;
        $con = $conexao->conexaoPDO();
        $verificarMesa = $con->prepare($queryVerificarMesa);
        $verificarMesa->execute();

        foreach($verificarMesa as $estadoMesa){}

        return $estadoMesa["mesaLivre"] == 0;
    }

    public function sairMesa(){

        $queryRetirarRegistro = "UPDATE tb_mesa SET id_cadastro = null WHERE id_mesa =".$this->getNumeroMesa();
        $conexao = new Conexao;
        $con = $conexao->conexaoPDO();
        $retirarRegistro = $con->prepare($queryRetirarRegistro);
        $retirarRegistro->execute();
    }

    public function getNumeroMesa(){
        return $this->numeroMesa;
    }

    public function getIdCliente(){
        return $this->idCliente;
    }

    public function setNumeroMesa($numeroMesa){
        $this->numeroMesa = $numeroMesa;
    }

    public function setIdCliente($idCliente){
        $this->idCliente = $idCliente;
    }
}
