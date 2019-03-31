<?php

class FuncionarioFactory extends UsuarioFactory{

    public static function criarUsuario($tipo, $informacoes){
        foreach($informacoes as $carrega){
            $funcionario = FuncionarioFactory::escolherTipo($carrega["cargo"]);
            $funcionario->setIdUsuario($carrega["id_cadastro"]);
            $funcionario->setNomeCompleto($carrega["nome_completo"]);
            $funcionario->setEmail($carrega["email"]);
            $funcionario->setDdd($carrega["ddd"]);
            $funcionario->setNumeroTelefone($carrega["numero"]);
            $funcionario->setCpf($carrega["cpf"]);
            $funcionario->setRg($carrega["rg"]);
            $funcionario->setSenha($carrega["senha"]);
        }
        return $funcionario;
    }

    private function escolherTipo($tipo){
        if($tipo == 'Gerente'){
            $f = new Gerente;
            $f->setCargo($tipo);
        }elseif($tipo == 'Garçom'){
            $f = new Garcom;
            $f->setCargo($tipo);
        }elseif($tipo == 'Cozinheiro'){
            $f = new Cozinheiro;
            $f->setCargo($tipo);
        }elseif($tipo == 'Caixa'){
            $f = new Caixa;
            $f->setCargo($tipo);
        }
        return $f;
    }
}
