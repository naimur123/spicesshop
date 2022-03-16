<?php
	if( ! ini_get('date.timezone') )
    {
        date_default_timezone_set('GMT');
    }
// include database configuration file
include ('include/config/dbConfig.php');

// initializ shopping cart class
include 'Cart.php';
$cart = new Cart;

// redirect to home if cart is empty
if($cart->total_items() <= 0){
    header("Location: index.php");
}

if(!isset($_SESSION['full_name']) || empty($_SESSION['full_name'])){
	 $_SESSION['checkoutPage'] = "Available";
  header("location: login.php");
  exit;
}

else{

// set customer ID in session
$sessionvalue=$_SESSION['full_name'] ;
//$emailvalue = 'nirjhor.aiub@gmail.com';

$_SESSION['sessionpayment'] = $_POST['paymentname'];

//require_once 'dbConfig.php';
// get customer details by session customer ID
$query = $db->query("SELECT * FROM customer_registration WHERE email = '$sessionvalue'");
$custRow = $query->fetch_assoc();
$customerAddress = $custRow['district'];
}
include ("header.php");
?>

<style>
     html, body {
        width: auto!important; overflow-x: hidden!important;
        min-width: 392px;
    } 
	.tkinline{
		display:inline;
	}
	
	#divshowdesk{
		display:none;
	}
	#divshowrocket{
		display:none;
	}
	#divshowcash{
	    display:none;
	}
	.top-right {
    position: absolute;
    top: 37px;
    right: 23px;
}

</style>

<div class="container-fluid hidden-xs">

	<div class="row">
       <div class="col-xs-12"></div> 
    </div>
	
	<div class="row">
		
		<div class="col-sm-3 col-xs-3">			
			
			<div class="row">
				<div class="panel">
				
				<div class="panel-header">
					
					<div class="col-md-12" align="center" style="background-color:#3964B9">
						<h4 class="h4" style="color:#fff">SHIPPING DETAILS</h4>
					</div>
					
				</div>
				
				<div class="panel-body">
			    	 <p><b>Full Name: </b><?php echo $custRow['full_name']; ?></p>
					 <p><b>Email: </b><?php echo $custRow['email']; ?></p>
					 <p><b>Phone: </b><?php echo $custRow['phone']; ?></p>
					 <p><b>Address: </b><?php echo $custRow['address']; ?></p>	
				</div>
				
				</div>
			</div>
	
		</div>
		
		<div class="col-sm-9 col-xs-9">			
			
			<div class="panel">
			
			<div class="panel-header">	
					<div class="col-md-12" align="center" style="background-color:#3964B9">
						<h4 class="h4" style="color:#fff">ORDER DETAILS</h4>
					</div>
				</div>
								
			<div class="panel-body">
				<table class="table table-striped table-hover table-bordered">
			
        			<thead>
        			<tr>
        				<th width="300px">Name</th>
        				<th width="150px">Price</th>
        				<th width="150px">Unit</th>
        				<th width="150px">Qty</th>
        				<th width="150px">Sub</th>
        			</tr>
        			</thead>
			
			        <tbody>
                   <?php
            		$totalCartValue = 0;
                    if($cart->total_items() > 0){
                        //get cart items from session
                        $cartItems = $cart->contents();
                        foreach($cartItems as $item){
                    ?>
                    <tr>
            		<?php if($item['id'] != 999999){ ?>
                        <td><?php echo $item["prdname"]; ?></td>
                        <td><?php echo $item["price"].' TK'; ?></td>
            			<td><?php echo $item["unit"]; ?></td>
            			<?php $totalCartValue += $item["price"]*$item["qty"]; ?>
                        <td><?php echo $item["qty"]; ?></td>
                        <td><?php echo $item["subtotal"].' TK'; ?></td>
            		<?php } ?>
                    </tr>
            		
                    <?php } }else{ ?>
                    <tr><td colspan="4"><p>No items in your cart......</p></td>
                    <?php } ?>
                </tbody>

    </table>
			
		</div>
			
			</div>
			</div>
			
			</div>
		
	</div>

<div/>


