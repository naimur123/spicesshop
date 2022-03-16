<?php
	if( ! ini_get('date.timezone') )
    {
        date_default_timezone_set('GMT');
    }
// initializ shopping cart class
include 'Cart.php';
$cart = new Cart;
include('header.php');
?>

	<script type="text/javascript">
    function updateCartItem(obj,id){
        $.get("cartAction.php", {action:"updateCartItem", id:id, qty:obj.value}, function(data){
            if(data == 'ok'){
                location.reload();
            }else{
                alert('Cart update failed, please try again.');
            }
        });
    }
    </script>
	
	<script type="text/javascript">
		function validateForm() {
    var coupon = document.forms["myformcoupon"]["txtcoupon"].value;
   	
    if (coupon == "") {
        alert("Please insert your coupon code");
        return false;
    }
}
</script>
		
<style>
     
     html, body {
        width: auto!important; overflow-x: hidden!important;
        min-width: 392px;
    } 
     
	.tkinline{
		display:inline;
	}
	
	.top-right {
    position: absolute;
     top: 37px;
    right: 23px;
}
    .table table-striped table-hover table-bordered mytable>tbody>tr>td {
    padding: 6px; !important
    }

    .table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th {
        padding: 6px !important;
    }



</style>

<div class="container-fluid">
    
    <div class="row">
       <div class="col-sm-12 col-xs-12"></div> 
    </div>
    

	
	
		<div class="row" align="center">
			
			<div class="col-xs-12" >
						
				<table class="table table-striped table-hover table-bordered mytable">
    <thead>
        <tr>
            <th>Item</th>
			<th>Name</th>
            <th>Price</th>
            <th>Unit</th>
            <th>Qty</th>
            <th>Sub</th>
            <th>Del</th>
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
            <td><img src="admin/items/<?php echo $item['name']; ?>"  class="img-responsive " style="width:40px; height: 40px"/></td>
			<td><?php echo $item["prdname"]; ?></td>
			<td><?php echo $item["price"].' TK'; ?></td>
			<td><?php echo $item["unit"]; ?></td>
			<?php $totalCartValue += $item["price"]*$item["qty"]; ?>
            <td><input type="number" class="form-control text-center" style="width:50px;" value="<?php echo $item["qty"]; ?>" onchange="updateCartItem(this, '<?php echo $item["rowid"]; ?>')"></td>
            <td><?php echo $item["subtotal"].' TK'; ?></td>
            <td>
                <a href="cartAction.php?action=removeCartItem&id=<?php echo $item["rowid"]; ?>" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i></a>
            </td>
			<?php } ?>
        </tr>
        <?php } }else{ ?>
        <tr><td colspan="7"><p>Your cart is empty.....</p></td>
			<?php } ?>	
		<tr/>		
    </tbody>
	
    </table>
		</div>
		
						
			</div>
			

			
			<div class="row">
				<form method="post" name="myformcoupon" onsubmit="return validateForm()">
				<div class="col-sm-2 col-xs-2">
					
				</div>
				
				<div class="col-sm-4 col-xs-4">
				
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
				
				<div class="col-sm-3 col-xs-3">
										
					<table class="table table-striped table-hover table-bordered">
						
						<tbody>
							
							<tr>
								<td><b>Sub Total</b></td>
								<td name="subtotal"><?php if($cart->total_items() > 0){ ?>
										<?php echo $totalCartValue. ' TK'; ?>						
										<?php } ?>
								</td>
							</tr>

							<tr>
								<td><b>Shipping Charge</b></td>
								<?php
								$con = mysqli_connect("localhost", "spicesshop_spiceshop", "Moshla@1010", "spicesshop_spiceshop");
								$res = mysqli_query($con, "SELECT shippingcost FROM shipping_fee WHERE active='1'");
								$row = mysqli_fetch_assoc($res);
								$value = $row["shippingcost"];
								?>
								<td><?php echo $value . ' TK (Inside Dhaka)' ?></td>
							</tr>
							
							<tr>
								<td><b>Total</b></td>
								
								<td name="total"><?php if($cart->total_items() > 0){ ?>
										<?php $to = $cart->total(); if($value){echo $totalCartValue+$value;}?>
										<?php } 
										$_SESSION['checkOutPrice'] = $totalCartValue;
										?>
								</td>
							</tr>
								
							
						</tbody>
					
					</table>
					
				</div>

				<div class="col-sm-3 col-xs-3">
						
				
				</div>
				</form>
			</div>
			
			<div class="row">
				
				<div class="col-sm-6 col-xs-6">
					
					<a href="index.php" class="btn btn-warning btn-block"><i class="glyphicon glyphicon-menu-left"></i> Continue Shopping</a>
				
				</div>
				
				<div class="col-sm-6 col-xs-6" >
					
					<a href="checkout.php" class="btn btn-success btn-block">Checkout <i class="glyphicon glyphicon-menu-right"></i></a>
				
				</div>

			</div>
			
	</div>

</div>

<style type="text/css">
    .stiky-footer .navbar-toggle{
        background:green;
        color:#fff;
    }
    
</style>

<?php include('footer.php') ?>