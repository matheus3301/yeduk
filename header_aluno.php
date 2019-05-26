<?php 
   session_start();
    $id = $_SESSION['idaluno'];
    include 'classes/aluno.php';
    include 'classes/conexao.php';


    if (!isset($_SESSION['idaluno'])) {
      header('location:index.php?op=logar_aluno');
  } 

    $aluno = new Aluno();

    $aluno->setId($id);
    $aluno->CapturarAluno($conexao);

 ?>
<!DOCTYPE html>
<html lang="pt-BR">

    <head>
        <meta charset="utf-8">
        <title>Yeduk - Turmas Online</title>

        <!-- mobile responsive meta -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

        <!-- ** Plugins Needed for the Project ** -->
        <!-- font-awesome -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
        <!-- Bootstrap -->
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <!-- venobox -->
        <link rel="stylesheet" href="css/venobox.css">
        <!-- slick -->
        <link rel="stylesheet" href="css/slick.css">

        <!-- Main Stylesheet -->
        <link href="css/style.css" rel="stylesheet">

        <!--Favicon-->
        <link rel="icon" href="images/icon/logo (2).png">

        <style type="text/css">

        </style>
        <meta charset="utf-8">

    </head>

    <body>
        <!-- preloader start --> 
       
        <!-- preloader end -->

        <!-- navigation -->
        <div class="naviagtion fixed-top transition">
            <div class="container">
                <nav class="navbar navbar-expand-lg navbar-dark p-0">
                    <a class="navbar-brand p-0" href="meuperfilprofessor.php"><img src="images/logo/logo.png" alt="Yeduk"></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation"
                            aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse text-center" id="navigation">
                        <ul class="navbar-nav mx-auto">
                            <li class="nav-item">
                                <a class="nav-link text-white text-capitalize" href="meuperfilaluno.php">Perfil</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white text-capitalize" href="#">Minhas Turmas</a>
                            </li>
                              <li class="nav-item">
                                <a class="nav-link text-white text-capitalize" href="buscarturmasaluno.php">Buscar Turmas</a>
                            </li>





                        </ul>
                        <button class="btn btn btn-outline-primary text-white ml-3" data-toggle="modal" data-target="#modal-sair" id="aluno">Sair</button>
                    </div>
                </nav>
            </div>
        </div>


<div class="modal fade" id="modal-sair">
    <div class="modal-dialog" >
        <div class="modal-content">
            <div class="modal-header" style="background:linear-gradient(to right, #00d2ff,#3a7bd5);">
                 <h4 class="modal-title text-white">
                    Sair
                 </h4>
                 <button type="button" class="close" data-dismiss="modal"><span><i class="fas fa-times-circle text-white"></i></span></button>
             </div>
            <div class="modal-body"> 
                 
                 <p>Você tem certeza que deseja sair da sua conta?</p>
                 


             </div>
            <div class="modal-footer" style="background:linear-gradient(to right, #00d2ff,#3a7bd5);">
                 <a href="sair.php?tipo=aluno" class="btn btn btn-outline-primary text-white ml-3">Sair</a>
            </div>
         </div>
     </div>
 </div>
        
