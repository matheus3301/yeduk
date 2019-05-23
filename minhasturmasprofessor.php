

<?php 
  include 'classes/conexao.php';
  include 'classes/professor.php';
  include 'classes/turma.php';
  include 'header_professor.php';


  $turma = new Turma();

  
  $turmas = $turma->CapturarTurmasProfessor($conexao,$id);


 ?>

<style type="text/css">
 .btn-more{
  border:none;
  background-color:#fff !important;
  box-shadow: 0px 0px 20px #909090;
  color:#009afa;
  float: right;
 }
 .btn-more:hover{
  background-color: #009afa !important;
  color:#fff;
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
                        <li class="breadcrumb-item"><a href="index.html" class="text-white">Home</a></li>
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
        <h2 class="section-title">Suas Turmas</h2>
        <button type="button" class="btn btn-outline-primary-primary text-center btn-more" data-toggle="modal" data-target="#modal_add"><i class="fa fa-plus fa-1x"></i></button>
      </div>

        <?php 
          foreach ($turmas as $turmaatual) { ?>
            <div class="col-lg-12 bg-white p-4 rounded shadow my-3">
              <div class="media align-items-center flex-column flex-sm-row">
                <img src="images/career/logo-5.png" class="mr-sm-3 mb-4 mb-sm-0 border rounded p-2" alt="logo-1">
                <div class="media-body text-center text-sm-left mb-4 mb-sm-0">
                  <h6 class="mt-0"><?php echo $turmaatual[0]." - ".$turmaatual[1]; ?></h6>
                  <p class="mb-0 text-gray"><?php echo $turmaatual[2]; ?></p>
                </div>
                <a href="career-details.html" class="btn btn-outline-primary">Acessar Turma</a>
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