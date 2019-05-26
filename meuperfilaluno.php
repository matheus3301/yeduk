<?php
  include 'header_aluno.php';
 
?>
<style type="text/css">
  .bio{
  background-color: transparent;
  border:1px solid #009afa;
  color:#fff;
}
.lbls{
  font-size: 1em;
  font-weight: bold;
  color: #3a7bd5;
  float: left;
  padding: 10px;
}
.i{
  display: none;
}
.bio{
  position: relative;
  z-index: 1;
  color:#fff;
}
.bio:focus{
  background-color: transparent;
  color:#fff;
  transition:.4s linear;
}
.bio:disabled{
  background-color: transparent;
  border:none;
}
.i2{
  display: none;
  position: relative;
  z-index: 1;
}
.btn-submit{
  border:none;
  background-color: transparent;
}

</style>
<section class="page-title page-title-overlay " data-background="images/background/about.jpg" style=" background-repeat: no-repeat; background-size: cover;">
  <div class="container">
    <div class="row">
      <div class="col-lg-7">
        <h1 class="text-white position-relative">
        <span class="watermark-sm">Aluno:  <?php echo ucfirst(($aluno->getNome())); ?></span>Aluno:  <?php echo ucfirst(($aluno->getNome())); ?>
        </h1>
        <form action="altera_biografia_aluno.php" method="POST"  > 
          <textarea name="bio" id="biografia" disabled="" class="form-control bio"><?php if ($aluno->getBiografia() == "") {
            echo "Sem Biografia";
          }else{
            echo($aluno->getBiografia());
          } ?></textarea><br>
          <a href="meuperfilaluno.php"><i class="far fa-times-circle text-danger fa-2x i2"></i></a>
          <button type="submit" class="btn-submit"><i class="far fa-check-circle text-success fa-2x i2"></i></button>
          <button type="button" class="btn btn-outline-primary text-white text-center" id="text" onclick="editarText();"> Editar Biografia</button>
        </form>

      </div>
       <div class="col-lg-5 ml-auto text-center">
        <img src="images/icon/student.png"  width="200px" height="200px"><br><br>
        <button type="button" class="btn btn-outline-primary text-white text-center"> Editar Imagem</button>

      </div>
      </div>
    </div>
  </div>
</section>

<section class="section section-lg-bottom bg-light">
  <div class="container">
    <div class="row">

      <div class="col-lg-12 text-center">

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
      <div class="col-lg-6 text-center p-0">
        <form class="row" action="altera_dados_aluno.php" method="POST">
          <div class="col-lg-12">
           <label for="exampleInputtext1" class="lbls ">Seu nome:</label>
           <input type="text" id="inpt" name="nome" class="form-control" readonly="" value="<?php echo($aluno->getNome());?>"> 


         </div>
         
         <div class="col-lg-12">
          <label for="exampleInputtext1" class=" lbls">Data de Nascimento:</label>
          <input type="date" id="inpt" name="data_nasc" class="form-control" readonly="" value="<?php echo($aluno->getData_nasc());?>">
          
        </div>
        <div class="col-lg-6">
          <label for="exampleInputtext1" class=" lbls">Nível de Escolaridade:</label>
          <select class="form-control mb-4 inputs" required="" style="height: 60px; color: #3a7bd5" name="escolaridade" disabled="" id="select">
            <option value="">Selecione...</option>
            <option <?php if($aluno->getEscolaridade() == "Ensino Fundamental Completo"){
                echo 'selected=""';} ?>>Ensino Fundamental Completo</option>
              <option <?php if($aluno->getEscolaridade() == "Ensino Fundamental Incompleto"){
                echo 'selected=""';} ?>>Ensino Fundamental Incompleto</optio)n>
              <option <?php if($aluno->getEscolaridade() == "Ensino Médio Completo"){
                echo 'selected=""';} ?>>Ensino Médio Completo</option>
              <option <?php if($aluno->getEscolaridade() == "Ensino Médio Incompleto"){
                echo 'selected=""';} ?>>Ensino Médio Incompleto</option>
              <option <?php if($aluno->getEscolaridade() == "Ensino Superior Incompleto"){
                echo 'selected=""';} ?>>Ensino Superior Incompleto</option>
              <option <?php if($aluno->getEscolaridade() == "Ensino Superior Completo"){
                echo 'selected=""';} ?>>Ensino Superior Completo</option>



      </select>
    </div>

    <div class="col-12 text-right">
      <br><br>
      <a href="meuperfilaluno.php" "><i class="far fa-times-circle text-danger fa-2x i"></i></a>
      <button type="submit" class="btn-submit"><i class="far fa-check-circle text-success fa-2x i"></i></button>
      <a class="btn btn-outline-primary  " id="editar" onclick="editar(false);"  data-toggle="modal" data-target=".bd-example-modal-lg">Editar Perfil</a>


      <br><br>
    </div>
  </form>
</div>
<div class="col-lg-5 text-center p-0">

</div>
</div>
</div>
<br><br><br>
</section>


<script type="text/javascript">
  function editarText() {
  var bio = document.getElementById('biografia');
  bio.disabled = false;
  $('#text').hide();
  $('.i2').fadeIn(1000);
}

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
</script>
<?php
    include 'footer_aluno.php';
?>
