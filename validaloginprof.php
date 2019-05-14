<?php 
	include 'classes/conexao.php';
	include 'classes/professor.php';

	$professor = new Professor();

	$professor->setEmail($_POST['email']);
	$professor->setSenha($_POST['senha']);

	$resultado = $professor->Login($conexao);

	if (!$resultado) {
		header('location:index.php?op=auth_prof');
	}else{
		session_start();
		$_SESSION['idprof'] = $resultado;
		echo "Foi";
		header('location:meuperfilprofessor.php');

	}

 ?>