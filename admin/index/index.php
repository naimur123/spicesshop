<?php
	if(!ini_get('date.timezone'))
    {
        date_default_timezone_set('GMT');
    }
    if(!isset($_SESSION)) 
	{ 
		session_start(); 
	} 
    if(isset($_SESSION['email_name'])) {
		include('../header.php');
	}
	else 
	{
        include('../login.php');
	}
?>