<?php
    class Conexao{
        public function conexao(){
            return new PDO("mysql:host=localhost;dbname=sweets00_sistema-bd","root","");
        }
    }
?>