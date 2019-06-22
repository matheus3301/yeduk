<?php
session_start();
include 'header_professor.php';

?>

<section class="page-title page-title-overlay " data-background="images/background/about.jpg" style=" background-repeat: no-repeat; background-size: cover;">
  <div class="container">
    <div class="row" >
      <div class="col-lg-8">
        <h1 class="text-white position-relative">
          Professor: <?php echo ucfirst(($professor->getNome())); ?>
        </h1>

        <form action="valida_alt/altera_biografia_professor.php" method="POST"  > 
          <textarea name="bio" id="biografia" disabled="" class="form-control bio"><?php if ($professor->getBiografia() == "") {
            echo "Sem Biografia";
          }else{
            echo($professor->getBiografia());
          } ?></textarea><br>
          <center>
            <a href="meuperfilprofessor.php"><i class="far fa-times-circle text-danger fa-2x i2"></i></a>
            <button type="submit" class="btn-submit"><i class="far fa-check-circle text-success fa-2x i2"></i></button>
            <button type="button" class="btn btn-outline-primary text-white text-center" id="text" onclick="editarText();"> Editar Biografia</button>
          </center>
        </form>
        <br>

      </div>
      

      <div class="col-md-4 m-auto "  >
       <?php 
       if ($professor->getImagem() != null) {
         ?>
         <img src="mostra_imagem.php" class="foto-perfil"><br><br>


         <?php 



       }else{
        ?>
        <img src="images/icon/man.png"   width="200px" height="200px"><br><br>


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
        <form class="row" action="valida_alt/altera_dados_professor.php" method="POST">
          <div class="col-lg-12">
           <label for="exampleInputtext1" class="lbls ">Seu nome:</label>
           <input type="text" id="inpt" name="nome" class="form-control" readonly="" value="<?php echo($professor->getNome());?>"> 


         </div>
         
         <div class="col-lg-12">
          <label for="exampleInputtext1" class=" lbls">Data de Nascimento:</label>
          <input type="date" id="inpt" name="data_nasc" class="form-control" readonly="" value="<?php echo($professor->getData_nasc());?>">
          
        </div>
        <div class="col-lg-6">
          <label for="exampleInputtext1" class=" lbls">Nível de Escolaridade:</label>
          <select class="form-control mb-4 inputs" required="" style="height: 60px; color: #3a7bd5" name="escolaridade" disabled="" id="select">
            <option value="">Selecione...</option>
            <option <?php if($professor->getEscolaridade() == "Ensino Fundamental Completo"){
              echo 'selected=""';} ?>>Ensino Fundamental Completo</option>
              <option <?php if($professor->getEscolaridade() == "Ensino Fundamental Incompleto"){
                echo 'selected=""';} ?>>Ensino Fundamental Incompleto</optio)n>
<option <?php if($professor->getEscolaridade() == "Ensino Médio Completo"){
  echo 'selected=""';} ?>>Ensino Médio Completo</option>
  <option <?php if($professor->getEscolaridade() == "Ensino Médio Incompleto"){
    echo 'selected=""';} ?>>Ensino Médio Incompleto</option>
    <option <?php if($professor->getEscolaridade() == "Ensino Superior Incompleto"){
      echo 'selected=""';} ?>>Ensino Superior Incompleto</option>
      <option <?php if($professor->getEscolaridade() == "Ensino Superior Completo"){
        echo 'selected=""';} ?>>Ensino Superior Completo</option>



      </select>
    </div>
    <div class="col-lg-6">
      <label for="exampleInputtext1" class="lbls">CPF:</label>
      <input type="text" id="inpt" name="cpf" class="form-control" readonly="" value="<?php echo($professor->getCpf());?>">
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
<form action="valida_alt/altera_img_professor.php" enctype="multipart/form-data" method="post">
  <div class="col-lg-6 m-auto" >


   <center>


    <?php 
    if ($professor->getImagem() != null) {
     ?>
     <img src="mostra_imagem.php" id="output"><br><br>
     <?php 



   }else{
    ?>
    <img src="images/icon/man.png"  id="output" width="300px" height="300px"><br><br>
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









<?php
include 'footer_professor.php';
?>
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

