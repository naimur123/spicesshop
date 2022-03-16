<?php
include('db.php');
include('function.php');
if(isset($_POST["user_id"]))
{
	$output = array();
	$statement = $connection->prepare(
		"SELECT * FROM customer_country 
		WHERE ID = '".$_POST["user_id"]."' 
		LIMIT 1"
	);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
	
		$output["coupcode"] = $row["country_name"];
		$output["remarks"] = $row["remarks"];
		$output["active"] = $row["country_flag"];
		
	}
	echo json_encode($output);
}
?>