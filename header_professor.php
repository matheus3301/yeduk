<?php 
   session_start();
  $id = $_SESSION['idprof'];
   $professor = new Professor();

    $professor->setId($id);
    $professor->CapturarProfessor($conexao);

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
                                <a class="nav-link text-white text-capitalize" href="meuperfilprofessor.php">Perfil</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white text-capitalize" href="consultar_turmas.php">Minhas Turmas</a>
                            </li>
                              <li class="nav-item">
                                <a class="nav-link text-white text-capitalize" href="cadastro_turmas.php">Cadastrar Turmas</a>
                            </li>





                        </ul>
                        <a href="sair.php"><button class="btn btn btn-outline-primary text-white ml-3">Sair</button></a>
                    </div>
                </nav>
            </div>
        </div>
        <?php
        include 'modal_login.php';
        ?>
        <?php
        include 'modal_login_professor.php';
        ?>
