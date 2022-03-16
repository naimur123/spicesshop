<?php
	if(!ini_get('date.timezone') )
    {
        date_default_timezone_set('GMT');
    }
    if(!isset($_SESSION)) 
	{ 
		session_start(); 
	} 
	require_once  'Cart.php';
	$cart = new Cart;
	if(count($cart->contents())<=0 )
	{
	$itemData = array(
				'id' => 999999,
				'name' => 'productName',
				'prdname' => 'productName',
				'price' => 999999,
				'unit' => 1,
				'qty' => 1,
			);
    $insertItem = $cart->insert($itemData);
	}
	$count_lp =0;
?>

<!DOCTYPE html>
<html>

<head>
	<title>SpicesShop.com | Buy Premium Quality Spices, Dry Fruits, Herbs & Powder</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	
	<link rel="stylesheet" href="include/css/menunavbar.css" />
	<link rel="stylesheet" href="include/css/footer.css" />
    
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
	
	<link rel="shortcut icon" href="admin/include/logoff.png" type="image/x-icon" />
	
	<meta property="og:image" content="admin/include/logoff.png">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="1024">
    <meta property="og:image:height" content="1024">
    <meta property="og:type" content="website" />
    <meta property="og:url" content="http://www.spicesshop.com/"/>
    <meta property="og:title" content="Promise For Purity" />
    <meta property="og:description" content="" />
	
<style type="text/css">

    

  /* Note: Try to remove the following lines to see the effect of CSS positioning */
  .affix {
      top: 0px;
      width: 100%;
      z-index: 9999 !important;
     
    .affix + .container-fluid {
      padding-top: 70px;
  }
  
.navbar-login-session
{
    padding: 10px;
    padding-bottom: 0px;
    padding-top: 0px;
}

.icon-size
{
    font-size: 87px;
}
.navbar-login
{
    width: 305px;
    padding: 10px;
    padding-bottom: 0px;
}

  }
  
  .icon-barview {
	padding:0px;
    margin:0px;
    position:fixed;
    right:-0px;
    top:330px;
    width: 75px;
	height: 40px;
    z-index: 1100;
	
}

.icon-barview a {
  list-style-type:none;
    
    color:#efefef;
    padding:0px;
    margin:0px 0px 1px 0px;
    -webkit-transition:all 0.25s ease-in-out;
    -moz-transition:all 0.25s ease-in-out;
    -o-transition:all 0.25s ease-in-out;
    transition:all 0.25s ease-in-out;
    cursor:pointer;
}


/* Formatting search box */
    
.result{
        position: absolute;        
        z-index: 999;
        top: 100%;
        left: 0;
    }
    .search-box input[type="text"], .result{
        width: 100%;
        box-sizing: border-box;
    }
    /* Formatting result items */
    .result p{
        margin: 0;
        padding: 7px 10px;
        border: 1px solid #CCCCCC;
        border-top: none;
        cursor: pointer;
		background-color: white;
		color:black;
		
    }
    .result p:hover{
		font-weight:bold;
        background: white;
		
		color: #ff8000;
    }
    .stiky-footer{
      	    position: fixed !important;
      	    background:#fff;
      	    padding-top:15px;
      	    padding-bottom:15px;
		   left: 0;
		   bottom: 0;
		   width: 100%;
		   text-align: center;
      	}
      	.stiky-footer .navbar-toggle{
      		padding: 0px;
			margin: 0px;
      	}
      	
    #place-order-btn-show{
        display:none;
    }
	
  </style>



<script type="text/javascript">
		function validateForm() {
    var searchvalue = document.forms["myformsearchvalue"]["query"].value;
   	
    if (searchvalue == "") {
        alert("Please insert your search item name");
        return false;
    }
}
</script>


<script type="text/javascript">
    function validateFormMobile(){
    var searchvalue = document.forms["myformsearchvaluemob"]["query"].value;
   	
    if (searchvalue == "") {
        alert("Please insert your search item name mobile");
        return false;
    }
}
    
</script>

<script type="text/javascript">
$(document).ready(function(){
    $('.search-box input[type="text"]').on("keyup input", function(){
        /* Get input value on change */
        var inputVal = $(this).val();
        var resultDropdown = $(this).siblings(".result");
        if(inputVal.length){
            $.get("backend-search.php", {term: inputVal}).done(function(data){
                // Display the returned data in browser
                resultDropdown.html(data);
            });
        } else{
            resultDropdown.empty();
        }
    });
    
    // Set search input value on click of result item
    $(document).on("click", ".result p", function(){
        $(this).parents(".search-box").find('input[type="text"]').val($(this).text());
        $(this).parent(".result").empty();
    });
});
</script>

