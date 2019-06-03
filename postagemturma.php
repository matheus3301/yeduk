<?php

include 'classes/conexao.php';
include 'classes/posts.php';


$turma = new Posts();

$turma->setTitulo($_POST['titulo']);
$turma->setPost($_POST['publicacao']);
$turma->setId_turma($_GET['idTurma']);

$turma->Postar($conexao);

header('location:turmaprofessor.php?op=novapostagem&id='.$turma->getId_turma());


?>