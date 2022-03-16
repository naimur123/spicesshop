<?php
//DB details
$dbHost = 'localhost';
$dbUsername = 'spicesshop_spiceshop';
$dbPassword = 'Moshla@1010';
$dbName = 'spicesshop_spiceshop';

//Create connection and select DB
$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

if ($db->connect_error) {
    die("Unable to connect database: " . $db->connect_error);
} 
?>