</head>

<body style="width:100%;overflow-x: hidden;">

<div class="icon-barview hidden-xs" >
  <a href="viewCart.php" style="text-decoration:none;color:#fff">
		<div align="center" ><img src="bag.png" alt="My Bag" style="width:35px;height:40px;"></div>
		<div style="background-color:red" align="center">
			<p class="pv" id="itemcountnumber"> <b>
			(<?php if($cart->total_items() > 0){
				//get cart items from session
				$cartItems = $cart->contents();
				$prvId = null;
				$count = 0;
				$totat_cart_items = 0;
				foreach($cartItems as $item)
				{	
					if($prvId != $item["id"])
					{						
						if($item["id"] != 999999){
							$count++;
							$prvId = $item["id"];
						}
					}
					$totat_cart_items += $item["qty"]; 
				}
				echo '<p class="pv" id="cart_item">'. $count.'</p>' ;
			}?>)</b> ITEMS</a></p>
		</div> 
		
</div>



<div class="container-fluid" style="height:80px;padding:5px" !important>
	
	
	
	<div class="row" >
	
	<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3" align="center">
	    <div class="hidden-xs col-xs-7 col-md-12">
	        	<a href="index.php"><img src="admin/include/logof.png" alt="Spices Shop"  class="img-responsive"></a>
	    </div>
	    
		
    </div>
	
	<div class="col-lg-7 col-md-7 col-sm-7 hidden-xs" style="padding-top:25px;">
			<form action="search.php" name="myformsearchvalue" method="GET" onsubmit="return validateForm()">
		<div class="input-group" style="border: 3px solid #ff8000;padding:0px;">
      <div class="search-box">
			<input type="text" class="form-control input-md" style="color:green;font-weight:bold;font-family:Courier;" placeholder="Search Your Items"  type="text" name="query">
			<div class="result" align="left"></div>
		</div>
      <div class="input-group-btn">
        <button class="btn btn-block btn-md" type="submit" style="background-color:#fff;color:gray;"  value="Search"><i class="glyphicon glyphicon-search"></i></button>
      </div>
    </div>
		</form>
		</div>
	
	<div class="col-lg-2 col-md-2 col-sm-2  hidden-xs" align="center" style="padding-top:27px;"> 		

		<?php
					 if(!isset($_SESSION)) 
					{ 
						session_start(); 
					} 
					 if (isset($_SESSION['full_name'])) {
					 ?>
					 
			<div class="pull-right" height="40px">
                <ul class="nav pull-right">
                    <li class="dropdown" ><button class="btn btn-default pv"><a style="text-decoration:none;" href="#" class="dropdown-toggle pv" data-toggle="dropdown"><b>Welcome, User </b><b class="caret"></b></a></button>&nbsp;&nbsp;
                        <ul class="dropdown-menu" style="padding:20px">
                            <li><b><p><?php echo htmlspecialchars($_SESSION['full_name']); ?></p></b></li>
                            <li><b><p hidden><?php echo htmlspecialchars($_SESSION['userid']); ?></p></b></li>
							<li><b><p><a href="myinfo.php" style="text-decoration:none;">My Information</a></p></b></li>
							<li><b><p><a href="orderHistory.php" style="text-decoration:none;">My Order</a></p></b></li>
                            <li class="divider"></li>
                            <li><p><a href="logout.php" style="text-decoration:none;"><span class="glyphicon glyphicon-log-out" ></span><b>&nbsp; Logout</b></span></a></p></li>
                        </ul>
                    </li>
                </ul>
	
              </div>

					 <?php

					 } else {
					   ?>
							<button type="button" style="background-color:#08B066" class="btn btn-outline-default btn-md"><p class="pv" ><a href="login.php" style="text-decoration:none;color:white"><span class="glyphicon glyphicon-user" style="color:white;font-weight: bold;"></span>&nbsp;<b> Sign In </b></a></button></p>
					   <?php
					 }
		?>
	
	
  </div>
  
    </div>
    
    <div class="row">
	    <div class="visible-xs">
	        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
	            
	        </div>
	        <div class="col-xs-8" align="center">
	            <a href="index.php"><img src="admin/include/logof.png" alt="Mosla Bazaar" style="height:70px;padding:5px;"  class="img-responsive"></a>
	        </div>
	        <div class="col-xs-2">
	            
	        </div>
	    </div>
	</div>
    
