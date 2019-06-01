<?php 
	include 'classes/matricula.php';
	include 'classes/conexao.php';

	$matricula = new Matricula();

	$turma = $_GET['idTurma'];
	$matricula->setId($_GET['idMatricula']);

	

	if ($_POST['op'] == 'aceita') {
		$matricula->AprovarAplicacao($conexao);
	}

	if ($_POST['op'] == 'recusa') {
		$matricula->RecusarAplicacao($conexao);
	}

	header('location:turmaprofessor.php?id='.$turma."#profile");
 ?>