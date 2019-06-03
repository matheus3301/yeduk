<?php 
session_start();

include '../classes/conexao.php';
include '../classes/professor.php';


$professor = new Professor();

$professor->setId($_SESSION['idprof']);

$professor->setBiografia($_POST['bio']);
print_r($professor);

$professor->AlterarBiografia($conexao);

header('location:../meuperfilprofessor.php?op=alterado');



 ?>