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
		
		.btn-change2{
    height: 35px;
    width: 150px;
    background: #F39517 ;


    border:0px;
    color:#fff;
    box-shadow: 0 0 1px #ccc;
    -webkit-transition-duration: 0.5s;
    -webkit-transition-timing-function: ease-out;
    -webkit-transform-origin: 0 0;
    box-shadow:0px 0px 0 100px #F39517 inset;
}

.btn-change2:hover{
    -webkit-box-shadow:0px 0px 0 0px gray inset;
    -webkit-transform: scale(1);
}
		


</style>

<div class="container-fluid">
    
    <div class="row">
       <div class="col-xs-12"></div> 
    </div>
    
	<div class="row">
	
	<div class="col-sm-1 col-xs-1">

	</div>

	<div class="col-sm-10 col-xs-10">
	<div class="row">
		<div class="col-sm-12 col-xs-12" align="center" style="background-color:gray">
			<h4 class="h4" style="color:#fff">Product Details </h4>
		</div>
	</div>
	
	<br/>
	
	<div class="row">		
    <div  class="list-group list-group-horizontal">    
		<?php
        //get rows query
		$row2 = null;
		$id = $_GET['id'];
		$productName = array();
        $query = $db->query("SELECT * FROM products where products_name="."'".$id."'"." ORDER BY products_name");
        if($query->num_rows > 0){ 
            while($row = $query->fetch_assoc()){
			$row2 = $row;
				array_push($productName,$row["products_name"]);
				
        ?>
		
			<div class="item col-sm-5 col-xs-12">
				
				<img src="admin/items/<?php echo $row['name']; ?>"  class="img-responsive" style="width:400px; height: 400px;"/>
			
			</div>


			<div class="item col-sm-7 col-xs-12">
			            <div class="row">
			                <div class="col-xs-1"></div>
			                <div class="col-xs-11"><h4 class="h4" name="prdname"  style="font-weight:bold;padding-top:10px;height:40px;"><?php echo $row["products_name"]; ?></h4>	</div>
			                
			            </div>
							<br/>
								
									<?php 
									
							$count_lp = 0;
							$nm = $row["products_name"];
							$st = "SELECT id,quantity,price FROM products where products_name='".$nm."'";		
							$query = $db->query($st);
			
							if($query->num_rows > 0){ 
								while($row = $query->fetch_assoc()){
								echo $row['quantity'].' - ';
								echo $row['price'].' TK'; $pid = $row['id'];?>

								
								<div class="row">
								    
									
									<div class="col-xs-3 hidden-xs">	
									    <div class="btn-toolbar" role="toolbar">
                                            <button class="btn-group" onclick="decrease('text<?=$count_lp?>')" role="group" style="height:35px;width:25px;padding:4px;margin-right:-1px;border:1px solid #999;border-top-left-radius: 5px;border-bottom-left-radius: 5px;"> - </button>
                                
                                        <div class="btn-group" role="group" ><input style="height:35px;width:35px;padding:2px;margin-left:-5px;border:1px solid #999;" id="text<?=$count_lp?>" type="text" readonly value="1"> </div>
                                            <button class="btn-group" role="group" onclick="increase('text<?=$count_lp?>')" style="height:35px;width:25px;padding:4px;margin-left:-1px;border:1px solid #999;border-top-right-radius: 5px;border-bottom-right-radius: 5px;"> + </button>
                                        </div>
									    
									</div>
									
									
									<div class="col-xs-6 visible-xs">	
									    <div class="btn-toolbar" role="toolbar">
                                            <button class="btn-group" onclick="decrease('text<?=$count_lp?>')" role="group" style="height:35px;width:25px;padding:4px;margin-right:-1px;border:1px solid #999;border-top-left-radius: 5px;border-bottom-left-radius: 5px;"> - </button>
                                
                                        <div class="btn-group" role="group" ><input style="height:35px;width:35px;padding:2px;margin-left:-5px;border:1px solid #999;" id="text<?=$count_lp?>" type="text" readonly value="1"> </div>
                                            <button class="btn-group" role="group" onclick="increase('text<?=$count_lp?>')" style="height:35px;width:25px;padding:4px;margin-left:-1px;border:1px solid #999;border-top-right-radius: 5px;border-bottom-right-radius: 5px;"> + </button>
                                        </div>
									    
									</div>


									<div class="col-xs-2">
										<button class="btn btn-default  btn-change2" style="background-color:#F39517;width:100px;height:35px;" !important onclick="go(<?=$count_lp?>);"><b>Add to Cart</b></button>
									</div>
									
									<div class="col-xs-1">
								        
								    </div>
								    
								    <div class="col-xs-4 visible-xs">
								        
								    </div>
								
								</div>
								
								<?php echo'<br>';
								$count_lp++;
							}

				
			}
			
			?>
		
        </div>
		
    </div>
	
	</div>
	<br/>
	<div class="row">
		<div class="col-md-12 col-xs-12" align="left" style="background-color:gray">
			<h4 class="h4" style="color:#fff">Item Description</h4>
		</div>
		
		<div class="item col-sm-12 col-xs-12">
			<br/>
			
			<p class="lead"><?php echo $row2["description"]; ?></p>
		
		</div>
		
	</div>
	
	
	
	
	
	<?php } }else{ ?>
			<p class="lead" style="color:red"><b>Items Not Available!</b></p>
        <?php } ?>
	
	<br/>
	
	
	
	<div class="row">
		<div class="col-md-12" align="center" style="background-color:gray">
			<h5 class="h5" style="color:#fff"></h5>
		</div>
	</div>
	
	<br/>
	
	<br/>
	
	
	
	</div>
	
	
	
	
	
	<div class="col-sm-1">
	
	
	</div>
	
	</div>
	
