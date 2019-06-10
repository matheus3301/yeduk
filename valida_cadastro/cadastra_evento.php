<?php

include '../classes/conexao.php';
include '../classes/evento.php';


$evento = new Evento();
$evento->setTitulo($_POST['titulo']);
$evento->setData($_POST['data']);
$evento->setId_turma($_GET['idTurma']);




$evento->Cadastrar($conexao);

header('location:../turmaprofessor.php?op=cad_evento&id='.$_GET['idTurma']);


?>