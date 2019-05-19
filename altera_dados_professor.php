<?php
session_start();

include 'classes/conexao.php';
include 'classes/professor.php';



$professor = new Professor();

$professor->setId($_SESSION['idprof']);

$professor->setNome($_POST['nome']);
$professor->setData_nasc($_POST['data_nasc']);
$professor->setCpf($_POST['cpf']);
$professor->setEscolaridade($_POST['escolaridade']);

print_r($professor) ;

$professor->Alterar($conexao);

header('location:meuperfilprofessor.php?op=alterado');




?>