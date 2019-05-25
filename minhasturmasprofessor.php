

<?php 
include 'classes/conexao.php';
include 'classes/professor.php';
include 'classes/turma.php';
include 'header_professor.php';


$turma = new Turma();


$turmas = $turma->CapturarTurmasProfessor($conexao,$id);


?>

<style type="text/css">
.btn-circle{
  width: 30px;
  height: 30px;
  text-align: center;
  padding:6px 0;
  font-size: 12px;
  line-height: 1.428571429;
  border-radius: 15px;
}

.inpts{
  background-color: transparent;
  border: 2px solid #00d2ff;
  color: #fff;
}
.inpus::placeholder{
  color:dodgerblue;
}
.inpus:focus{
  background-color: transparent;
}
.btn-circle.btn-lg{
  width:50px;
  height: 50px;
  padding: 1px 1px;
  font-size: 1em;
  line-height: 1.33;
  border-radius: 25px;
}

</style>
<section class="page-title page-title-overlay bg-cover" data-background="images/background/about.jpg">
  <div class="container">
    <div class="row">
      <div class="col-lg-7">
        <h1 class="text-white position-relative">Minhas Turmas<span class="watermark-sm">Minhas Turmas</span></h1>
        <p class="text-white pt-4 pb-4">Envie questionários, mande uma mensagem para a suas turmas. contribua para o aprendizado dos Seus Alunos.</p>
      </div>
      <div class="col-lg-3 ml-auto align-self-end">
        <nav class="position-relative zindex-1" aria-label="breadcrumb">
          <ol class="breadcrumb justify-content-end bg-transparent">

            <li class="breadcrumb-item"><a href="meuperfilprofessor.php" class="text-white">Meu Perfil</a></li>
            <li class="breadcrumb-item text-white" aria-current="page">Minhas Turmas</li>

          
          </ol>
        </nav>
      </div>
    </div>
  </div>


</section>


<section class="section section-lg-bottom bg-light">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 text-center">
        <p class="subtitle"></p>
        <h2 class="section-title">Suas Turmas  <button type="button" class="btn btn-primary text-center btn-circle btn-lg" data-toggle="modal" data-target="#modal_add">+</button>
        </h2>
        
      </div>

      <?php 
      foreach ($turmas as $turmaatual) { ?>
        <div class="col-lg-12 bg-white p-4 rounded shadow my-3">
          <div class="media align-items-center flex-column flex-sm-row">
            <i class="fa-4x fas fa-globe-americas" ></i>
            <div class="media-body text-center text-sm-left mb-4 mb-sm-0" style="padding-left:5%">
              <h6 class="mt-0"><?php echo $turmaatual[0]." - ".$turmaatual[1]; ?></h6>
              <p class="mb-0 text-gray"><?php echo $turmaatual[2]; ?></p>
            </div>
            <a href="turmaprofessor.php?id=<?php echo $turmaatual[0]?>" class="btn btn-outline-primary">Acessar Turma</a>
          </div>
        </div>




      <?php }?>
      
      


    </div>
  </div>
</section>

<!---- Modal Adicionar Turmas ----->

<div class="modal fade" id="modal_add">
  <div class="modal-dialog" >
    <div class="modal-content">
      <div class="modal-header" style="background:linear-gradient(to right, #00d2ff,#3a7bd5);">
       <h4 class="modal-title text-white">
        <img src="images/logo/logo.png"> Cadastrar Turmas
      </h4>
      <button type="button" class="close" data-dismiss="modal"><span><i class="fas fa-times-circle text-white"></i></span></button>
    </div>
    <div class="modal-body"> 
      <div class="col-lg-12 text-center">
        <h3 class="section-title">Preencha os Campos Abaixo Para Registrar a nova Turma.</h3>
      </div>
      <div class="col-lg-12 text-center p-0">
        <form class="row" method="post" action="cadastra_turmas.php">
          <div class="col-lg-12">
           <label for="exampleInputtext1" class=" lbls "> Turma:</label>

           <input type="text" class="form-control mb-4 inpts text-primary" placeholder="Ex: Terceiro ano C" name="nome">
         </div>
         <div class="col-lg-12">
           <label for="exampleInputtext1" class=" lbls ">Descrição:</label>
           <textarea  class="form-control mb-4 inpts text-primary" name="descricao"></textarea>  
         </div>
         
         <div class="col-12">
          <button type="submit" class="btn btn-block btn-outline-primary">Cadastrar Turma</button>
          <br><br>
        </div>
      </form>
    </div>
    
    


  </div>
</div>
</div>
</div>

<?php 
include 'footer_professor.php';

?>