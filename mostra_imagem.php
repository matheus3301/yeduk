<?php 
include 'classes/conexao.php';
include 'classes/professor.php';
session_start();

$professor = new Professor();


if (isset($_GET['idProf'])) {
	$id = $_GET['idProf'];
	
}else{
	$id = $_SESSION['idprof'];

}

$professor->setId($id);


$professor->CapturarProfessor($conexao);


header("Content-type:".$professor->getTipo_imagem());

echo $professor->getImagem();


 ?>