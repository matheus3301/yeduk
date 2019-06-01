<?php 
include 'classes/conexao.php';
include 'classes/professor.php';
session_start();
$id = $_SESSION['idprof'];
$professor = new Professor();

$professor->setId($id);
$professor->CapturarProfessor($conexao);


header("Content-type:".$professor->getTipo_imagem());

echo $professor->getImagem();


 ?>