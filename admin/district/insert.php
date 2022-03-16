<?php
include('db.php');
include('function.php');
if(isset($_POST["operation"]))
{
	if($_POST["operation"] == "Add")
	{
		
		$statement = $connection->prepare("
			INSERT INTO customer_district ( district_name, remarks, district_flag, create_by, create_date) VALUES ( :coupocode, :remark, :active, '1', Now())
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
			echo 'Customer District Inserted';
		}
		else{
			echo 'Customer District Not Inserted';
		}
	}
	
	if($_POST["operation"] == "Edit")
	{
		
		$statement = $connection->prepare(
			"UPDATE customer_district 
			SET district_name=:coupocode, remarks = :remark, district_flag = :active
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
			echo 'Customer District Updated';
		}
		else{
			echo 'Customer District Not Updated';
		}
	}
}
?>