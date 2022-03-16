<?php
include('db.php');
include('function.php');
if(isset($_POST["operation"]))
{
	if($_POST["operation"] == "Add")
	{
		
		$statement = $connection->prepare("
			INSERT INTO customer_country ( country_name, remarks, country_flag, create_by, create_date) VALUES ( :coupocode, :remark, :active, '1', Now())
		");
		$result = $statement->execute(
			array(
				':coupocode'	=>	$_POST["coupcode"],
				':remark'		=>	$_POST["remarks"],
				':active'	    =>	$_POST["active"]
			)
		);
		if(!empty($result))
		{
			echo 'Customer country Inserted';
		}
		else{
			echo 'Customer country Not Inserted';
		}
	}
	
	if($_POST["operation"] == "Edit")
	{
		
		$statement = $connection->prepare(
			"UPDATE customer_country 
			SET country_name=:coupocode, remarks = :remark, country_flag = :active
			WHERE ID = :id
			"
		);
		$result = $statement->execute(
			array(
				':coupocode'	=>	$_POST["coupcode"],
				':remark'		=>	$_POST["remarks"],
				':active'	    =>	$_POST["active"],
				':id'			=>	$_POST["user_id"]
			)
		);
		if(!empty($result))
		{
			echo 'Customer country Updated';
		}
		else{
			echo 'Customer country Not Updated';
		}
	}
}
?>