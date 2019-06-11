<?php

include '../classes/conexao.php';
include '../classes/aluno.php';


$aluno = new Aluno();

$aluno->setNome($_POST['nome']);
$aluno->setData_nasc($_POST['nascimento']);
$aluno->setEmail($_POST['email']);
$aluno->setEscolaridade($_POST['escolaridade']);
$aluno->setSenha($_POST['senha']);

$aluno->Cadastrar($conexao);

header('location:../index.php?op=login_aluno');


?>