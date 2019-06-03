<?php


include '../classes/conexao.php';
include '../classes/turma.php';



$turma = new turma();

$turma->setId($_GET['id']);

$turma->setNome($_POST['nome']);
$turma->setDescricao($_POST['descricao']);

$turma->Alterar($conexao);
header('location:../turmaprofessor.php?id='.$turma->getId());





?>