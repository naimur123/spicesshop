

<?php
include('db.php');
include('function_customer.php');
$query = '';
$output = array();
$query .= "SELECT * FROM customer_registration";

if($_POST["length"] != -1)
{
	$query .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}
$statement = $connection->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
$data = array();
$filtered_rows = $statement->rowCount();
foreach($result as $row)
{
	$sub_array = array();
	$sub_array[] = $row["id"];
	$sub_array[] = $row["full_name"];
	$sub_array[] = $row["email"];
	$sub_array[] = $row["phone"];
	$sub_array[] = $row["address"];
	$sub_array[] = '<button type="button" name="update" id="'.$row["id"].'" class="btn btn-warning btn-xs update">Update</button>';
	
	$data[] = $sub_array;
}
$output = array(
	"draw"				=>	intval($_POST["draw"]),
	"recordsTotal"		=> 	$filtered_rows,
	"recordsFiltered"	=>	get_total_all_records(),
	"data"				=>	$data
);
echo json_encode($output);

?>