<div class="container-fluid visible-xs">
	
	<div class="row">
       <div class="col-xs-12"></div> 
    </div>
	
	<div class="row" align="center">

			
			
			<div class="panel">
			
			<div class="panel-header">	
					<div class="col-md-12" align="center" style="background-color:#3964B9">
						<h4 class="h4" style="color:#fff">ORDER DETAILS</h4>
					</div>
				</div>
								
			<div class="panel-body">
				<table class="table table-striped table-hover table-bordered">
			
        			<thead>
        			<tr>
        				<th width="300px">Name</th>
        				<th width="150px">Price</th>
        				<th width="150px">Unit</th>
        				<th width="150px">Qty</th>
        				<th width="150px">Sub</th>
        			</tr>
        			</thead>
			
			        <tbody>
                   <?php
            		$totalCartValue = 0;
                    if($cart->total_items() > 0){
                        //get cart items from session
                        $cartItems = $cart->contents();
                        foreach($cartItems as $item){
                    ?>
                    <tr>
            		<?php if($item['id'] != 999999){ ?>
                        <td><?php echo $item["prdname"]; ?></td>
                        <td><?php echo $item["price"].' TK'; ?></td>
            			<td><?php echo $item["unit"]; ?></td>
            			<?php $totalCartValue += $item["price"]*$item["qty"]; ?>
                        <td><?php echo $item["qty"]; ?></td>
                        <td><?php echo $item["subtotal"].' TK'; ?></td>
            		<?php } ?>
                    </tr>
            		
                    <?php } }else{ ?>
                    <tr><td colspan="4"><p>No items in your cart......</p></td>
                    <?php } ?>
                </tbody>
	
	
    
    </table>
			
		</div>
			
			</div>
			</div>
			
			</div>
		

    
    
		
			
			<div class="row visible-xs" align="center">
				<div class="panel">
				
				<div class="panel-header">
					
					<div class="col-md-12" align="center" style="background-color:#3964B9">
						<h4 class="h4" style="color:#fff">SHIPPING DETAILS</h4>
					</div>
					
				</div>
				
				<div class="panel-body">
			    	 <p><b>Full Name: </b><?php echo $custRow['full_name']; ?></p>
					 <p><b>Email: </b><?php echo $custRow['email']; ?></p>
					 <p><b>Phone: </b><?php echo $custRow['phone']; ?></p>
					 <p><b>Address: </b><?php echo $custRow['address']; ?></p>	
				</div>
				
				</div>
			</div>
	

    
<div/>

<div class="container-fluid">

	
	<div class="row">
	
		<!-- cupon  code -->
			<?php
			    if(!isset($_SESSION['couponPrice'])){
			        $_SESSION['couponPrice'] = 0;
			    }
			    
			    $couponValue = 0;
			    if( isset($_POST['ApplyCouponeCode']))
			    {
			        $code = $_POST['couponCode'];
			        $st = "SELECT * FROM coupon_apply WHERE coupon_code ='$code' And coupon_flag = 1";
			        $result = $db->query($st);
			        if(mysqli_num_rows($result)>0)
			        {
			           while($cval = mysqli_fetch_assoc($result)){
			               $couponValue = $cval['coupon_amount'];
			               $_SESSION['couponPrice'] = $couponValue;
			           }
			        }
			        
			    }
			    
			?>
				
			    <div align="center">
                    <h3 class="text-info">Do you have Cupon?</h3>
                     
			        <h4 class="text-info">(Apply Coupon Here)</h3>
			        <form method="post">
			            <input type="text" name="couponCode" placeholder="Coupon Code" style="height:35px;">
			            <button type="submit" name="ApplyCouponeCode" class="btn btn-info" style="border-radious:none;height:35px;">Apply</button>
			        </form>
			    </div>

</div>

