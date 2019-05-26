<?php
session_start();

include 'classes/conexao.php';
include 'classes/aluno.php';



$aluno = new aluno();

$aluno->setId($_SESSION['idaluno']);

$aluno->setNome($_POST['nome']);
$aluno->setData_nasc($_POST['data_nasc']);
$aluno->setEscolaridade($_POST['escolaridade']);

$aluno->Alterar($conexao);

header('location:meuperfilaluno.php?op=alterado');




?>