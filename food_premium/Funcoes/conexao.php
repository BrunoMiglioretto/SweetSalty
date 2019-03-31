<?php
	try{ //tente
		$fusca=new PDO("mysql:host=localhost;dbname=sweets00_sistema-bd","sweets00_root","JMV2ba_9WsX.");
		
	} 
	catch(PDOException $e){ //Bloco correspondente ao try	
		 // verificar var_dump($e);
		// verificar método echo $e->getCode(); 
		echo $e->getMessage(); //método amplamente utilizado	
	}
?>
