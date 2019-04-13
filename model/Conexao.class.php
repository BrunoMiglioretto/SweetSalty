<?php
    class Conexao{
        public function conexaoPDO(){
            return new PDO("mysql:host=localhost;dbname=sweets00_sistema-bd","root","");
        }
    }
?>