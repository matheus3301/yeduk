<?php 
	include '../classes/conexao.php';
	include '../classes/questao.php';



	$questao = new Questao();

	$questao->setId($_GET['id']);




	$questao->setEnunciado($_POST['enunciado']);
	$questao->setItemCerto($_POST['itemCerto']);
	$questao->setItem1($_POST['itemA']);
	$questao->setItem2($_POST['itemB']);
	$questao->setItem3($_POST['itemC']);
	$questao->setItem4($_POST['itemD']);
	$questao->setItem5($_POST['itemE']);




	$questao->Alterar($conexao);

	header('location:../turmaprofessor.php?id='.$_GET['idT']);
	


 ?>