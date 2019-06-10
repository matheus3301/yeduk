<?php 
include 'classes/conexao.php';
include 'classes/professor.php';
session_start();
$id = $_SESSION['idprof'];

if (!isset($_SESSION['idprof'])) {
  header('location:index.php?op=logar_professor');
}


$professor = new Professor();

$professor->setId($id);
$professor->CapturarProfessor($conexao);



?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="utf-8">
  <title>Yeduk - Turmas Online</title>
  <link rel="stylesheet" type="text/css" href="css/adminLTE.css">
  <link rel="stylesheet" href="css/AdminLTE.min.css">
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

  <link href="css/estilo.css" rel="stylesheet">


  <link href='fullcalendar/core/main.css' rel='stylesheet' />
  <link href='fullcalendar/daygrid/main.css' rel='stylesheet' />
  <script src='fullcalendar/core/locales/pt-br.js'></script>

  <script src='fullcalendar/core/main.js'></script>
  <script src='fullcalendar/daygrid/main.js'></script>

  <link href='fullcalendar/list/main.css' rel='stylesheet' />
  <script src='fullcalendar/list/main.js'></script>

  <link href='fullcalendar/timegrid/main.css' rel='stylesheet' />
  <script src='fullcalendar/timegrid/main.js'></script>

  
  <meta charset="utf-8">
  <style type="text/css">
  sup{
    font-size: 1em;
    color:#00fa9a;
    position: relative;
    top:2%;
  }
  .bt{
    border:none;
    border: 1px solid #00fa9a;
    width:30px;
    height:30px;
    border-radius: 40px;
    background-color: transparent;
  }
  .bt:hover{
    color: #009afa;
    -webkit-transform:scale(1.2); 
    transition:.4s linear;
  }
</style>

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
            <a class="nav-link text-white text-capitalize" href="minhasturmasprofessor.php">Minhas Turmas</a>
          </li>

          <li class="nav-item dropdown no-arrow mx-1 col-md-">
            <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-envelope fa-fw"></i>
              <!-- Counter - Messages -->
              <span class="badge badge-danger badge-counter">4</span>
            </a>
            <!-- Dropdown - Messages -->
            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="messagesDropdown" style="width:320px; border-radius:3px; font-size: 0.8em; ">
              <h6 class="dropdown-header">
                Message Center
              </h6>
              <a class="dropdown-item d-flex align-items-center" href="#">
                <div class="dropdown-list-image mr-3">
                  <img class="rounded-circle" src="https://source.unsplash.com/fn_BT9fwg_E/60x60" alt="">
                  <div class="status-indicator bg-success"></div>
                </div>
                <div class="font-weight-bold">
                  <div class="text-truncate">Solicitação Aceita! <i class="far fa-check-circle text-success fa-2x i2"></i></div>
                  <div class="small text-gray-500">Emily Fowler · 58m</div>
                </div>
              </a>
              <a class="dropdown-item d-flex align-items-center" href="#">
                <div class="dropdown-list-image mr-3">
                  <img class="rounded-circle" src="https://source.unsplash.com/fn_BT9fwg_E/60x60" alt="">
                  <div class="status-indicator"></div>
                </div>
                <div>
                  <div class="text-truncate">Solicitação Aceita <i class="far fa-check-circle text-success fa-2x i2"></i></div>
                  <div class="small text-gray-500">Jae Chun · 1d</div>
                </div>
              </a>
              <a class="dropdown-item d-flex align-items-center" href="#">
                <div class="dropdown-list-image mr-3">
                  <img class="rounded-circle" src="https://source.unsplash.com/fn_BT9fwg_E/60x60"  alt="">
                  <div class="status-indicator bg-warning"></div>
                </div>
                <div>
                  <div class="text-truncate">Solicitação Aceita <i class="far fa-check-circle text-success fa-2x i2"></i></div>
                  <div class="small text-gray-500">Morgan Alvarez · 2d</div>
                </div>
              </a>
              <a class="dropdown-item d-flex align-items-center" href="#">
                <div class="dropdown-list-image mr-3">
                  <img class="rounded-circle" src="https://source.unsplash.com/Mv9hjnEUHR4/60x60" alt="">
                  <div class="status-indicator bg-success"></div>
                </div>
                <div>
                  <div class="text-truncate">Solicitação Aceita <i class="far fa-check-circle text-success fa-2x i2"></i></div>
                  <div class="small text-gray-500">Chicken the Dog · 2w</div>
                </div>
              </a>
              <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>
            </div>
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
        <img src="images/logo/logo.png">  Sair
      </h4>
      <button type="button" class="close" data-dismiss="modal"><span><i class="fas fa-times-circle text-white"></i></span></button>
    </div>
    <div class="modal-body"> 

     <p>Você tem certeza que deseja sair da sua conta?</p>



   </div>
   <div class="modal-footer" >
     <a href="sair.php?tipo=professor" class="btn btn btn-primary text-white ml-3">Sair</a>
   </div>
 </div>
</div>
</div>


