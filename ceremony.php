<?php
	if( ! ini_get('date.timezone') )
    {
        date_default_timezone_set('GMT');
    }
	include("pageurl.php");
	include ('include/config/dbConfig.php');
	include("header.php");
?>

<style>

	.tkinline{
		display:inline;
	}

</style>

<div class="container-fluid">

	<div class="row">
	
	<div class="col-sm-12">
	
	<br/>
	<div class="row">
		<div class="col-md-12" align="center" style="background-color:gray">
			<h4 class="h4" style="color:#fff">Ceremony Program Item</h4>
		</div>
	</div>
	
	<br/>
	
	

	
	<br/>
	
	<br/>
	
	</div>
	
	</div>
	
</div>

<?php include('footer.php');?>