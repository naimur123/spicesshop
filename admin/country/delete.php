<?php
include('db.php');
include("function.php");
if(isset($_POST["user_id"]))
{
	$statement = $connection->prepare(
		"DELETE FROM customer_country WHERE ID = :id"
	);
	$result = $statement->execute(
		array(
			':id'	=>	$_POST["user_id"]
		)
	);
	if(!empty($result))
	{
		echo 'Customer country Deleted';
	}
	else
	{
		echo 'Customer country Not Deleted';
	}
}
?>