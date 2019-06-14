<?php 
	
include '../classes/conexao.php';
include '../classes/comentario.php';

$comentario = new Comentario();

$comentario->setComentario($_POST['comentario']);
$comentario->setId_professor($_POST['idProfessor']);
$comentario->setId_post($_POST['idPost']);

$redir = '#comentar';


echo $comentario->getComentario()."<br>";


$comentario->ComentarPostProfessor($conexao);


header('location:../turmaprofessor.php?id='.$_GET['idT']);


 ?>