</div>
	<br/>		
    
    <div class="container-fluid">
        <div class="row" align="center">
                     <div class="col-xs-2"></div>
                     <div class="col-xs-8">
			    				    <h4 class="text-info">Payment Method</h3>
			    					<div class="form-group">

			    						<select class="form-control round" name="paymentname" id="paymentname" onchange="check_dd();">
			    						    <option value="Cash On Delivery">Select Your Payment</option>
                                            <option value="Cash On Delivery">Cash On Delivery</option>
                                            <option value="Bkash">Bkash</option>
                                            <option value="Rocket">Rocket</option>
								        </select>

			                        </div>
                    </div>
                    <div class="col-xs-2"></div>
            
        </div>
        
    </div>
    
    
    <div class="container-fluid" id="divshowdesk">
        
        <div class="row">
                
                <div class="col-sm-4 col-xs-12"></div>
                    <div class="col-sm-4 col-xs-12">
                    <ul>
                        <li><img src="include/images/bkashpay.png" alt="bkash" height="50x">  <b>bkash</b> </li>
                        <br/>
                        <li> <b>Scan the Qr code and use in bkash APP</b> </li>
                        <br/>
                        <li> <img src="include/images/qr.png" alt="Cash on Delivery" height="50x"> </li>
                        <br/>
                        <li> <b>How does the bkash payment on Spices Shop works</b> </li>
                        <li> <b>Step 1: </b>Dial *247# to get your bkash Menu</li>
                        <li> <b>Step 2: </b>Press 3 for "Payments" </li>
						<li> <b>Step 3: </b>Enter the Spices Shop Merchant Number: <b> 01957229587 </b></li>
						<li> <b>Step 4: </b>Enter Amount: Total order amount </li>
						<li> <b>Step 5: </b>Enter order number as reference </li>
						<li> <b>Step 6: </b>Enter "1" for the bkash Counter No </li>
						<li> <b>Step 7: </b>Verify your payment by entering your PIN </li>
						<li> <b>Step 8: </b>Click confirm Order on the Spices Shop checkout page below </li>
                    </ul>
                    </div>
                <div class="col-sm-4 col-xs-4"></div>
            
        </div>
        
    </div>
    
    
    <div class="container-fluid" id="divshowrocket">
        
        <div class="row">
                
                <div class="col-sm-4 col-xs-12"></div>
                    <div class="col-sm-4 col-xs-12">
                        <h3 class="h3">Merchant <b>Payment</b></h3>
                        <br/>
                        <li><img src="include/images/rocket.png" alt="Rocket" height="50x">  <b>Rocket</b> </li>
                        <br/>
                        <h5 class="h5">When a Customer buy/shop something  from Dutch-Bangla Bank authorized merchant they can pay the bill to the Merchant using their Rocket account</h5>
                        <br/>
                        <h5 class="h5">Overall procee of Merchant Pay is as folows...</h5>
                    <ul>

                        <li> Merchant initiates the transaction from his/her mobile </li>
                        <li> Merchant issues a receipt to the customer</li>
                        <li> System sends an SMS to the customer's mobile</li>
						<li> For security reason, customer needs to check the sending number of SMS and the amount. SMS/VR call will be sent from 16216 or 01190016216 or 096667</li>
						
                    </ul>
                    <br/>
                    <h5><b>For Customer:</b> Customer receives an IVR Call</h5>
                    </div>
                <div class="col-sm-4 col-xs-4"></div>
            
        </div>
        
    </div>
    
    
    <div class="container-fluid" id="divshowcash">
        
        <div class="row">
                
                <div class="col-sm-4 col-xs-12"></div>
                    <div class="col-sm-4 col-xs-12">
                        <h3 class="h3">Cash On<b> Delivery</b></h3>
                        <br/>
                        <li><img src="include/images/cashondelivery.png" alt="Cash on Delivery" height="50x">  <b>Cash On Delivery</b> </li>
                        <br/>
                        <h5 class="h5">Cash on Delivery courier service in Dhaka offer by  Spices Shop. We will collect cash instead of you and give your product within 72 hours outside of Dhaka. Besides this, we offer door to door cheap pick up and delivery in whole Bangladesh.</h5>
                        <br/>
                        <h5 class="h5"><b>Why we are best</b></h5>
                    <ul>
                        <li> Within 24 hours delivery in Dhaka</li>
                        <li> DAILY PICK UP! NO LIMITATIONS </li>
                        <li> CASH ON DELIVERY</li>
                        <li> ONLINE MANAGEMENT</li>
						<li> FASTER PAYMENT SERVICE</li>
						<li> REAL-TIME TRACKING</li>
                    </ul>
                    
                    </div>
                <div class="col-sm-4 col-xs-4"></div>
            
        </div>
        
    </div>
    
    
    
	<div class="container-fluid">
			
	<div class="row">
				
				<form method="post" name="myformcoupon" onsubmit="return validateForm()">
			
				<div class="col-sm-2 col-xs-2">
				
					<?php
						if(isset($errMSG)){
						?>
						<div class="alert alert-danger">
							<span class="glyphicon glyphicon-info-sign"></span> <strong><?php echo $errMSG; ?></strong>
						</div>
					<?php
					}
					else if(isset($successMSG)){
					?>
					<div class="alert alert-success">
						<strong><span class="glyphicon glyphicon-info-sign"></span> <?php echo $successMSG; ?></strong>
					</div>
					<?php
					}
					?>  

				</div>
				
				<div class="col-sm-8 col-xs-8">
										
					<table class="table table-striped table-hover table-bordered">
						
						<tbody>
							
							<tr>
								<td><b>Sub Total</b></td>
								<td name="subtotal"><?php if($cart->total_items() > 0){ ?>
										<?php echo $totalCartValue; 
										$_SESSION['checkOutPricett'] = $totalCartValue;
										?>						
										<?php } ?>
										Tk.
								</td>
							</tr>

							<tr>
								<td><b>Shipping Charge</b></td>
								<?php
    								$con = mysqli_connect("localhost", "spicesshop_spiceshop", "Moshla@1010", "spicesshop_spiceshop");
    								$res = mysqli_query($con, "SELECT shippingcost,outsidedhaka,insideFreeAfter,outsideFreeAfter FROM shipping_fee WHERE active='1'");
        						    $row = mysqli_fetch_assoc($res);
    								if(strtolower($customerAddress) == 'dhaka'){
    								    
    								    if($totalCartValue < $row["insideFreeAfter"]){
    								        $value = $row["shippingcost"];
        								    $location = " TK (Inside Dhaka)";
    								    }else{
    								        $value = 00;
    								        $location = " TK (Inside Dhaka)";
    								    }
    								    
    								}else{
    								   
    								   if($totalCartValue < $row["outsideFreeAfter"]){
    								        	$value = $row["outsidedhaka"];
        								        $location = ' TK (Outside Dhaka)';
    								    }else{
    								        $value = 00;
    								        $location = ' TK (Outside Dhaka)';
    								    }
        							
    								}
    								
								?>
								<td><?php echo $value.$location ?></td>
							</tr>
							
							<?php if($_SESSION['couponPrice']>0){ ?>
							<tr>
							    <th>Discount</th>
							    <td> <?php echo $_SESSION['couponPrice']; ?>Tk. </td>
							</tr>
							<?php } ?>
							<tr>
								<td><b>Total</b></td>
								
								<td name="total"><?php if($cart->total_items() > 0){ ?>
										<?php $to = $cart->total(); 
										if($value>=0){
										    $_SESSION["shippingcost"] = $value;
										    echo $totalCartValue+$value-$_SESSION['couponPrice'];
										}?>
										<?php }
										$_SESSION['checkOutPrice'] = ($totalCartValue+$value)- $_SESSION['couponPrice'];
										?>
										Tk.
								</td>
							</tr>
								
							
						</tbody>
					
					</table>
					
				</div>
				
				<div class="col-sm-2 col-xs-2"></div>
				
				</form>
				
	</div>
	
	
	</div>
	
	<div class="container-fluid">
		<div class="row">				
				<div class="col-sm-1 col-xs-1"></div>
				<div class="col-sm-5 col-xs-5" style="padding:3px;">
					
					<a href="index.php" class="btn btn-warning btn-block" > Continue Shopping </a>
				
				</div>
				
				<div class="col-sm-5 col-xs-5">
					<button class="btn btn-success btn-block" style="background-color:#E04A6A;color:#fff" name="placeOrder" id="placeOrder">Place Order</button>
				</div>
				<div class="col-sm-1 col-xs-1"></div>
			</div>
	
	
