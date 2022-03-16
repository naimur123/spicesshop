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
		
		$statement = $connection->prepare("INSERT INTO products (products_name, company_name, products_category, prdsubcategory, quantity, price, description, status, name, create_id, created, modified ) VALUES (:itemname, :comname, :catname, :subcat, :qty, :itmprice, :itmdesc, :active, :image, '1', Now(), Now())");
		$result = $statement->execute(
			array(
				':itemname'	=>	$_POST["item_name"],
				':comname'	=>	$_POST["company_name"],
				':catname'	=>	$_POST["scatname"],
				':subcat'	=>	$_POST["subcatname"],
				':qty'	    =>	$_POST["slquantity"],
				':itmprice'	=>	$_POST["item_price"],
				':itmdesc'	=>	$_POST["itemdesc"],
				':active'	=>	$_POST["active"],
				':image'	=>	$image
			)
		);
		
		if(!empty($result))
		{
			echo 'Item Inserted';
		}
		else
		{
			echo 'Item Not  Inserted';
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
			SET products_name = :itemname, company_name = :comname, products_category = :catname, prdsubcategory = :subcat, quantity = :qty, price = :itmprice, description=:itmdesc, name = :image, status = :active, create_id='1', modified=Now()
			WHERE id = :id
			"
		);
		$result = $statement->execute(
			array(
				':itemname'	=>	$_POST["item_name"],
				':comname'	=>	$_POST["company_name"],
				':catname'	=>	$_POST["scatname"],
				':subcat'	=>	$_POST["subcatname"],
				':qty'		=>	$_POST["slquantity"],
				':itmprice'	=>	$_POST["item_price"],
				':itmdesc'	=>	$_POST["itemdesc"],
				':active'	=>	$_POST["active"],
				':image'	=>	$image,
				':id'			=>	$_POST["user_id"]
			)
		);
		if(!empty($result))
		{
			echo 'Item Updated';
		}
		else{
			echo 'Item Not Updated';
		}
	}
}

?>