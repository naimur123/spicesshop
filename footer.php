
    <!------ Include the above in your HEAD tag ---------->
    <link rel="stylesheet" type="text/css" href="include/css/footer.css">
    
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    
    
<script>
    $(document).ready(function(){
        $value = $('#cart_val').val();
        if($value > 0){
            $('#place-order').show();
            $('#continue-shoping').hide();
        }else{
            $('#place-order').hide();
            $('#continue-shoping').show();
        }
    });
    function go(ids){
				var idss= document.getElementById('pro-id'+ids).value;
				var qty = document.getElementById('text'+ids).value;
				
				$.ajax({
                    url:'insertCart.php',
                    method:'POST',
                    data:{
                        id:idss,
						qty:qty
                    },
                    success:function(data){
                        $('#cart_item').html(data);
                        $('#cart_item2').html(data);
                         var c = document.getElementById('continue-shoping');
                         var p = document.getElementById('place-order');
                         if(data >0)
                         {
                            c.style.display = "none";
                            p.style.display = "block";
                         }
                         else
                         {
                            c.style.display = "block";
                            p.style.display = "none";
                         }
                   }
                });
				
				var x = document.getElementById('text'+ids);	
				x.value =1;
			}

			function decrease(id){
				var x = document.getElementById(id);				
				var a = parseInt(x.value);	
				if(a>1){
				a = a-1;
				}				
				x.value = a;
				
			}
			function increase(id){
				var x = document.getElementById(id);
				var a = parseInt(x.value);
				a = a+1;
				x.value = a;
			}
</script>

<div style="height:70px;width:100%;"> </div>

<div class="visible-xs stiky-footer navbar-fixed-bottom" style="height:55px;">
		<div class="container-fluid" style="background:#fff;padding:-10px 0px;margin:-20px 0px;">
			<div class="row" style="background:#fff;padding:5px 0px;">
                <div class="col-xs-2"></div>
                
                <div class="col-xs-2" style="margin-left:5px;"> <a href="tel:01977733240"> <img src="phone.png" width="50px" height="50px" > </a> </div>
                
               
                    <div class="col-xs-5" id="place-order">
    					<a href="viewCart.php" class="btn jhamela" style="margin:none;width:100%;height:50px;background-color:#149F43;color:#fff;padding: 14px 12px;">Place Order</a>
    				</div>
    		   
                    <div class="col-xs-5" id="continue-shoping">
					    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar" style=";padding:none;margin:none;width:100%;height:50px;background-color:#ff9500;color:#fff;text-align: center;padding: 9px 12px;" >Start Shopping</button>
				    </div>
				    
				<input type="hidden" value="<?=$count?>" id="cart_val">
                
                <div class="col-xs-2" align="center"> <a href="viewCart.php" > <img src="bag.png" style="width:44px;height:50px;text-align:center;">  </a>
			        <div class="top-right" style="margin-top:-20px;"><strong><p style="color:black;font-weight:bold;font-size:22px; !important" id="cart_item2" align="center"> <?=$count?> </p></strong></div>	
				</div> 
				
			</div>
		</div>
	</div>

	
<footer>
    <div class="footer" id="footer">
        <div class="container-fluid">
			
			<div class="row">
				<div class="col-lg-3  col-md-3 col-sm-3 col-xs-6">
                    <img src="admin/include/logof.png" alt="Mosla Bazaar" class="img-responsive">	
                </div>
				<div class="col-lg-9  col-md-9 col-sm-9 col-xs-12">
                    <p class="lead" >Out of the traditional market system, the name of a modern and technologically marketable market is Spices Shop</p>
                </div>
			</div>

			
            <div class="row">
                <div class="col-lg-3  col-md-3 col-sm-6 col-xs-6">
                    <h3 class="h3" > Products Category </h3>
                    <ul>
                        
                        <li> <a href="spicies.php" > Spices </a> </li>
                        <li> <a href="dry.php" > Nut & Dry Fruits </a> </li>
                        <li> <a href="herbal.php"> Herbs </a> </li>
                        <li> <a href="spices_herbs.php" > Spices & Herbs Powder </a> </li>
						<li> <a href="others.php" > Cooking & Bakery </a></li>
						<li> <a href="othercategory.php" > Others </a></li>
                    </ul>
                </div>
                
                <div class="col-lg-3  col-md-3 col-sm-6 col-xs-6">
                    <h3 class="h3" > Customer Service </h3>
                    <ul>
                        <li> <a href="contactus.php" > Contact Us </a> </li>
                        <li> <a href="#" > About Us </a> </li>
                        <li> <a href="#" > Privacy Policy </a> </li>
                        <li> <a href="#" > FAQS </a> </li>
						<li> <a href="#" > Terms of Use </a> </li>
                    </ul>
                </div>
                <div class="col-lg-3  col-md-3 col-sm-6 col-xs-6">
                    <h3 class="h3" > Payment Option </h3>
                    <ul>
                        <li> <img src="include/images/cashondelivery.png" alt="Cash on Delivery" width="80px" height="60px"> &nbsp;&nbsp; <img src="include/images/bkash.png" alt="Bkash" width="80px" height="60px"> &nbsp;&nbsp; <img src="include/images/rocket.png" alt="Rocket" width="80px" height="60px"> </li>
                    </ul>
                </div>
                <div class="col-lg-3  col-md-3 col-sm-6 col-xs-12 ">
                    <h3 class="h3" > Be Connected </h3>
                    <ul class="social">
						<li><a href="#"><i class="fa fa-lg fa-facebook" ></i></a></li>
						<li><a href="#"><i class="fa fa-lg fa-twitter" ></i></a></li>
						<li><a href="#"><i class="fa fa-lg fa-google-plus"></i></a></li>
						<li><a href="#"><i class="fa fa-lg fa-pinterest" ></i></a></li>
                        <li><a href="#"><i class="fa fa-lg fa-instagram" ></i></a></li>
                        <li><a href="#"><i class="fa fa-lg fa-youtube-play" ></i></a></li>
                    </ul>
                </div>
            </div>
            <!--/.row--> 
        </div>
        <!--/.container--> 
    </div>
    <!--/.footer-->
    
    <div class="footer-bottom">
        <div class="container">
            <p class="pull-left"> Copyright &copy; Spices Shop. All right reserved.  Created by <A hfer="mailto:encrypt.h@gmail.com">AL AMIN</A></p>
            <div class="pull-right">
                
            </div>
        </div>
    </div>
    <!--/.footer-bottom--> 
</footer>


        <script src="include/js/jquery.min.js"></script>
        <script src="include/js/bootstrap.min.js"></script>
	</body>
	</html>