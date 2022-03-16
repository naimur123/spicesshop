<?php
include('db.php');
include('function.php');
if(isset($_POST["user_id"]))
{
	$output = array();
	$statement = $connection->prepare(
		"SELECT * FROM products WHERE id = '".$_POST["user_id"]."' LIMIT 1"
	);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		$output["item_name"] = $row["products_name"];
		$output["company_name"] = $row["company_name"];
		$output["itemdesc"] = $row["description"];
		$output["scatname"] = $row["products_category"];
		$output["subcatname"] = $row["prdsubcategory"];
		$output["slquantity"] = $row["quantity"];
		$output["item_price"] = $row["price"];
		$output["active"] = $row["status"];
		
		if($row["name"] != '')
		{
			$output['user_image'] = '<img src="'.$row["name"].'" class="img-thumbnail" width="50" height="35" /><input type="hidden" name="hidden_user_image" value="'.$row["name"].'" />';
		}
		else
		{
			$output['user_image'] = '<input type="hidden" name="hidden_user_image" value="" />';
		}
	}
	echo json_encode($output);
}
?>