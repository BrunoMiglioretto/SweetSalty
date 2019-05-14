<?php

class Gerente extends Funcionario{
    
    public function visualizarPedidos(){
        
    }
    
    public function visualizarFuncionario($idFuncionario){
        $queryFuncionario = "SELECT * FROM tb_funcionario, tb_senha, tb_telefone, tb_cadastro WHERE
        tb_funcionario.id_cadastro = tb_senha.id_cadastro AND tb_funcionario.id_cadastro = $idFuncionario AND
        tb_senha.id_cadastro = $idFuncionario AND tb_telefone.id_cadastro = tb_cadastro.id_cadastro AND tb_telefone.id_cadastro = $idFuncionario AND tb_cadastro.id_cadastro = $idFuncionario;
        ";
        $conexao = new Conexao;
        $con = $Conexao->conexaoPDO();
        $funcionario = $con->prepare($queryFuncionario);
        $funcionario->execute();
        return $funcionario;
    }
    
    public function visualizarFuncionarios(){
        $queryFuncionarios = "SELECT * FROM tb_funcionario, tb_senha, tb_cadastro, tb_telefone WHERE tb_funcionario.id_cadastro = tb_cadastro.id_cadastro AND tb_senha.id_cadastro = tb_cadastro.id_cadastro AND tb_cadastro.id_cadastro = tb_cadastro.id_cadastro AND tb_telefone.id_cadastro = tb_cadastro.id_cadastro";
        $conexao = new Conexao;
        $con = $Conexao->conexaoPDO();
        $funcionarios = $con->prepare($queryFuncionarios);
        $funcionarios->execute();
        return $funcionarios;
    }
    
    public function manterFuncionario($idFuncionario, $nomeCompleto, $email, $cargo, $cpf, $rg){

        $queryManterFuncionario = "UPDATE tb_funcionario SET tb_funcionario.cargo = $cargo and tb_funcionario.cpf = $cpf and tb_funcionario.rg = $rd FROM tb_funcionario";
        $conexao = new Conexao;
        $con = $conexao->conexaoPDO();
        $manterFuncionario = $con->prepare($queryManterFuncionario);
        $manterFuncionario->execute();
    }
    
    public function excluirFuncionario($idFuncionario){

    }
}
