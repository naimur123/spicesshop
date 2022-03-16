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

</style>


<div class="container-fluid">
    
    <div class="row">
       <div class="col-xs-12"></div> 
    </div>
    
	<div class="row">

	<div class="col-sm-12">

	<div class="row">
		<div class="col-md-12" align="center" style="background-color:gray">
			<h4 class="h4" style="color:#fff">Cooking & Bakery ITEMS</h4>
		</div>
	</div>
	
	<br/>
	
	<div class="row">		
    <div  class="list-group list-group-horizontal">    
		<?php
        //get rows query
        $query = $db->query("SELECT distinct products_name,name FROM products where products_category='Cooking, Bakery & Others' and status='1' ORDER BY products_name");
        if($query->num_rows > 0){ 
            while($row = $query->fetch_assoc()){
        ?>

         <div class="item col-xs-6 col-sm-2" style="padding:5px" !important>
					
					<div class="row" align="center">
						<div class="col-sm-12">
							<img src="admin/items/<?php echo $row['name']; ?>"  class="img-responsive " style="width:100%;height:150px"/>
							
							<a name="product_details" style="text-decoration:none;color:gray;" href="details.php?id=<?php echo $row["products_name"];?>"><h5 class="h5"  style="font-weight:bold;padding-top:0px;height:23px;"><?php echo $row["products_name"]; ?></h5></a> 
                    
                    <div class="row">
                        <div class="col-xs-7" style="margin-right:0px;">
							<select id="pro-id<?=$count_lp?>" class="form-control pv" style="border: 1px solid gray;padding:0px;background-color:#ECF0F1; height:35px;width:117px;">
											
							<?php
									require_once 'include/config/config.php';
									$f_value = '1';
									//$foffer_value = '1';
									$queryget =$productName[0];
									$test=$row["products_name"];
									$stmt = $dbcon->prepare('SELECT id,quantity,price FROM products where products_name=:fprdname and status=:fvalue');
									$stmt->bindParam(':fvalue', $f_value);
									$stmt->bindParam(':fprdname', $test);
									//$stmt->bindParam(':offeritem', $foffer_value);
									$stmt->execute();
        
									while($row1=$stmt->fetch(PDO::FETCH_ASSOC))
									{
										extract($row1);
							?>
									<option value="<?php echo $id ?>"><?php echo $quantity.' - '.$price. 'TK'; ?></option>
							
							<?php
									}
							?>
							</select>
						</div>
								
					    <!-- Large Screen Cart Button-->
					    
					    <div class="col-xs-5">
					        
							<div class="btn-toolbar" role="toolbar">
                                <button class="btn-group" onclick="decrease('text<?=$count_lp?>')" role="group" style="height:35px;width:18px;padding:4px;margin-right:-1px;border:1px solid #999;border-top-left-radius: 5px;border-bottom-left-radius: 5px;"> - </button>
                                
                                <div class="btn-group" role="group" ><input style="height:35px;width:22px;padding:2px;margin-left:-5px;border:1px solid #999;" id="text<?=$count_lp?>" type="text" readonly value="1"> </div>
                                
                                <button class="btn-group" role="group" onclick="increase('text<?=$count_lp?>')" style="height:35px;width:18px;padding:4px;margin-left:-1px;border:1px solid #999;border-top-right-radius: 5px;border-bottom-right-radius: 5px;"> + </button>
                            </div>
					    </div>
					    <!-- Small Screen Add Cart Button-->
					    
					</div>
					
					<br/>
					
					<div class="row" >
					    <div class="col-xs-7 hidden-xs" style="margin-right:0px;">
					        <button class="btn btn-default btn-block" style="background-color:#ff9500; height:42px;width:117px;text-align: center;padding: 9px 12px;" !important onclick="go(<?=$count_lp?>);"><p style="color:#fff;font-family:Helvetica;font-size:14px;text-align: center;"><span class="glyphicon glyphicon-shopping-cart" style="color:#fff;font-weight:bold;" ></span><b>Add to Cart</b></p></button>
					    </div>
					    
					    <div class="col-xs-7 visible-xs" style="margin-right:0px;">
					        <button class="btn btn-default btn-block" style="background-color:#ff9500; height:42px;width:117px;text-align: center;padding: 9px 12px;" !important onclick="go(<?=$count_lp?>);"><p style="color:#fff;font-family:Helvetica;font-size:14px;"><span class="glyphicon glyphicon-shopping-cart" style="color:#fff;font-weight:bold" ></span><b>Add to Cart</b></p></button>
					    </div>
					    
					    <div class="col-xs-5 hidden-xs"  style="margin-left:0px;" align="left">
					         
					         <a name="product_details" style="text-decoration:none;color:#5A5A59;" href="details.php?id=<?php echo $row["products_name"];?>">View Info</a>  <br/>
					         
					         <a  href="viewCart.php" style="text-decoration:none;color:#5A5A59;">View Cart</a>
					         
					     </div>
					    
					     <div class="col-xs-5 visible-xs"  style="margin-left:0px;" align="left">
					         
					         <a name="product_details" style="text-decoration:none;color:#5A5A59;font-size: 12px;" href="details.php?id=<?php echo $row["products_name"];?>">View Info</a><br/>
					         
					         <a  href="viewCart.php" style="text-decoration:none;color:#5A5A59;font-size: 12px;">View Cart</a>
					         
					     </div>
					</div>

						</div>
                    </div>
					<br/> 
	          
        </div>
		<?php $count_lp++ ?>
        <?php } }else{ ?>
			<p class="lead" style="color:red"><b>Cooking, Bakery & Others Items Not Available!</b></p>
        <?php } ?>
		
		
		
    </div>
	
	</div>
	
	<div class="row">
		<div class="col-md-12" align="center" style="background-color:gray">
			<h5 class="h5" style="color:#fff"></h5>
		</div>
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


<?php include('footer.php');?>