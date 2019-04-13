<?php

abstract class Login{

    protected $email;
    
    public function verificarEmailBD(){
        $sql = "SELECT id_cadastro FROM tb_cadastro WHERE email = '$this->email'";
        $conexao = new Conexao;
        $c = $conexao->conexaoPDO();
        $cadastro = $c->prepare($sql);
        $cadastro->execute();
        $conexao = NULL;
        $nUsuarios = $cadastro->rowCount();
        return $nUsuarios == 1;
    }
    
    abstract public function verificarCadastro();
    
    protected function criarSession(Usuario $usuario){
        $_SESSION["usuario"] = serialize($usuario);
    }

    public function getEmail(){
        return $this->email;
    }
    public function setEmail($email){
        $this->email = $email;
    }
}
