<?php
    abstract class UsuarioFactory{
        private $usuario;

        abstract public static function criarUsuario($tipo, $informacoes);

        public function getUsuario($usuario){
            return $usuario;
        }
    }
?>