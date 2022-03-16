<?php
	include('header.php');
?>

<style>
.jumbotron { 
    background-color: #f4511e; /* Orange */
    color: #ffffff;
}
</style>

<div class="container-fluid">
	
	<div class="row">
		
		<div class="col-md-3">
			<?php include('sidemenu.php'); ?>
		</div>
		
		<div class="col-md-3">
		
			<div class="jumbotron text-center">
				<h2>Daily Bazar</h2> 
				<button type="button" class="btn btn-outline-primary"><a href="request_daily_bazar.php" style="text-decoration:none"><b>Click Here</b></a> </button>
			</div>
		</div>
		
		<div class="col-md-3">
			<div class="jumbotron text-center">
				<h2>Medicine</h2> 
				<button type="button" class="btn btn-outline-primary"><a href="request_medicine.php" style="text-decoration:none"><b>Click Here</b></a></button>
			</div>
		</div>
		
		<div class="col-md-3">
			<div class="jumbotron text-center">
				<h2>Book Order</h2> 
				<button type="button" class="btn btn-outline-primary" ><a href="request_book_order.php"><b>Click Here</b></a></button>
			</div>
			
			
		
		</div>
		
	</div>

</div>




<?php
	include('footer.php');
?>