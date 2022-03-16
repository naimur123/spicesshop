<?php
include('db.php');
include('function_customer.php');
if(isset($_POST["user_id"]))
{
	$output = array();
	$statement = $connection->prepare(
		"SELECT * FROM customer_registration 
		WHERE id = '".$_POST["user_id"]."' 
		LIMIT 1"
	);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
	
	
	
		$output["phone"] = $row["phone"];
		$output["address"] = $row["address"];

		
	}
	echo json_encode($output);
}


?>

