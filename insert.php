<?php
include('db.php');
include('function.php');
if(isset($_POST["operation"]))
{
	if($_POST["operation"] == "Add")
	{
		
		$statement = $connection->prepare("
			INSERT INTO category (cat_name, remarks, flag, create_id, create_date) 
			VALUES (:catname, :remark, :active, '1', Now())
		");
		$result = $statement->execute(
			array(
				':catname'	=>	$_POST["cat_name"],
				':remark'	=>	$_POST["remarks"],
				':active'	=>	$_POST["active"]
			)
		);
		if(!empty($result))
		{
			echo 'Category Inserted';
		}
		else{
			echo 'Category Not Inserted';
		}
	}
	
	if($_POST["operation"] == "Edit")
	{
		
		$statement = $connection->prepare(
			"UPDATE category 
			SET cat_name = :catname, remarks = :remark, flag = :active
			WHERE cat_id = :id
			"
		);
		$result = $statement->execute(
			array(
				':catname'	=>	$_POST["cat_name"],
				':remark'		=>	$_POST["remarks"],
				':active'	    =>	$_POST["active"],
				':id'			=>	$_POST["user_id"]
			)
		);
		if(!empty($result))
		{
			echo 'Category Updated';
		}
		else{
			echo 'Category Not Updated';
		}
	}
}

?>