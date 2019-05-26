<?php 
include 'classes/aluno.php';
include 'classes/conexao.php';

$aluno = new Aluno();
session_start();
$aluno->setId($_SESSION['idaluno']);


if (isset($_GET['idTurma'])) {
	$res =  $aluno->AplicarTurma($conexao,$_GET['idTurma']);
}

if ($res) {
	header('location:buscarturmasaluno.php?op=aplicou');
}else{
	header('location:buscarturmasaluno.php?op=erroaplicou');
}

?>