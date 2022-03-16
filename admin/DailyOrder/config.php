<?Php

 $dbhost = 'localhost';
 $dbname = 'spicesshop_spiceshop';  
 $dbuser = 'spicesshop_spiceshop';                  
 $dbpass = 'Moshla@1010';                  
 
 try{
  
  $dbcon = new PDO("mysql:host={$dbhost};dbname={$dbname}",$dbuser,$dbpass);
  $dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  
 }catch(PDOException $ex){
  
  die($ex->getMessage());
 }