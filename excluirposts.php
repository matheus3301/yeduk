<?php

include 'classes/conexao.php';
include 'classes/posts.php';


$turma = new Posts();
$turma->setId_turma($_GET['idT']);

$id_post = $_GET['id'];
$turma->setId($id_post);

$turma->ExcluirPostagem($conexao);

header('location:turmaprofessor.php?op=postexcluido&id='.$turma->getId_turma());







?>