<?php
    include '../classes/conexao.php';
    include '../classes/admin.php';

    $imagem = $_FILES['imagem']['tmp_name'];
    $tamanho = $_FILES['imagem']['size'];
    $tipo = $_FILES['imagem']['type'];
    $nome = $_FILES['imagem']['name'];


    session_start();
    $admin = new admin();
    $admin->setId($_SESSION['idadmin']);




    if ( $imagem != "none" )
    {
      $fp = fopen($imagem, "rb");
      $conteudo = fread($fp, $tamanho);
      $conteudo = addslashes($conteudo);
      

      $admin->setNome_imagem($nome);
      $admin->setTipo_imagem($tipo);
      $admin->setTamanho_imagem($tamanho);
      $admin->setImagem($conteudo);

      $admin->AlterarFoto($conexao);
      
     

  }

    


    header('location:../restrito/perfiladmin.php?op=img');
  ?>