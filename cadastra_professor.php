<?php

include 'classes/conexao.php';
include 'classes/professor.php';

$professor = new Professor();

$professor->setNome($_POST['nome']);
$professor->setData_nasc($_POST['nascimento']);
$professor->setCpf($_POST['cpf']);
$professor->setEmail($_POST['email']);
$professor->setEscolaridade($_POST['escolaridade']);
$professor->setSenha($_POST['senha']);

$professor->Cadastrar($conexao);

header('location:index.php?op=login_prof');


?>