<?php
//require_once "../../class/Admin";
//@session_start();

$conn = new mysqli("localhost", "root", "", "onlineclearance");
if($conn->connect_error) die ($conn->connect_error);

$output = ''; 
$result = $conn->query("SELECT id, name FROM department WHERE fac_id = ".$_POST['facID']);

//$output = '<option value="">Select a department</option>';
while($row = mysqli_fetch_array($result))
{
	$output .= '<option value="'.$row['id'].'">'.$row['name'].'</option>';
}

echo $output;
?>