<?php 
session_start();
include '../classes/conexao.php';
include'../classes/admin.php';
$id = $_SESSION['idadmin'];

if (!isset($_SESSION['idadmin'])) {
  header('location:loginrestrito.php?op=logar_admin');
}

$admin = new Admin();

$admin->setId($id);

$admin->CapturarAdmin($conexao);


?>


<!DOCTYPE html>
<html lang="en">

<head>
  <style type="text/css">
</style>
<style type="text/css">

</style>

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="author" content="">

<title>Registros - Yeduk</title>

<!-- Custom styles for this template-->
<link href="css/sb-admin-2.min.css" rel="stylesheet">
<link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
<link rel="icon" href="../images/icon/logo (2).png">
<link rel="stylesheet" type="text/css" href="css/estilo.css">
<link href="../css/style.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="../css/estilo.css">
<link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css">
<!-- Font Awesome -->

<!-- Ionicons -->
<!-- DataTables -->
<link rel="stylesheet" href="css/dataTables.bootstrap.css">
<!-- Theme style -->

    <!-- AdminLTE Skins. Choose a skin from the css/skins
     folder instead of downloading all of them to reduce the load. -->

   </head>

   <body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

      <!-- Sidebar -->
      <ul class="navbar-nav nav sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
          <div class="sidebar-brand-icon ">
           <img src="../images/icon/logo (2).png" width="40px" height="40px">
         </div>
         <div class="sidebar-brand-text mx-3">Yeduk</div>
       </a>

       <!-- Divider -->
       <hr class="sidebar-divider my-0">

       <!-- Nav Item - Dashboard -->
       <li class="nav-item">
        <a class="nav-link" href="restrito.php">
          <i class="fas fa-user-graduate"></i>
          <span><strong>Alunos</strong></span></a>
        </li>

        <!-- Divider -->
        
        <!-- Heading -->


        <li class="nav-item">
          <a class="nav-link" href="consultaprofessores.php">
           <i class="fas fa-chalkboard-teacher"></i>
           <strong>Professores</strong></a>
         </li>

         <!-- Nav Item - Utilities Collapse Menu -->
         <li class="nav-item">
          <a class="nav-link" href="consultarturmas.php">
            <i class="fas fa-users"></i>
            <span><strong>Turmas</strong></span></a>
          </li>
          <!-- Divider -->
          <hr class="sidebar-divider">
          <!-- Nav Item - Tables -->
          <li class="nav-item">
            <a class="nav-link" href="sair.php">
              <i class="fa fa-sign-out"></i>
              <strong>Sair</strong>
            </a>
          </li>

          <!-- Divider -->
          <hr class="sidebar-divider d-none d-md-block">

          <!-- Sidebar Toggler (Sidebar) -->
          <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
          </div>

        </ul>

        <style type="text/css">
        </style>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

          <!-- Main Content -->
          <div id="content">

            <!-- Topbar -->
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

              <!-- Sidebar Toggle (Topbar) -->
              

              <!-- Topbar Search -->


              <!-- Topbar Navbar -->
              <ul class="navbar-nav ml-auto">

                <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                <li class="nav-item dropdown no-arrow d-sm-none">
                  <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-home"></i>
                  </a>
                  <!-- Dropdown - Messages -->
                  <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">

                  </div>
                </li>

                <!-- Nav Item - Alerts -->


                <!-- Nav Item - Messages -->

                <div class="topbar-divider d-none d-sm-block"></div>

                <!-- Nav Item - User Information -->
                <li class="nav-item dropdown no-arrow">
                  <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $admin->getNome(); ?></span>
                    <?php 
                    if ($admin->getImagem() != null) {
                     ?>
                     <img src="mostra_imagem_admin.php" class="img-profile rounded-circle">
                     <?php 



                   }else{
                    ?>
                    <img src="../images/icon/man.png" width="300px" height="300px" class="img-profile rounded-circle"><br><br>
                    <?php 
                  }


                  ?>
                </a>
                <!-- Dropdown - User Information -->
                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                  <a class="dropdown-item" href="perfiladmin.php">
                   <i class="fa fa-user"></i>
                   Perfil 
                 </a>
                 <a class="dropdown-item" href="#">
                   <i class="fas fa-cog"></i>
                   Configurações
                 </a>
                 <div class="dropdown-divider"></div>
                 <a class="dropdown-item" href="sair.php">
                  <i class="fa fa fa-sign-out"></i>
                  Sair
                </a>
              </div>
            </li>

          </ul>

        </nav>	