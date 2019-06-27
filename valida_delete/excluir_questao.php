<?php 
include '../classes/conexao.php';
include '../classes/questao.php';

$questao = new Questao();

$questao->setId($_GET['id']);


 $questao->Excluir($conexao);



header('location:../turmaprofessor.php?id='.$_GET['idT']);



?>