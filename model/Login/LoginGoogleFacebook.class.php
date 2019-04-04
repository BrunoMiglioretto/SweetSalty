<?php

class LoginGoogleFacebook extends Login{

    public function __construct($email){
        $this->setEmail($email);
    }

    public function verificarCadastro(){
        $sql = "SELECT * FROM tb_cadastro INNER JOIN tb_cliente 
                ON tb_cadastro.id_cadastro = tb_cliente.id_cadastro 
                WHERE tb_cadastro.email = '$this->email'";
        $conexao = new conexao;
        $c = $conexao->conexao();
        $cliente = $c->prepare($sql);
        $cliente->execute();
        $c = NULL;
        $nCliente = $cliente->rowCount();
        if($nCliente == 1){
            $usuario = ClienteFactory::criarUsuario('GoogleFacebook', $cliente);
            $this->criarSession($usuario);
            return $usuario;
        }else{
            return false;
        }
    }
}