</div>


<style type="text/css">
    .stiky-footer .navbar-toggle{
        background:green;
        color:#fff;
    }
</style>
<script>

    $(document).ready(function(){
        $('#placeOrder').click(function(){
            var payment = $('#paymentname').val();
            window.location.href="cartAction.php?action=placeOrder&&paymentType="+payment;
        });
        
    });
</script>

<script>
function check_dd() { divshowcash
    if(document.getElementById('paymentname').value == "Bkash") {
        document.getElementById('divshowdesk').style.display = 'block';
        document.getElementById('divshowrocket').style.display = 'none';
        document.getElementById('divshowcash').style.display = 'none';
    } else if(document.getElementById('paymentname').value == "Rocket"){
        document.getElementById('divshowrocket').style.display = 'block';
        document.getElementById('divshowdesk').style.display = 'none';
        document.getElementById('divshowcash').style.display = 'none';
    }
    else if(document.getElementById('paymentname').value == "Cash On Delivery")
    {
        document.getElementById('divshowcash').style.display = 'block';
        document.getElementById('divshowdesk').style.display = 'none';
        document.getElementById('divshowrocket').style.display = 'none';
    }
    else
    {
        document.getElementById('divshowdesk').style.display = 'none';
        document.getElementById('divshowrocket').style.display = 'none';
        document.getElementById('divshowcash').style.display = 'none';
    }
}

</script>

<style type="text/css">
    .stiky-footer .navbar-toggle{
        background:green;
        color:#fff;
    }
    
</style>

<?php include('footer.php') ?>
