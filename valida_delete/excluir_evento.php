<?php 
include '../classes/conexao.php';
include '../classes/evento.php';

$evento = new Evento();

$evento->setId($_GET['id']);


$evento->Excluir($conexao);

header('location:../turmaprofessor.php?id='.$_GET['idT']);



?>