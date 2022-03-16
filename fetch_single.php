<?php
include('db.php');
include('function.php');
if(isset($_POST["user_id"]))
{
	$output = array();
	$statement = $connection->prepare(
		"SELECT * FROM category 
		WHERE cat_id = '".$_POST["user_id"]."' 
		LIMIT 1"
	);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
	
	
	
		$output["cat_name"] = $row["cat_name"];
		$output["remarks"] = $row["remarks"];
		$output["active"] = $row["flag"];
		
	}
	echo json_encode($output);
}
?>