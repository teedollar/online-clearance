<?php
//require_once "../../class/Admin";
//@session_start();

$conn = new mysqli('localhost', 'root', '', 'onlineclearance');


$pre_section = "";
//getting the name of the appropriate table
if($_POST['pre_section_list'] == 1)
{
	$pre_section = "faculty";
}
if($_POST['pre_section_list'] == 2)
{
	$pre_section = "department";
}
if($_POST['pre_section_list'] == 3)
{
	$pre_section = "hall";
}
if($_POST['pre_section_list'] == 4)
{
	$pre_section = "section";
}

$output = '';
$result = $conn->query("SELECT id, name FROM ".$pre_section);

while($row = $result->fetch_array())
{
	$output.= '<option value="'.$row['id'].'">'.$row['name'].'</option>';
}

echo $output;
?>

