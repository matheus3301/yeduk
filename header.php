
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

  <link rel="stylesheet" type="text/css" href="css/estilo.css">

</head>
 <!-- Modais -->

  <style type="text/css"> 
      .inputs{
        background-color: transparent;
        border: 2px solid #00d2ff;
        color: #fff;
      }
      .inputs::placeholder{
        color:dodgerblue;
      }
      .inputs:focus{
        background-color: transparent;
      }
      #modal-mensagem{
        width:100% !important;
        border-radius: 10px;
      }
      
  </style>

</head>
<?php
if (isset($_GET ['op']) && $_GET['op'] == "login_prof" || isset($_GET ['op']) && $_GET['op'] == "auth_prof" || isset($_GET ['op']) && $_GET['op'] == "exit_professor" || isset($_GET ['op']) && $_GET['op'] == "logar_professor") {
    ?>
   <body onload="prof.click();">
  <?php }else{ 
  if (isset($_GET ['op']) && $_GET['op'] == "login_aluno" || isset($_GET ['op']) && $_GET['op'] == "auth_aluno" || isset($_GET ['op']) && $_GET['op'] == "exit_aluno" || isset($_GET ['op']) && $_GET['op'] == "logar_aluno") {
    ?>
   <body onload="aluno.click();">
  <?php }else{
    echo "<body>";
  }}?>






<div class="modal fade" id="modal-login-professor">
    <div class="modal-dialog" >
        <div class="modal-content">
            <div class="modal-header" style="background:linear-gradient(to right, #00d2ff,#3a7bd5);">
                 <h4 class="modal-title text-white"><img src="images/logo/logo.png">
                    Login Professor
                 </h4>
                 <button type="button" class="close" data-dismiss="modal"><span><i class="fas fa-times-circle text-white"></i></span></button>
             </div>
            <div class="modal-body">
              <?php 
                if (isset($_GET ['op']) && $_GET['op'] == "login_prof") {
                ?>
               <div class="alert alert-primary" role="alert">
                Professor Cadastrado com Sucesso! Faça seu primeiro login.
              </div>
              <?php } ?>

              <?php 
                if (isset($_GET ['op']) && $_GET['op'] == "logar_professor") {
                ?>
               <div class="alert alert-warning" role="alert">
                Primeiramente faça login!
              </div>
              <?php } ?> 

              <?php 
                if (isset($_GET ['op']) && $_GET['op'] == "exit_professor") {
                ?>
               <div class="alert alert-primary" role="alert">
                Obrigado pela sua contribuição à comunidade, até a proxima! ;)
              </div>
              <?php } ?> 

              <?php 
                if (isset($_GET ['op']) && $_GET['op'] == "auth_prof") {
                ?>
               <div class="alert alert-danger" role="alert">
                Login ou Senha incorretos, por favor tente novamente.
              </div>
              <?php } ?> 
                 <form  method="post" action="validaloginprof.php">
                  <div class="form-group">
                    <center><label for="exampleInputtext1"><img src="images/icon/classroom.png"></label></center>
                    <input  class="form-control inputs text-primary" id="inputs" aria-describedby="emailHelp" placeholder="Email" type="mail" name="email">
                   
                  </div>
                  <div class="form-group">
                     <center><label for="exampleInputPassword1" class=" lbls"></center>
                    <input type="password" class="form-control inputs text-primary" id="inputs" placeholder="Senha" name="senha">
                  </div>
                  
                  <button type="submit" class=" btn btn-block btn-outline-primary text-primary">Entrar</button>
                </form>
             </div>
            <div class="modal-footer" style="background:linear-gradient(to right, #00d2ff,#3a7bd5);">
                 <i class="fas fa-user-plus text-white"></i> <a href="cadastro_professor.php" class="text-white">Não é cadastrado?</a> |
                <i class="fas fa-question-circle text-white" ></i> <a href="#" class="text-white">Esqueceu a senha?</a>
            </div>
         </div>
     </div>
 </div>



  <style type="text/css"> 
      .inputs{
        background-color: transparent;
        border: 2px solid #00d2ff;
        color: #fff;
      }
      .inputs::placeholder{
        color:dodgerblue;
      }
      .inputs:focus{
        background-color: transparent;
      }
      #modal-mensagem{
        width:100% !important;
        border-radius: 10px;
      }
      
  </style>

