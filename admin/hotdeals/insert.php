<?php
include('db.php');
include('function.php');
if(isset($_POST["operation"]))
{
	if($_POST["operation"] == "Add")
	{
		$image = '';
		if($_FILES["user_image"]["name"] != '')
		{
			$file_name = $_FILES['user_image']['name'];
			$Ext = explode('.', $file_name);
			$file_ext = strtolower(end($Ext));			
			$file_temp = $_FILES['user_image']['tmp_name'];
			$image = "upload/".$_POST["item_name"].'.'.$file_ext;
			move_uploaded_file($file_temp, $image);
		}
		else
		{
			echo 'Data image';
		}
		
		$statement = $connection->prepare("INSERT INTO products (products_name, company_name, products_category, prdsubcategory, quantity, price, description, status, hot_deals, hotdeal_price, hotdeal_percent, name, create_id, created, modified ) VALUES (:itemname, :comname, :catname, :subcat, :qty, :itmprice, :itmdesc, :active, :offeritem, :offerprice, :offerpercent, :image, '1', Now(), Now())");
		$result = $statement->execute(
			array(
				':itemname'	=>	$_POST["item_name"],
				':itmprice'	=>	$_POST["item_price"],
				':comname'	=>	$_POST["company_name"],
				':catname'	=>	$_POST["scatname"],
				':subcat'	=>	$_POST["subcatname"],
				':qty'	    =>	$_POST["slquantity"],
				':itmdesc'	=>	$_POST["itemdesc"],
				':active'	=>	$_POST["active"],
				
				':offeritem'	=>	$_POST["offitem"],
				':offerprice'	=>	$_POST["offprice"],
				':offerpercent'	=>	$_POST["offpercent"],
				
				':image'	=>	$image
			)
		);
		
		if(!empty($result))
		{
			echo 'Hot Deals Item Inserted';
		}
		else
		{
			echo 'Hot Deals Item Not  Inserted';
		}
	}
	
	
	if($_POST["operation"] == "Edit")
	{
		$image = '';
		if($_FILES["user_image"]["name"] != '')
		{
			$file_name = $_FILES['user_image']['name'];
			$Ext = explode('.', $file_name);
			$file_ext = strtolower(end($Ext));			
			$file_temp = $_FILES['user_image']['tmp_name'];
			$image = "upload/".$_POST["item_name"].'.'.$file_ext;
			move_uploaded_file($file_temp, $image);
		}
		else
		{
			$image = $_POST["hidden_user_image"];
		}
		
		
		$statement = $connection->prepare(
			"UPDATE products 
			SET name = :image, hot_deals = :offeritem, hotdeal_percent = :offerperc, hotdeal_price = :offerprice, create_id='1', modified=Now()
			WHERE id = :id
			"
		);
		$result = $statement->execute(
			array(
				':image'	=>	$image,
				':offeritem' =>	$_POST["offitem"],
				':offerperc' =>	$_POST["offpercent"],
				':offerprice' => $_POST["offprice"],	
				':id'			=>	$_POST["user_id"]
			)
		);
		if(!empty($result))
		{
			echo 'Hot Deals Item Updated';
		}
		else{
			echo 'Hot Deals Item Updated';
		}
	}
}

?>