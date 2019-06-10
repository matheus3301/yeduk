<?php 
	include '../classes/conexao.php';
	include '../classes/evento.php';



	$evento = new Evento();

	$evento->setId($_GET['idE']);



	$evento->setTitulo($_POST['titulo']);
	$evento->setData($_POST['data']);










	$evento->Alterar($conexao);

	header('location:../turmaprofessor.php?id='.$_GET['idTurma']);
	


 ?>