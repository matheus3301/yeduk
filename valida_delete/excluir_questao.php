<?php 
include '../classes/conexao.php';
include '../classes/questao.php';

$evento = new Questao();

$evento->setId($_GET['id']);


$evento->Excluir($conexao);

header('location:../turmaprofessor.php?id='.$_GET['idT']);



?>