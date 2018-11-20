<?php
	@session_start();

	if(isset($_SESSION['id'])){ 
		session_destroy();
		unset($_SESSION['id']);

		$url = "index.php";
		header("Location:$url");
	}

?>