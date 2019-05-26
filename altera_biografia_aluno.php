<?php 
session_start();

include 'classes/conexao.php';
include 'classes/aluno.php';


$aluno = new aluno();

$aluno->setId($_SESSION['idaluno']);

$aluno->setBiografia($_POST['bio']);
print_r($aluno);

$aluno->AlterarBiografia($conexao);

header('location:meuperfilaluno.php?op=alterado');



 ?>