<?php

class ClienteFactory extends UsuarioFactory{
    
    public static function criarUsuario($tipo, $informacoes){
        if($tipo == 'Padrao'){
            $cp = new ClientePadrao();
            foreach($informacoes as $carrega){
                $cp->setIdUsuario($carrega["id_cadastro"]);
                $cp->setNomeCompleto($carrega["nome_completo"]);
                $cp->setEmail($carrega["email"]);
                $cp->setDdd($carrega["ddd"]);
                $cp->setNumeroTelefone($carrega["numero"]);
                $cp->setDataNascimento($carrega["data_nascimento"]);
                $cp->setSexo($carrega["sexo"]);
                $cp->setSenha($carrega["senha"]);
            }
            return $cp;
        }else if($tipo == 'GoogleFacebook'){
            $cgf = new ClienteGoogleFacebook();
            foreach($informacoes as $carrega){
                $cgf->setIdUsuario($carrega["id_cadastro"]);
                $cgf->setNomeCompleto($carrega["nome_completo"]);
                $cgf->setEmail($carrega["email"]);
                if(isset($carrega["ddd"]))
                    $cgf->setDdd($carrega["ddd"]);
                if(isset($carrega["numero"]))
                    $cgf->setNumeroTelefone($carrega["numero"]);
                if(isset($carrega["data_nascimento"]))
                    $cgf->setDataNascimento($carrega["data_nascimento"]);
                if(isset($carrega["sexo"]))
                    $cgf->setSexo($carrega["sexo"]);
            }
            return $cgf;
        }
    }
}
