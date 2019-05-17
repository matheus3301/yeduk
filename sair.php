<?php 
	session_start();
	unset($_SESSION['idprof']);
	unset($_SESSION['idaluno']);
	session_destroy();

	if ($_GET['tipo'] == "aluno") {
		header('location:index.php?op=exit_aluno');
	}else{
		if ($_GET['tipo'] == "professor") {
		header('location:index.php?op=exit_professor');
		}else{
			header('location:index.php');
		}
	}

	

	
	
	exit();
 ?>