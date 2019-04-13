<?php

class LoginPadrao extends Login{

    private $senha;

    public function __construct($email, $senha){
        $this->setEmail($email);
        $this->setSenha($senha);
    }
    
    public function verificarSenha(){
        $sql = "SELECT tb_cadastro.id_cadastro FROM tb_cadastro INNER JOIN tb_senha 
                ON tb_cadastro.id_cadastro = tb_senha.id_cadastro 
                where email = '$this->email' and senha = '$this->senha'";
        $conexao = new Conexao;
        $c = $conexao->conexaoPDO();
        $cadastro = $c->prepare($sql);
        $cadastro->execute();
        $c = NULL;
        $nUsuarios = $cadastro->rowCount();
        return $nUsuarios == 1;
    }

    public function verificarCadastro(){
        $usuario = $this->verificarCliente();
        if($usuario == false)
            $usuario = $this->verificarFuncionario();
        $this->criarSession($usuario);
        return $usuario;
    }

    private function verificarCliente(){
        $sql = "SELECT * FROM tb_cadastro INNER JOIN tb_senha
                ON tb_cadastro.id_cadastro = tb_senha.id_cadastro INNER JOIN tb_cliente 
                ON tb_senha.id_cadastro = tb_cliente.id_cadastro INNER JOIN tb_telefone
                ON tb_cadastro.id_cadastro = tb_telefone.id_cadastro
                WHERE tb_cadastro.email = '$this->email'";
        $conexao = new conexao;
        $c = $conexao->conexaoPDO();
        $cliente = $c->prepare($sql);
        $cliente->execute();
        $c = NULL;
        $nCliente = $cliente->rowCount();
        if($nCliente == 1){
            $usuario = ClienteFactory::criarUsuario('Padrao', $cliente);
            $carrinho = new Carrinho($usuario->getIdUsuario());
            $_SESSION["carrinho"] = serialize($carrinho);
            $this->criarSession($usuario);
            return $usuario;
        }else{
            return false;
        }
    }

    private function verificarFuncionario(){
        $sql = "SELECT * FROM tb_cadastro INNER JOIN tb_senha
                ON tb_cadastro.id_cadastro = tb_senha.id_cadastro INNER JOIN tb_funcionario 
                ON tb_senha.id_cadastro = tb_funcionario.id_cadastro INNER JOIN tb_telefone
                ON tb_cadastro.id_cadastro = tb_telefone.id_cadastro
                WHERE tb_cadastro.email = '$this->email'";
        $conexao = new conexao;
        $c = $conexao->conexaoPDO();
        $funcionario = $c->prepare($sql);
        $funcionario->execute();
        $c = NULL;
        $nFuncionario = $funcionario->rowCount();
        if($nFuncionario == 1){
            $usuario = FuncionarioFactory::criarUsuario('Funcionario', $funcionario);
            $this->criarSession($usuario);
            return $usuario;
        }else{
            return false;
        }
    }

    public function getSenha(){
        return $this->senha;
    }

    public function setSenha($senha){
        $this->senha = $senha;
    }
}
