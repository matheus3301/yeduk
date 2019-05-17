<?php

  include 'classes/conexao.php';
  include 'classes/professor.php';
  include 'classes/turmas.php';

  session_start();
  $id = $_SESSION['idprof'];
   $professor = new Professor();

    $professor->setId($id);
    $professor->CapturarProfessor($conexao);

$turmas = new Turmas();

$turmas->setNome($_POST['nome']);
$turmas->setDescricao($_POST['descricao']);
$turmas->setId_professor($id);



$turmas->Cadastrar($conexao);

header('location:consultar_turmas.php?cad=true');




?>