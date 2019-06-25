<?php
	include 'classes/conexao.php';
	include 'classes/admin.php';

	$admin = new Admin();

	$admin->setEmail($_POST['email']);
	$admin->setSenha($_POST['senha']);

	$resultado = $admin->Login($conexao);

	if (!$resultado) {
		header('location:restrito/loginrestrito.php?op=auth_admin');
	}else{
		session_start();
		$_SESSION['idadmin'] = $resultado;
		echo "Foi";
		header('location:restrito/restrito.php');

	}
?>