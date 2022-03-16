<?php

	$DB_HOST = 'localhost';
	$DB_USER = 'spicesshop_spiceshop';
	$DB_PASS = 'Moshla@1010';
	$DB_NAME = 'spicesshop_spiceshop';
	
	try{
		$DB_con = new PDO("mysql:host={$DB_HOST};dbname={$DB_NAME}",$DB_USER,$DB_PASS);
		$DB_con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}
	catch(PDOException $e){
		echo $e->getMessage();
	}
	
?>