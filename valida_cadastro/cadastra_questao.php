<?php

include '../classes/conexao.php';
include '../classes/questao.php';


$questao= new Questao();
$questao->setId_turma($_GET['idTurma']);
$questao->setEnunciado($_POST['enunciado']);
$questao->setItemCerto($_POST['itemCerto']);


$questao->setItem1($_POST['itemA']);

$questao->setItem2($_POST['itemB']);

$questao->setItem3($_POST['itemC']);

$questao->setItem4($_POST['itemD']);

$questao->setItem5($_POST['itemE']);



$questao->Cadastrar($conexao);

header('location:../turmaprofessor.php?op=cad_questao&id='.$_GET['idTurma']);


?>