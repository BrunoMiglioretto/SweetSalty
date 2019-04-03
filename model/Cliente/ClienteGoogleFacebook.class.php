<?php

class ClienteGoogleFacebook extends Cliente{
    
    public function cadastrar($informacoes){
        foreach($informacoes as $carrega){
            $this->setEmail($carrega["email"]);
            $this->setNomeCompleto($carrega["nomeCompleto"]);
            $this->setDdd($carrega["ddd"]);
            $this->setNumeroTelefone($carrega["numero"]);
            $this->setSexo($carrega["sexo"]);
            $this->setDataNascimento($carrega["dataNascimento"]);
        }
    }
    
    public function editarPerfil($informacoes){
        $cb = new ClienteGoogleFacebook; // Cliente que irá servir de cobaia
        $cb->setEmail($informacoes[0]);
        if($cb->getEmail() == false)
            return false;
        $cb->setNomeCompleto($informacoes[1]);
        if($cb->getNomeCompleto() == false)
            return false;
        $cb->setDdd($informacoes[2]);
        if($cb->getDdd() == false)
            return false;
        $cb->setNumeroTelefone($informacoes[3]);
        if($cb->getNumeroTelefone() == false)
            return false;
        $cb->setSexo($informacoes[4]);
        if($cb->getSexo() == false)
            return false;
        $cb->setDataNascimento($informacoes[5]);
        if($cb->getDataNascimento() == false)
            return false;

        $conexao = new Conexao();
        $con = $conexao->conexao();
        
        $sql1 = "UPDATE tb_cadastro SET nome_completo = '".$cb->getNomeCompleto()."', email = '".$cb->getEmail()."' WHERE id_cadastro = ".$this->getIdUsuario();
        $cliente = $con->prepare($sql1);
        $cliente->execute();
        
        $sql2 = "UPDATE tb_cliente SET sexo = '".$cb->getSexo()."', data_nascimento = '".$cb->getDataNascimento()."' WHERE id_cadastro =".$this->getIdUsuario();
        $cliente = $con->prepare($sql2);
        $cliente->execute();
        
        $sql3 = "UPDATE tb_telefone SET ddd = ".$cb->getDdd().", numero = '".$cb->getNumeroTelefone()."' WHERE id_cadastro =".$this->getIdUsuario();
        $cliente = $con->prepare($sql3);
        $cliente->execute();

        $cb->setIdUsuario($this->getIdUsuario());

        return $cb;
    }
}
