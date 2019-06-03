<?php
    include '../classes/conexao.php';
    include '../classes/aluno.php';

    $imagem = $_FILES['imagem']['tmp_name'];
    $tamanho = $_FILES['imagem']['size'];
    $tipo = $_FILES['imagem']['type'];
    $nome = $_FILES['imagem']['name'];


    session_start();
    $professor = new Aluno();
    $professor->setId($_SESSION['idaluno']);




    if ( $imagem != "none" )
    {
      $fp = fopen($imagem, "rb");
      $conteudo = fread($fp, $tamanho);
      $conteudo = addslashes($conteudo);
      

      $professor->setNome_imagem($nome);
      $professor->setTipo_imagem($tipo);
      $professor->setTamanho_imagem($tamanho);
      $professor->setImagem($conteudo);

      $professor->AlterarFoto($conexao);
      
     

  }

    


    header('location:../meuperfilaluno.php?op=img');
  ?>