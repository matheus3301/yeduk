<?php 
include 'classes/conexao.php';
include 'classes/turma.php';
session_start();
$id = $_GET['idTurma'];
$turma = new Turma();

$turma->setId($id);
$turma->CapturarTurma($conexao);


header("Content-type:".$turma->getTipo_imagem());

echo $turma->getImagem();


 ?>