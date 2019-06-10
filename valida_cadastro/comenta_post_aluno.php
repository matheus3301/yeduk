<?php 
	
include '../classes/conexao.php';
include '../classes/comentario.php';

$comentario = new Comentario();

$comentario->setComentario($_POST['comentario']);
$comentario->setId_aluno($_POST['idAluno']);
$comentario->setId_post($_POST['idPost']);




echo $comentario->getComentario()."<br>";
echo $comentario->getId_aluno()."<br>";
echo $comentario->getId_aluno()."<br>";

$comentario->ComentarPostAluno($conexao);


header('location:../turmaaluno.php?idTurma='.$_GET['idT']);


 ?>