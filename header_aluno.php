<?php 

$id = $_SESSION['idaluno'];
include 'classes/aluno.php';
include 'classes/conexao.php';

if (!isset($_SESSION['idaluno'])) {
  header('location:index.php?op=logar_aluno');
} 

$aluno = new Aluno();

$aluno->setId($id);
$aluno->CapturarAluno($conexao);

$notificacoes = $aluno->ListarMatriculasLimitado($conexao);


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
  <!-- font-awesome
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
  Bootstrap -->

  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <!-- venobox -->
  <link rel="stylesheet" href="css/venobox.css">
  <!-- slick -->
  <link rel="stylesheet" href="css/slick.css">

  <!-- Main Stylesheet -->
  <link href="css/style.css" rel="stylesheet">

  <!--Favicon-->
  <link rel="icon" href="images/icon/logo (2).png">

  <link rel="stylesheet" type="text/css" href="css/estilo.css">
  <meta charset="utf-8">

  
  <link href='fullcalendar/core/main.css' rel='stylesheet' />
  <link href='fullcalendar/daygrid/main.css' rel='stylesheet' />
  <script src='fullcalendar/core/locales/pt-br.js'></script>

  <script src='fullcalendar/core/main.js'></script>
  <script src='fullcalendar/daygrid/main.js'></script>

  <link href='fullcalendar/list/main.css' rel='stylesheet' />
  <script src='fullcalendar/list/main.js'></script>

  <link href='fullcalendar/timegrid/main.css' rel='stylesheet' />
  <script src='fullcalendar/timegrid/main.js'></script>
</head>

<body>
  <script src="js/jquery.min.js"></script>
  <!-- preloader start --> 

  <!-- preloader end -->

  <!-- navigation -->
  <div class="naviagtion fixed-top transition">
    <div class="container">
      <nav class="navbar navbar-expand-lg navbar-dark p-0">
        <a class="navbar-brand p-0" href="meuperfilaluno.php"><img src="images/logo/logo.png" alt="Yeduk"></a>
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
            <a class="nav-link text-white text-capitalize" href="minhasturmasaluno.php">Minhas Turmas</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white text-capitalize" href="buscarturmasaluno.php">Buscar Turmas</a>
          </li>




          <li class="nav-item dropdown no-arrow mx-1 col-md-">
            <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-envelope fa-fw"></i>
              <!-- Counter - Messages -->
              <span class="badge badge-danger badge-counter">7</span>
            </a>
            <!-- Dropdown - Messages -->
            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="messagesDropdown" style="width:500px; border-radius:3px; font-size: 0.8em; ">
              <h6 class="dropdown-header">
                Notificações
              </h6>

              <?php 


              foreach ($notificacoes as $notifi) {

                if ($notifi[3] == "Aprovado") {
                  $classe = "far fa-check-circle text-success fa-2x i2";
                }
                if ($notifi[3] == "Reprovado") {
                  $classe = "far fa-times-circle text-danger fa-2x i2";
                }
                if ($notifi[3] == "Pendente") {
                  $classe = "far fa-check-circle text-warning fa-2x i2";
                }
                ?>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="dropdown-list-image mr-3">

                  </div>
                  <div class="font-weight-bold">
                    <div class="text-truncate">Solicitação Aceita! <i class="<?php echo($classe); ?>"></i></div>
                    <div class="small text-gray-500">Emily Fowler · 58m</div>
                  </div>
                </a>



                <?php 
              }
              ?>


              <a class="dropdown-item text-center small text-gray-500" href="notificacoesaluno.php">Ler Todas Notificações</a>
            </div>
          </li>
        </ul>
        <li class="nav-item dropdown no-arrow mx-1 col-md-" style="list-style: none;">
          <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
           <span class="text-white"> <?php 
           if ($aluno->getImagem() != null) {
             ?>
             <img src="mostra_imagem_aluno.php" class="img-pequena">


             <?php 



           }else{
            ?>
            <img src="images/icon/man.png" class="img-pequena" >


            <?php 
          }


          ?><?php echo  $aluno->getNome(); ?></span>
          <!-- Counter - Messages -->

        </a>
        <!-- Dropdown - Messages -->
        <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in text" aria-labelledby="messagesDropdown" style="width:200px; border-radius:3px; font-size: 0.8em; ">         
          <a class="dropdown-item d-flex align-items-center" data-toggle="modal" data-target="#modal-sair" style="font-size: 1.3em;"><i class="fas fa-sign-out-alt mr-3 text-primary"></i>   Sair</a>         
        </div>
      </li>
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
   <div class="modal-footer">
     <a href="sair.php?tipo=aluno" class="btn btn btn-primary text-white ml-3">Sair</a>
   </div>
 </div>
</div>
</div>

