<?php
session_start();

include '../classes/conexao.php';
include '../classes/admin.php';



$admin = new admin();

$admin->setId($_SESSION['idadmin']);

$admin->setNome($_POST['nome']);
$admin->setEmail($_POST['email']);

$admin->Alterar($conexao);

header('location:../restrito/perfiladmin.php?op=alterado');




?>