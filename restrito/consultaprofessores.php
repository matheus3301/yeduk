  <?php 
  include '../classes/professor.php';
  include '../classes/conexao.php';
  $professor = new Professor();



  $professores = $professor->ConsultarProfessor($conexao);




  ?>



  <!DOCTYPE html>
  <html lang="en">

  <head>
    <style type="text/css">
   
      input{
        background-color:transparent;
        border:none;
        border:1px solid #009afa;
        border-radius:20px;
        margin: 5%;
        height:50px;
        padding:10px;
        color:#fff;
      }
     
      select{
        background-color:transparent;
        border:none;
        border:1px solid #009afa;
        border-radius:20px;
        color:#000;
        margin-left:20px;
      }
      .current{
        padding:3%;
        font-size: 1em;
        color:#009afa;
        font-weight: bold;
      }
      .current:hover{
        opacity: .4;
        border-bottom:2px solid #fff;
        color:#009afa;
      }
      .previous{
         font-size: 1em;
        color:#009afa;
        font-weight: bold;
      }
      .previous:hover{
        opacity: .4;
        color:#009afa;
      }
     .next{
         font-size: 1em;
        color:#009afa;
        font-weight: bold;
      }
      .next:hover{
        opacity: .4;
        color:#009afa;
      }
     
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
            <a class="nav-link" href="#" data-toggle="modal" data-target="#logoutModal">
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
                <li class="nav-item dropdown no-arrow mx-1 mr-7">
                  <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-bell"></i>
                    <!-- Counter - Alerts -->
                    <span class="badge badge-danger badge-counter">3+</span>
                  </a>
                  <!-- Dropdown - Alerts -->
                  <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                    <h6 class="dropdown-header">
                      Alerts Center
                    </h6>
                    <a class="dropdown-item d-flex align-items-center" href="#">
                      <div class="mr-3">
                        <div class="icon-circle bg-primary">
                         <i class="fa fa-home"></i>
                       </div>
                     </div>
                     <div>
                      <div class="small text-gray-500">December 12, 2019</div>
                      <span class="font-weight-bold">A new monthly report is ready to download!</span>
                    </div>
                  </a>
                  <a class="dropdown-item d-flex align-items-center" href="#">
                    <div class="mr-3">
                      <div class="icon-circle bg-success">
                       <i class="fa fa-home"></i>
                     </div>
                   </div>
                   <div>
                    <div class="small text-gray-500">December 7, 2019</div>
                    $290.29 has been deposited into your account!
                  </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="mr-3">
                    <div class="icon-circle bg-warning">
                     <i class="fa fa-home"></i>
                   </div>
                 </div>
                 <div>
                  <div class="small text-gray-500">December 2, 2019</div>
                  Spending Alert: We've noticed unusually high spending for your account.
                </div>
              </a>
              <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
            </div>
          </li>

          <!-- Nav Item - Messages -->
          
          <div class="topbar-divider d-none d-sm-block"></div>

          <!-- Nav Item - User Information -->
          <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <span class="mr-2 d-none d-lg-inline text-gray-600 small">Cleilton Rocha</span>
              <img class="img-profile rounded-circle" src="https://source.unsplash.com/QAB-WJcbgJk/60x60">
            </a>
            <!-- Dropdown - User Information -->
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
              <a class="dropdown-item" href="#">
               <i class="fa fa-user"></i>
               Perfil 
             </a>
             <a class="dropdown-item" href="#">
               <i class="fas fa-cog"></i>
               Configurações
             </a>
             <div class="dropdown-divider"></div>
             <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
              <i class="fa fa fa-sign-out"></i>
              Logout
            </a>
          </div>
        </li>

      </ul>

    </nav>
    <!-- End of Topbar -->

    <!-- Begin Page Content -->
    <div class="container-fluid">
     
      <!-- DataTales Example -->
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary"><img src="../images/icon/logo (2).png" width="40px" height="40px">Professores Cadastrados No Sistema</h6>

        </div>
        <div class="card-body tb-restrito">
          <button class="btn btn-success" style="float:left; margin-right: 55%;" onclick="document.print();"><i class="fas fa-print"></i></button>
          <div class="table-responsive ">
            <table id="example1" class="table  table-striped ">
                  <thead>
                    <th>#</th>
                    <th>Foto</th>
                    <th>Nome</th>
                    <th>CPF</th>
                    <th>Email <i class="fa fa-envelope"></i></th>
                    <th>Data Ingresso</th>
                    <th>Data Nasc.</th>
                    <th>Escolaridade</th>
                  

                  </thead>
                  <tbody>
                    <?php 
                    foreach ($professores as $professoratual) { ?>


                      <tr>
                        <td><?php echo $professoratual[0]; ?></td>
                        <td>
                         <?php 
                         if ($professoratual[8] != null) { ?>

                          <img src="../mostra_imagem.php?idProf=<?php echo $professoratual[0];?>" class="img-circle img-pequena-chat direct-chat-img">

                        <?php }else{
                          ?>
                          <i class="fa-4x fas fa-globe-americas" ></i>
                          <?php 
                        }

                        ?></td>
                        <td><?php echo $professoratual[1]; ?></td>
                        <td><?php echo $professoratual[4]; ?></td>
                        <td><?php echo $professoratual[7]; ?></td>
                        <td><?php echo $professoratual[3]; ?></td>
                        <td><?php echo $professoratual[2]; ?></td>
                        <td><?php echo $professoratual[6]; ?></td>

                      </tr>
                      <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          ...
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                           <a href="excluir.php?id=<?php echo $professoratual[0]; ?>" class="text-white"><button class=" btn-ex text-white">Excluir</button></a>
                        </div>
                      </div>
                    </div>
                  </div>

                      <?php
                    }

                    ?>
                  </tbody>
                
                </table>



        </div>
      </div>
    </div>
    



    </div>

    <!-- End of Main Content -->

    <!-- Footer -->
    <footer class="sticky-footer bg-white">
      <div class="container my-auto">
        <div class="copyright text-center my-auto">
          <span>Yeduk &copy; Todos os direitos Reservados</span>
          
        </div>
      </div>
    </footer>
    <!-- End of Footer -->

  </div>
  <!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
  <i class="fa fa-home"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
        <a class="btn btn-primary" href="login.html">Logout</a>
      </div>
    </div>
  </div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="js/sb-admin-2.min.js"></script>


<!-- jQuery 2.1.4 -->
<script src="js/jQuery-2.1.4.min.js"></script>
<!-- Bootstrap 3.3.5 -->
<script src="js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="js/jquery.dataTables.min.js"></script>
<script src="dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="js/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="js/fastclick.min.js"></script>
<!-- AdminLTE App -->
<script src="js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="js/demo.js"></script>
<!-- page script -->
<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script>
</body>

</html>
