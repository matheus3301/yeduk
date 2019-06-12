<?php
session_start();
if (isset($_SESSION['idprof'])) {
  include 'header_professor.php';
  include 'classes/aluno.php';
}else{
  include 'header_aluno.php';
}

include 'classes/turma.php';



$alunovisitado = new Aluno();
$id = $_GET['id'];
$alunovisitado->setId($id);
$alunovisitado->CapturarAluno($conexao);



?>

<section class="page-title page-title-overlay " data-background="images/background/about.jpg" style=" background-repeat: no-repeat; background-size: cover;">
  <div class="container">
    <div class="row" >
      <div class="col-lg-8">
        <h1 class="text-white position-relative">
         <?php echo ucfirst(($alunovisitado->getNome())); ?>
        </h1>

        
        <textarea name="bio" id="biografia" disabled="" class="form-control bio"><?php if ($alunovisitado->getBiografia() == "") {
          echo "Sem Biografia";
        }else{
          echo($alunovisitado->getBiografia());
        } ?></textarea><br>
      </form>
      <button name="op" value="remove" class="btn btn-primary btn-circle btn-circle btn-lg"><i class="fas fa-comments"></i><span class="badge badge-danger badge-counter">4</span>
        <br>

      </div>
      

      <div class="col-md-4 m-auto "  >
       <?php 
       if ($alunovisitado->getImagem() != null) {
         ?>
         <img src="mostra_imagem_aluno.php?idAluno=<?php echo $alunovisitado->getId(); ?>" class="foto-perfil"><br><br>



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

