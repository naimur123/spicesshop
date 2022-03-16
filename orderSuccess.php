<?php
	if( ! ini_get('date.timezone') )
    {
        date_default_timezone_set('GMT');
    }
if(!isset($_REQUEST['id'])){
    header("Location: index.php");
}
include("header.php");
?>


<style>
     
	.tkinline{
		display:inline;
	}
	
	.top-right {
    position: absolute;
    top: 37px;
    right: 23px;
}

</style>


<div class="container-fluid" align="center">
    <h1>Order Status</h1>
    <p style="color: #34a853;font-size: 18px;">Your order has been submitted successfully. </p>
	
</div>


<style type="text/css">
    .stiky-footer .navbar-toggle{
        background:green;
        color:#fff;
    }
    
</style>


<?php include('footer.php');?>