</head>
<div class="modal fade" id="modal-mensagem">
    <div class="modal-dialog" >
        <div class="modal-content">
            <div class="modal-header" style="background:linear-gradient(to right, #00d2ff,#3a7bd5);">
                 <h4 class="modal-title text-white"><img src="images/logo/logo.png">
                    Login
                 </h4>
                 <button type="button" class="close" data-dismiss="modal"><span><i class="fas fa-times-circle text-white"></i></span></button>
             </div>
            <div class="modal-body"> 
               <?php 
                if (isset($_GET ['op']) && $_GET['op'] == "login_aluno") {
                ?>
               <div class="alert alert-primary" role="alert">
                Aluno Cadastrado com Sucesso! Faça seu primeiro login.
              </div>
              <?php } ?> 
              <?php 
                if (isset($_GET ['op']) && $_GET['op'] == "exit_aluno") {
                ?>
               <div class="alert alert-warning" role="alert">
                Tchau, até a próxima ;)
              </div>
              <?php } ?>

                 <?php 
                if (isset($_GET ['op']) && $_GET['op'] == "auth_aluno") {
                ?>
               <div class="alert alert-danger" role="alert">
                Login ou Senha incorretos, por favor tente novamente.
              </div>
              <?php } ?> 

              <?php 
                if (isset($_GET ['op']) && $_GET['op'] == "logar_aluno") {
                ?>
               <div class="alert alert-warning" role="alert">
                Primeiramente faça login! ;)
              </div>
              <?php } ?>
                 <form action="validaloginaluno.php" method="POST">
                  <div class="form-group">
                    <center><label for="exampleInputtext1"><img src="images/icon/teamwork.png"></label></center>
                    <input  class="form-control inputs text-primary" name="email" id="inputs" aria-describedby="emailHelp" placeholder="Email">
                   
                  </div>
                  <div class="form-group">
                     <center><label for="exampleInputPassword1" class=" lbls"></center>
                    <input type="password" name="senha" class="form-control inputs text-primary" id="inputs" placeholder="Senha">
                  </div>
                  
                  <button type="submit" class=" btn btn-block btn-outline-primary text-primary">Entrar</button>
                </form>
             </div>
            <div class="modal-footer" style="background:linear-gradient(to right, #00d2ff,#3a7bd5);">
                 <i class="fas fa-user-plus text-white"></i> <a href="cadastro.php" class="text-white">Cadastre-se</a> |
                <i class="fas fa-question-circle text-white" ></i> <a href="#" class="text-white">Esqueceu a senha?</a>
            </div>
         </div>
     </div>
 </div>



  <!-- preloader start -->
  <div class="preloader">
    <img src="images/preloader.gif" alt="preloader">
  </div>
  <!-- preloader end -->

<!-- navigation -->
<div class="naviagtion fixed-top transition">
  <div class="container">
    <nav class="navbar navbar-expand-lg navbar-dark p-0">
      <a class="navbar-brand p-0" href="index.php"><img src="images/logo/logo.png" alt="Yeduk"></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation"
        aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse text-center" id="navigation">
        <ul class="navbar-nav mx-auto">
          <li class="nav-item">
            <a class="nav-link text-white text-capitalize" href="index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white text-capitalize" href="team.php">Sobre</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white text-capitalize" href="cadastro.php">Cadastre-se</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white text-capitalize" href="turmas.php">Turmas</a>
           <li class="nav-item">
            <a href="#" class="nav-link text-white text-capitalize" data-toggle="modal" data-target="#modal-login-professor" id="prof">Sou um professor</a>
          </li>

          
          
         
        </ul>
        <button class="btn btn btn-outline-primary text-white ml-3" data-toggle="modal" data-target="#modal-mensagem" id="aluno">Login</button>
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
