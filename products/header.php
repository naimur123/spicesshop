
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="inlude/js/jquery.min.js"></script>
	<script src="inlude/js/bootstrap.min.js"></script>
	
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
  
  
  <style type="text/css">       
    .navbar-custom {
    background-color: #2E89EA;
    color:White;
	
	width: 100%;
	float: left;
	margin: 0 0 1em 0;
	padding: 0;
	
	border-bottom: 1px solid #ccc;
	
    }  
	
	.nav>li>a:focus, .nav>li>a:hover {
    text-decoration: none;
    background-color: #ffffff;
	}


	.navbar .nav > li > a:hover{
	color:#663399;
	}
	
    
                                        
/* Adjust dropdown Menu items (blue) text color #0080ff */
    .dropdown-menu > li > a 
    {
        background:#0080ff;
    }
	
	.pv{
		display:inline;
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

<body id="page-top" name="page-top" class="active" >

<br/>

<div class="container-fluid" style="height:70px;">
	
	<div class="row">
	
	<div class="col-sm-1" align="center">
		<img src="include/images/logo/logo.jpg" alt="Moshla Bazar" height="60px">	
    </div>
	
	
	<div class="col-sm-4" align="right">		
		<div class="input-group">
			<input type="text" class="form-control" placeholder="Search" name="search">
			<div class="input-group-btn">
				<button class="btn btn-primary" type="submit"><i class="glyphicon glyphicon-search"></i>
			</div>
		</div>	
	</div>
   
	<div class="col-sm-7" align="center">  
		
		<p class="pv" style="color:#2E89EA;font-weight: bold"><span class="glyphicon glyphicon-earphone" style="color:#F0580C;" height="40px"> </span> 01977868411 </p> &nbsp;&nbsp;
		<button type="button" class="btn btn-outline-default"><p class="pv"><a href="requestorder.php" height="40px" width="150px" style="text-decoration:none"><b>Request Item</b></a></p></button>&nbsp;&nbsp;
		<button type="button" class="btn btn-outline-default"><p class="pv"><a href="viewCart.php" height="40px" style="text-decoration:none"><img src="include/images/addtocart.png" height="20px" alt="Cart"><b>My Cart</b></a></p></button>&nbsp;&nbsp;
		<?php
					
					 if(!isset($_SESSION)) 
					{ 
						session_start(); 
					} 

					 if (isset($_SESSION['full_name'])) {
					 ?>
					   							
					<p class="pv" style="color:#2E89EA;font-weight: bold" height="40px"><?php echo htmlspecialchars($_SESSION['full_name']); ?></p>&nbsp;&nbsp;
					<p style="color:#F0580C;font-weight: bold" hidden><?php echo htmlspecialchars($_SESSION['userid']); ?></p>
					<button type="button" class="btn btn-outline-default"><p class="pv"><a href="logout.php" height="40px" style="text-decoration:none"><span class="glyphicon glyphicon-log-out"></span>&nbsp;<b>Logout</b></span></p></button>&nbsp;&nbsp;
 
					 <?php

					 } else {
					   ?>
					   
							<button type="button" class="btn btn-outline-default"><p class="pv"><a href="login.php" style="text-decoration:none" height="40px"><span class="glyphicon glyphicon-user"></span>&nbsp;<b>Sign In </b></a></button></p>&nbsp;&nbsp;
					   <?php
					 }
		?>
	
  </div>
  
</div>




<nav class="navbar navbar-default navbar-custom" data-spy="affix" data-offset-top="197" style="width:100%">   
            
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar" >
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>                        
					</button>
					<a class="navbar-brand" href="index.php"><img src="include/images/Home-button.png" height="30px" alt="Home"></a>
				</div>
				<div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav "> 
							<li>
                				<a href="dailybazar.php" style="color: #ffffff;">Moshla Bazar</a>							
                			</li>
							
							<li>
                				<a href="fastfood.php" style="color: #ffffff;">Shop</a>							
                			</li>
							
							<li>
                				<a href="medicine.php" style="color: #ffffff;">Product Categories</a>								
                			</li>
                            
							<li>
                				<a href="builders.php" style="color: #ffffff;">Contact US</a>								
                			</li>
							
							<li>
                				<a href="sports.php"  style="color: #ffffff;">About US</a>						
                			</li>
                </ul>   
				</div>
			
</nav>






