<?php
include('db.php');
include("function.php");
if(isset($_POST["user_id"]))
{
	$statement = $connection->prepare(
		"DELETE FROM customer_district WHERE id = :id"
	);
	$result = $statement->execute(
		array(
			':id'	=>	$_POST["user_id"]
		)
	);
	if(!empty($result))
	{
		echo 'Customer District Deleted';
	}
	else
	{
		echo 'Customer District Not Deleted';
	}
}
?>