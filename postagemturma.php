<?php

include 'classes/conexao.php';
include 'classes/posts.php';


$turma = new Posts();

$turma->setTitulo($_POST['titulo']);
$turma->setPost($_POST['publicacao']);
$turma->setId_turma($_GET['idTurma']);

$imagem = $_FILES['imagem']['tmp_name'];
$tamanho = $_FILES['imagem']['size'];
$tipo = $_FILES['imagem']['type'];
$nome = $_FILES['imagem']['name'];

if ( $imagem != "none") {
	
      $fp = fopen($imagem, "rb");
      $conteudo = fread($fp, $tamanho);
      $conteudo = addslashes($conteudo);
      

      $turma->setNome_imagem($nome);
      $turma->setTipo_imagem($tipo);
      $turma->setTamanho_imagem($tamanho);
      $turma->setImagem($conteudo);

      $turma->PostarComFoto($conexao);
}else{
	$turma->Postar($conexao);
}



header('location:turmaprofessor.php?op=novapostagem&id='.$turma->getId_turma());


?>