</div>


<div class="container-fluid">
    
    <div class="row">
       <div class="col-xs-12"></div> 
    </div>
    
	<div class="row">

	<div class="col-sm-12">

	<div class="row">
		<div class="col-md-12" align="center" style="background-color:gray">
			<h4 class="h4" style="color:#fff">RELATED ITEMS</h4>
		</div>
	</div>
	
	<br/>
	
	<div class="row">		
    <div  class="list-group list-group-horizontal">    
		<?php
        //get rows query
        $query = $db->query("SELECT distinct products_name,name FROM products where products_category='Herbs' and status='1' ORDER BY products_name");
        if($query->num_rows > 0){ 
            while($row = $query->fetch_assoc()){
        ?>

         <div class="item col-xs-6 col-sm-2" style="" !important>
					
					<div class="row" align="center">
						<div class="col-sm-12">
							<img src="admin/items/<?php echo $row['name']; ?>"  class="img-responsive " style="width:100%;height:150px"/>
							
							<a name="product_details" style="text-decoration:none;color:gray;" href="details.php?id=<?php echo $row["products_name"];?>"><h5 class="h5"  style="font-weight:bold;padding-top:0px;height:23px;"><?php echo $row["products_name"]; ?></h5></a> 
                    
                    <div class="row">
                        <div class="col-xs-7" style="margin-right:0px;">
                                                <!-- ekhane width change korsi  -->
							<select id="pro-id<?=$count_lp?>" class="form-control pv" style="border: 1px solid gray;padding:0px;background-color:#ECF0F1; height:35px;width:105px;">
											
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
					                                <!-- ekhane width change korsi  -->
							<div class="btn-toolbar" role="toolbar" style="width:70px;">
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
					        <button class="btn btn-default btn-block" style="background-color:#ff9500; height:42px;width:105px;text-align: center;padding: 9px 12px;" !important onclick="go(<?=$count_lp?>);"><p style="color:#fff;font-family:Helvetica;font-size:14px;text-align: center;"><span class="glyphicon glyphicon-shopping-cart" style="color:#fff;font-weight:bold;" ></span><b>Add to Cart</b></p></button>
					    </div>
					    
                        <!-- ekhane width and padding change korsi  -->
					    <div class="col-xs-7 visible-xs" style="margin-right:0px;">
					        <button class="btn btn-default btn-block" style="background-color:#ff9500; height:42px;width:105px;text-align: center;padding: 10px 07px;" !important onclick="go(<?=$count_lp?>);"><p style="color:#fff;font-family:Helvetica;font-size:14px;"><span class="glyphicon glyphicon-shopping-cart" style="color:#fff;font-weight:bold" ></span><b>Add to Cart</b></p></button>
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
			<p class="lead" style="color:red"><b>Related Items Not Available!</b></p>
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
 


<?php include('footer.php');?>

