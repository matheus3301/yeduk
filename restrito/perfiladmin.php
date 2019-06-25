<?php
include 'navbar.php';

?>

<section class="page-title page-title-overlay " data-background="../images/background/about.jpg" style=" background-repeat: no-repeat; background-size: cover;">
  <div class="container">
    <div class="row" >
      <div class="col-lg-8">
        <h1 class="text-white position-relative">
          Admnistrador: <?php echo ucfirst(($admin->getNome())); ?>
        </h1>
        <br>

      </div>
      

      <div class="col-md-4 m-auto "  >
       <?php 
       if ($admin->getImagem() != null) {
         ?>
         <img src="mostra_imagem_admin.php" class="foto-perfil"><br><br>


         <?php 



       }else{
        ?>
        <img src="../images/icon/man.png"   width="200px" height="200px"><br><br>


        <?php 
      }


      ?>
    </div>

  </center>

</div>
</div>
</section>
<section class="section section-lg-bottom bg-light">
  <div class="container">
    <div class="row">

      <div class="col-lg-12 ">

        <br>
        <?php 
        if (isset($_GET ['op']) && $_GET['op'] == "alterado") {
          ?>
          <div class="alert alert-primary alert-dismissible fade show text-center"  role="alert">
            Informações Alteradas com sucesso!

            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        <?php } ?>

        <h3 class="section-title">Verifique suas Informações!</h3>
      </div>
      <div class="col-lg-6 text-center ">
        <form class="row" action="../valida_alt/altera_dados_admin.php" method="POST">
          <div class="col-lg-12">
           <label for="exampleInputtext1" class="lbls ">Seu nome:</label>
           <input type="text" id="inpt" name="nome" class="form-control" readonly="" value="<?php echo($admin->getNome());?>"> 


         </div>
         
         <div class="col-lg-12">
          <label for="exampleInputtext1" class=" lbls">Seu email:</label>
          <input type="text" id="inpt" name="email" class="form-control" readonly="" value="<?php echo($admin->getEmail());?>">
          
        </div>

    <div class="col-12 text-right">
      <br><br>
      <a onclick="voltar(true);"><i class="far fa-times-circle text-danger fa-2x i"></i></a>
      <button type="submit" class="btn-submit"><i class="far fa-check-circle text-success fa-2x i"></i></button>
      <a class="btn btn-outline-primary text-dark  " id="editar" onclick="editar(false);"  data-toggle="modal" data-target=".bd-example-modal-lg">Editar Perfil</a>


      <br><br>
    </div>
  </form>
</div>
<form action="../valida_alt/altera_img_admin.php" enctype="multipart/form-data" method="post">
  <div class="col-lg-6 m-auto" >


   <center>


    <?php 
    if ($admin->getImagem() != null) {
     ?>
     <img src="mostra_imagem_admin.php" id="output"><br><br>
     <?php 



   }else{
    ?>
    <img src="../images/icon/man.png"  id="output" width="300px" height="300px"><br><br>
    <?php 
  }


  ?>
  <span class="btn btn-outline-primary btn-file text-dark" style="width:250px; "></i>
    
    Buscar Foto <input type="file" name="imagem"  accept="image/*" onchange="loadFile(event)">
  </span>


  <input type="hidden" name="MAX_FILE_SIZE" value="99999999"/>
  <br><br>
  <button type="submit" class="btn btn-outline-primary text-dark text-center btn-salvar" style="width:250px;" >Salvar</button>


</center>

</div>
</form>
</div>
</div>
<br><br><br>
</section>
<footer class="sticky-footer bg-white">
      <div class="container my-auto">
        <div class="copyright text-center my-auto">
          <span>Yeduk &copy; Todos os direitos Reservados</span>
          
        </div>
      </div>
    </footer>










<script src="js/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
    $('.cpf').mask('000.000.000-00');
  });

  function editar(bool) {

   var inputs = document.getElementsByTagName("input");
   for (var i = 0; i < inputs.length; i++) {
    if (inputs[i].type === "text" || inputs[i].type === "date") {
      inputs[i].readOnly = bool;
    }
  }
  var select = document.getElementById("select");
  select.disabled = false;

  $('#editar').hide();
  $('.i').fadeIn(1000);
}
function voltar(bool) {

 var inputs = document.getElementsByTagName("input");
 for (var i = 0; i < inputs.length; i++) {
  if (inputs[i].type === "text" || inputs[i].type === "date") {
    inputs[i].readOnly = bool;
  }
}
var select = document.getElementById("select");
select.disabled = true;
$('#editar').fadeIn(1000);
$('.i').hide();
}
function editarText() {
  var bio = document.getElementById('biografia');
  bio.disabled = false;
  $('#text').hide();
  $('.i2').fadeIn(1000);
}
</script>
<script>
  var loadFile = function(event) {
    var output = document.getElementById('output');
    output.src = URL.createObjectURL(event.target.files[0]);
  };
</script>

