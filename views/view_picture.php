<?php
require_once "../public/staffheader.php";

$file_id = $_GET['p_id'];
$stud_id = $_GET['s_id'];

$file = $staff_object->select_file($file_id);

?>

<br><br><br>
<div class="container">
	<div class="row">
		<div class="col-md-3"></div>
		<div class="col-md-7">
			<img src="<?php echo $file['file'] ?>" class="img-responsive" width="500" height="900">
		</div>
		<div class="col-md-2">
		</div>
	</div>
</div>
<br><br>

<?php
require_once "../public/footer.php";
?>