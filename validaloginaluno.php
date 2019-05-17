<?php
	include 'classes/conexao.php';
	include 'classes/aluno.php';

	$aluno = new Aluno();

	$aluno->setEmail($_POST['email']);
	$aluno->setSenha($_POST['senha']);

	$resultado = $aluno->Login($conexao);

	if (!$resultado) {
		header('location:index.php?op=auth_aluno');
	}else{
		session_start();
		$_SESSION['idaluno'] = $resultado;
		header('location:meuperfilaluno.php');

	}
?>