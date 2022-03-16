<?php
	if( ! ini_get('date.timezone') )
    {
        date_default_timezone_set('GMT');
    }
	include("pageurl.php");
	include ('include\config\dbConfig.php');
	include("header.php");
?>


<div class="container-fluid">

	<div class="row">
	
	<div class="col-sm-3">

		<?php include("sidemenu.php"); ?>
		
	</div>

	<div class="col-sm-9">
	
	<br/>
	<div class="row">
		<div class="col-md-12" align="center" style="background-color:#3964B9">
			<h4 class="h4" style="color:#fff">FRESH VEGETABLE ITEMS</h4>
		</div>
	</div>
	
	<br/>
	
	<div class="row">		
    <div  class="list-group list-group-horizontal">    
		<?php
        //get rows query
        $query = $db->query("SELECT * FROM products where products_category='Fresh Vegetables' ORDER BY id");
        if($query->num_rows > 0){ 
            while($row = $query->fetch_assoc()){
        ?>

        <div class="item col-sm-3">
					
					<div class="row" align="center">
						<div class="col-sm-12">
							<img src="admin/items/upload/<?php echo $row['name']; ?>"  class="img-responsive " style="width:100%; height: 180px"/>
							<h5 class="h5"  style="font-weight:bold"><?php echo $row["products_name"]; ?></h5> 
							<h5 class="h5"><?php echo $row["quantity"]; ?></h5>
							<h4 class="h4" style="font-weight:bold"><?php echo 'TK '.$row["price"]; ?></h4>
							
						 </div>
                    </div>
					<div class="row">
                        <div class="col-md-12" >
                            <a class="btn btn-default" name="product_code" style="width:100%" href="cartAction.php?action=addToCart&id=<?php echo $row["id"];?>&pageurl=<?php echo curPageURL();?>"><p style="color:#FF7067;font-weight:bold"><span class="glyphicon glyphicon-shopping-cart" style="color:#FF7067;font-weight:bold" ></span> Add to Cart</p></a>
                        </div>
                    </div>
					<br/>            
        </div>
		
        <?php } }else{ ?>
			<p class="lead" style="color:red"><b>Fresh Vegetables Not Available!</b></p>
        <?php } ?>
		
    </div>
	
	</div>
	
	<div class="row">
		<div class="col-md-12" align="center" style="background-color:#3964B9">
			<h5 class="h5" style="color:#fff"></h5>
		</div>
	</div>
	
	<br/>
	
	<br/>
	
	</div>
	
	</div>
	
</div>

<?php include('footer.php');?>