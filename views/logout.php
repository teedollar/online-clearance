<?php
	@session_start();

	if((isset($_SESSION['stud_id'])) || (isset($_SESSION['staff_id'])) ){
		session_destroy();
		unset($_SESSION['stud_id']);
		unset($_SESSION['staff_id']);

		$url = "index.php";
		header("Location:$url");
	}

?>