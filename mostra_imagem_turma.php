<?php 
include 'classes/conexao.php';
include 'classes/turma.php';

$id = $_GET['idTurma'];

$aluno = new Turma();

$aluno->setId($id);
$aluno->CapturarTurma($conexao);

//header("Content-type:".$aluno->getTipo_imagem());

//echo $aluno->getImagem();

echo '<img src="data:'.$aluno->getTipo_imagem().';base64,'.base64_encode( $aluno->getImagem() ).'"/>';

 ?>