
<!DOCTYPE html>
<html>

<head>
	<title>Total Bazar BD</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="/include/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="/include/css/style.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="/include/js/my.js"></script>
	<script src="/include/js/jquery.min.js"></script>
	<script src="/include/js/bootstrap.min.js"></script>
	
	<style>
  /* Note: Try to remove the following lines to see the effect of CSS positioning */
  .affix {
      top: 0;
      width: 100%;
      z-index: 9999 !important;
  }

  .affix + .container-fluid {
      padding-top: 70px;
  }
  
  </style>
  
  <script type="text/javascript">
	
	$(document).ready(function(){
    $(".dropdown").hover(            
        function() {
            $('.dropdown-menu', this).not('.in .dropdown-menu').stop(true,true).slideDown("400");
            $(this).toggleClass('open');        
        },
        function() {
            $('.dropdown-menu', this).not('.in .dropdown-menu').stop(true,true).slideUp("400");
            $(this).toggleClass('open');       
        }
    );
	});
  
  </script>
 

</head>

<body id="page-top" name="page-top" class="active">


<div class="container-fluid" style="height:75px;">
	
	<div class="row" id="headerup">
	
	<div class="col-md-2">
		<img src="../include/images/logo/logo.png" alt="Total Bazar" height="50px">	
    </div>
	
	<div class="col-md-5">		
		<div class="input-group">
			<input type="text" class="form-control" placeholder="Search" name="search">
			<div class="input-group-btn">
				<button class="btn btn-primary" type="submit"><i class="glyphicon glyphicon-search"></i></button>
			</div>
		</div>	
	</div>
   
  <div class="col-md-5">
		<div class="container-fluid">
		<div class="col-md-12">
		<div class ="row">
			<div class="col-md-5">
				<p style="color:#F0580C;font-weight: bold"><span class="glyphicon glyphicon-earphone" style="color:#10AB19;" > </span> 01977868411 </p>
			</div>
			
			<div class="col-md-3">
				<div align="center">

				 <?php
					 session_start();


					 if (isset($_SESSION['full_name'])) {
					 ?>
					   <div class="col-md-4" align="center">								
					<p style="color:#F0580C;font-weight: bold"><?php echo htmlspecialchars($_SESSION['full_name']); ?></p>
					<p style="color:#F0580C;font-weight: bold" hidden><?php echo htmlspecialchars($_SESSION['userid']); ?></p>
			</div>
			
			<div class="col-md-3" align="center">
				<a href="logout.php" style="color:#F0580C;font-weight: bold">Logout</span>
			</div>
					   
					 <?php

					 } else {
					   ?>
					   
							<a href="/totalbazar/totalbazar/php_shopping_cart/login.php" style="color:#F0580C;font-weight: bold"><p><b>Sign In </b></p></a>
					   <?php
					 }
					 ?>
					
				</div>
			</div>
			<div class="col-md-4">
				
			
			</div>
			<div class="col-md-2">
				 <a href="viewCart.php" style="color:#F0580C;font-size: 150%;font-weight: bold"><span class="glyphicon glyphicon-shopping-cart"></span></a>
			</div>
			
		</div>
		</div>
		</div>
  </div>
  
  </div>

</div>



<nav class="navbar navbar-default" data-spy="affix" data-offset-top="197" style="height: 2px;background-color: #2E89EA;font-family: sans-serif;font-size: 15px;font-weight: bold;">
	
	<div class="container-fluid">

			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>                        
				</button>
			</div>
			
				<!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse " id="myNavbar">
                		<ul class="nav navbar-nav navbar-left">
                			<li>
                				<a href="index.php" style="color: #ffffff;"><span class="glyphicon glyphicon-home"></span></a>							
                			</li>
							<li>
                				<a href="dailybazar.php" style="color: #ffffff;">Daily Bazar</a>							
                			</li>
							
							<li>
                				<a href="fastfood.php" style="color: #ffffff;">Fast Food</a>							
                			</li>
							
							<li>
                				<a href="medicine.php" style="color: #ffffff;">Medicine</a>								
                			</li>
                            
							<li>
                				<a href="books.php" style="color: #ffffff;">Books & Stationary</a>								
                			</li>
                            
							<li>
                				<a href="cosmetics.php" style="color: #ffffff;">Cosmetics</a>								
                			</li>
							
							<li>
                				<a href="#" class="dropdown-toggle" data-toggle="dropdown" style="color: #ffffff;">Electronics & Appliances</a>								
                			</li>
							
							<li>
                				<a href="household.php" style="color: #ffffff;">House Hold</a>					
                			</li>
							
							<li>
                				<a href="#" class="dropdown-toggle" data-toggle="dropdown" style="color: #ffffff;">Fashion & Beauty</a>								
                			</li>

							<li>
                				<a href="builders.php" style="color: #ffffff;">Builders</a>								
                			</li>
							
							<li>
                				<a href="sports.php"  style="color: #ffffff;">Sports</a>						
                			</li>
														
                	</div><!-- /.nav-collapse -->
			</div><!-- /.container-fluid -->
  </ul>
</nav>


