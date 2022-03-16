<?php
	if( ! ini_get('date.timezone') )
    {
        date_default_timezone_set('GMT');
    }
	include('header.php');
	include('sliding.php');
	include('totalbazarproductindex.php');
	include('hotdeals.php');
	include('offer.php');
	include('spicesindex.php');
	include('dryfruitindex.php');
	include('herbsindex.php');
	include('spicesherbsindex.php');
    include('othersindex.php');
    include('othercatindex.php');
	include('howtoorder.php');
	include('footer.php');
	
?>

<style>
    
    html, body {
        width: auto!important; overflow-x: hidden!important;
        min-width: 392px;
    }
    
	.top-right {
    position: absolute;
    top: 37px;
    right: 23px;
}


</style>









