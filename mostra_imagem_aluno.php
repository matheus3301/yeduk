<?php 
include 'classes/conexao.php';
include 'classes/aluno.php';
session_start();
//



if (isset($_GET['idAluno'])) {
	$id = $_GET['idAluno'];
}else{
	$id = $_SESSION['idaluno'];
}
//echo $id;
$aluno = new Aluno();

$aluno->setId($id);
$aluno->CapturarAluno($conexao);

header("Content-type:".$aluno->getTipo_imagem());

echo $aluno->getImagem();

 ?>