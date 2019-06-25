<?php 
include '../classes/conexao.php';
include '../classes/admin.php';
session_start();
//



if (isset($_GET['idadmin'])) {
	$id = $_GET['idadmin'];
}else{
	$id = $_SESSION['idadminadmin'];
}
//echo $id;
$admin = new Admin();

$admin->setId($id);
$admin->CapturarAluno($conexao);

header("Content-type:".$admin->getTipo_imagem());

echo $admin->getImagem();

 ?>