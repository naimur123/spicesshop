<?php
include('db.php');
include('function_customer.php');

if(isset($_POST["operation"]))
{
	if($_POST["operation"] == "Edit")
	{
		
		$statement = $connection->prepare(
			"UPDATE customer_registration 
			SET phone = :phonenum, address = :addressnum
			WHERE id = :id
			"
		);
		$result = $statement->execute(
			array(
				':phonenum'			=>	$_POST["phone"],
				':addressnum'		=>	$_POST["address"],
				':id'			=>	$_POST["user_id"]
			)
		);
		if(!empty($result))
		{
			echo 'My Profile Updated';
		}
		else{
			echo 'My Profile Not Updated';
		}
	}
}

?>