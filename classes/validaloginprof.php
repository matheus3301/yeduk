<?php 
	include 'conexao.php';
	include 'professor.php';

	$professor = new Professor();

	$professor->setEmail($_POST['email']);
	$professor->setSenha($_POST['senha']);

	$professor->Login($conexao);

 ?>