</div>

    <nav class="navbar navbar-default navbar-custom" data-spy="affix" data-offset-top="197" style="width:100%">   
        <div class="container-fluid">
            
			<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar" >
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>                        
					</button>
					<a class="navbar-brand" href="index.php"><img src="include/images/Home-button.png" height="30px" alt="Home"></a>
					
					<div class="visible-xs" style="padding-top:8px;">
					    <form action="search.php" name="myformsearchvaluemob" method="GET" onsubmit="return validateFormMobile()">
                    		<div class="input-group">
                              <div class="search-box">
                        			<input type="text" class="form-control input-md" style="color:green;font-weight:bold;font-family:Courier;" placeholder="Search Your Items"  type="text" name="query">
                        			<div class="result" align="left"></div>
                        		</div>
                              <div class="input-group-btn">
                                <button class="btn btn-block btn-md" type="submit" style="background-color:#fff;color:gray;"  value="Search"><i class="glyphicon glyphicon-search"></i></button>
                              </div>
                            </div>
                        </form>
					</div>
				</div>
				
			<div class="collapse navbar-collapse" id="myNavbar">
			    <ul class="nav navbar-nav visible-xs">
			        <?php  if (!isset($_SESSION['full_name'])) {?>
			        <li>
			            <a href="login.php" style="text-decoration:none;color:white"><span class="glyphicon glyphicon-user" style="color:white;font-weight: bold;"></span>&nbsp;<b> Sign In </b></a>
			        </li>
			        <?php } else { ?>
                    <li class="dropdown"><button class="btn btn-danger pv"><a style="text-decoration:none;" href="#" class="dropdown-toggle pv" data-toggle="dropdown"><b>Welcome, User </b><b class="caret"></b></a></button>&nbsp;&nbsp;
                        <ul class="dropdown-menu" style="padding:20px">
                            <li style="color:gray"><b><p><?php echo htmlspecialchars($_SESSION['full_name']); ?></p></b></li>
                            <li><b><p hidden><?php echo htmlspecialchars($_SESSION['userid']); ?></p></b></li>
							<li><b><p><a href="myinfo.php" style="text-decoration:none;">My Information</a></p></b></li>
							<li><b><p><a href="orderHistory.php" style="text-decoration:none;">My Order</a></p></b></li>
                            <li class="divider"></li>
                            <li><p><a href="logout.php" style="text-decoration:none;"><span class="glyphicon glyphicon-log-out" ></span><b>&nbsp; Logout</b></span></a></p></li>
                        </ul>
                    </li>
                    <?php } ?>
			    </ul>
                <ul class="nav navbar-nav "> 
							
							<li style="background-color:#D50E23">
                				<a href="hotdealssub.php"  style="color:#ffffff;">*Hot Deal*</a>					
                			</li>
							
							<li style="">
                				<a href="offersub.php"  style="color:#ffffff;">Offers</a>					
                			</li>
                			
                			<li>
                				<a href="shopsub.php"  style="color: #ffffff;">Shop</a>						
                			</li>	
							
							<li>
                				<a href="spicies.php" style="color: #ffffff;">Spices</a>							
                			</li>

							<li>
                				<a href="dry.php" style="color: #ffffff;">Nut & Dry Fruits</a>								
                			</li>
							
							<li>
                				<a href="herbal.php" style="color: #ffffff;">Herbs</a>							
                			</li>
							
							<li>
                				<a href="spices_herbs.php" style="color: #ffffff;">Spices & Herbs Powder</a>								
                			</li>

							<li>
                				<a href="others.php" style="color: #ffffff;">Cooking & Bakery</a>							
                			</li>
                			
                			<li>
                				<a href="othercategory.php" style="color: #ffffff;">Others</a>							
                			</li>
		
							<li>
								<a href="requestitem.php" style="color: #ffffff;">Request</a>
							</li>
							
							<li style="">
                				<a href="wholesaleitem.php"  style="color:#ffffff;">Wholesale Buy</a>					
                			</li>
							
                </ul>   
			</div>
        </div>
    </nav>


<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/5b95f6a3f31d0f771d849769/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->


<script>
    $(document).ready(               
              function () {                  
                  var navpos = jQuery(".navbar-custom").offset().top;
                  jQuery(window).scroll(function () {
                      var pos = jQuery(window).scrollTop();
                      if (pos >= navpos){
                          jQuery(".navbar-custom").addClass("navbar-fixed-top");
                      }
                      else
                      {
                        jQuery(".navbar-custom").removeClass("navbar-fixed-top");                    
                      }
                  }
               );
             }
          );
</script>

