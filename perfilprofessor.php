<?php
session_start();
include 'header_aluno.php';
include 'classes/turma.php';
include 'classes/professor.php';

$professor = new Professor();
$id = $_GET['id'];
$professor->setId($id);
$professor->CapturarProfessor($conexao);



$turma = new Turma();


$turmas = $turma->CapturarTurmasProfessor($conexao,$id);


?>

<section class="page-title page-title-overlay " data-background="images/background/about.jpg" style=" background-repeat: no-repeat; background-size: cover;">
  <div class="container">
    <div class="row" >
      <div class="col-lg-8">
        <h1 class="text-white position-relative">
          Professor: <?php echo ucfirst(($professor->getNome())); ?>
        </h1>

        
        <textarea name="bio" id="biografia" disabled="" class="form-control bio"><?php if ($professor->getBiografia() == "") {
          echo "Sem Biografia";
        }else{
          echo($professor->getBiografia());
        } ?></textarea><br>
      </form>
      <button name="op" value="remove" class="btn btn-primary btn-circle btn-circle btn-lg"><i class="fas fa-comments"></i><span class="badge badge-danger badge-counter">4</span>
        <br>

      </div>
      

      <div class="col-md-4 m-auto "  >
       <?php 
       if ($professor->getImagem() != null) {
         ?>
         <img src="mostra_imagem.php?idProf=<?php echo $professor->getId(); ?>" class="foto-perfil"><br><br>



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
      <div class="col-lg-12 text-center">
        <p class="subtitle"></p>
        <h2 class="section-title">Turmas do Professor
        </h2>
        
      </div>


      <?php 

      if ($turmas != null) {
        foreach ($turmas as $turmaatual) { ?>

          <div class="col-lg-12 bg-white p-4 rounded shadow my-3">
            <div class="media align-items-center flex-column flex-sm-row">
             <?php 
             if ($turmaatual[8] != null) {
               echo '<img class="img-turma" src="data:'.$turmaatual[7].';base64,'.base64_encode( $turmaatual[8]).'"/>';

             }else{
              ?>
              <i class="fa-4x fas fa-globe-americas" ></i>
              <?php 
            }

            ?>
            <div class="media-body text-center text-sm-left mb-4 mb-sm-0" style="padding-left:5%">
              <h6 class="mt-0"><?php echo $turmaatual[1]; ?></h6>
              <p class="mb-0 text-dark"><?php echo $turmaatual[3]; ?></p>
            </div>
            <p></p>


            <?php 
            if ($aluno->VerificaParticipacaoTurma($conexao,$turmaatual[0]) == "Pendente") {
              ?>
              <a href="#>" class="btn btn-outline-warning disabled">Pendente</a>

              <?php 
            } ?>
            <?php 
            if ($aluno->VerificaParticipacaoTurma($conexao,$turmaatual[0]) == "Aprovado") {
              ?>
              <a href="turmaaluno.php?idTurma=<?php echo $turmaatual[0]?>" class="btn btn-outline-success">Entrar</a>

              <?php 
            } ?>
            <?php 
            if ($aluno->VerificaParticipacaoTurma($conexao,$turmaatual[0]) == "nao aplicou") {
              ?>
              <a href="aplicar_turma.php?idTurma=<?php echo $turmaatual[0]?>" class="btn btn-outline-primary">Aplicar</a>

              <?php 
            } ?>



          </div>
        </div>
        <?php 
      } ?>




    <?php }  ?>




  </div>
</div>
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

