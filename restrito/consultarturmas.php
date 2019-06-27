  <?php 
  include '../classes/turma.php';
  include '../classes/conexao.php';
  include 'navbar.php';
  $turma = new Turma();



  $turmas = $turma->ConsultarTurmaRelatorio($conexao);




  ?>
    <div class="container-fluid">
     
      <!-- DataTales Example -->
      <div class="card shadow mb-4" id="table-content">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary"><img src="../images/icon/logo (2).png" width="40px" height="40px">Turmas Cadastrados No Sistema</h6>

        </div>
        <div class="card-body tb-restrito">
          
          <div class="table-responsive ">
            <button class="btn btn-success" style="float:left; margin-right: 50%;" onclick="Imprimir();"><i class="fas fa-print"></i></button>
            <table id="example1" class="table  table-striped ">
                  <thead>
                    <th>#</th>
                    <th>FOTO</th>
                    <th>NOME</th>
                    <th>PROFESSOR</th>
                    <th>DATA CRIAÇÃO</th>
                    <th>DESCRIÇÃO</th>
                    <th>QTDE. ALUNOS</th>

                    

                  </thead>
                  <tbody>
                    <?php 
                    foreach ($turmas as $turmaatual) { 
                      $turmaOBJ = new Turma();

                      $turmaOBJ->setId($turmaatual[0]);
                      $qtd = $turmaOBJ->QuantidadeAlunos($conexao);



                      ?>




                      <tr>
                        <td><?php echo $turmaatual[0]; ?></td>
                        <td>
                         <?php 
                         if ($turmaatual[8] != null) {

                      echo '<img class="img-pequena" src="data:'.$turmaatual[7].';base64,'.base64_encode($turmaatual[8] ).'"/>';


                         }else{
                          ?>
                          <i class=" fas fa-3x fa-globe-americas " ></i>
                          <?php 
                        }

                        ?></td>

                        <td><?php echo $turmaatual[1]; ?></td>
                        <td><?php echo $turmaatual[9]; ?></td>
                        <td><?php echo $turmaatual[2]; ?></td>
                        <td><?php echo $turmaatual[3]; ?></td>
                        <td><?php echo $qtd[0]; ?></td>
                       
                        
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
                           <a href="excluir.php?id=<?php echo $turmaatual[0]; ?>" class="text-white"><button class=" btn-ex text-white">Excluir</button></a>
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


  function Imprimir() {
    //Get the HTML of div
            var divElements = document.getElementById('table-content').innerHTML;
            //Get the HTML of whole page
            var oldPage = document.body.innerHTML;

           

            //Print Page
            window.print();

            //Restore orignal HTML
            document.body.innerHTML = oldPage;
  }
</script>
</body>

</html>
