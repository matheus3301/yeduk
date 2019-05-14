<?php 
	session_start();
	unset($_SESSION['idprof']);
	session_destroy();

	header('location:index.php');
	
	exit();
 ?>