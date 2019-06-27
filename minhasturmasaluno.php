

<?php 
session_start();
include 'classes/turma.php';
include 'header_aluno.php';


$turma = new Turma();


if (isset($_GET['nomeTurma'])) {
  $nometurma = $_GET['nomeTurma'];
}else{
  $nometurma = "";
}




$turmas = $turma->CapturarTurmasNome($conexao,$nometurma);


?>


<section class="page-title page-title-overlay bg-cover" data-background="images/background/about.jpg" >
  <div class="container">
    <div class="row">
      <div class="col-lg-7">
        <h1 class="text-white position-relative">Minhas Turmas<span class="watermark-sm">Minhas Turmas</span></h1>
        <p class="text-white pt-4 pb-4">Acesse as turmas que você faz parte e interaja com seus colegas!</p>
      </div>
      <div class="col-lg-3 ml-auto align-self-end">
        <nav class="position-relative zindex-1" aria-label="breadcrumb">
          <ol class="breadcrumb justify-content-end bg-transparent">

            <li class="breadcrumb-item"><a href="meuperfilaluno.php" class="text-white">Meu Perfil</a></li>
            <li class="breadcrumb-item text-white" aria-current="page">Minhas Turmas</li>


          </ol>
        </nav>
      </div>
    </div>
  </div>


</section>


<section class="section section-lg-bottom bg-light" style="padding-top: 5%">
  <div class="container">
    <div class="row" >
      <div class="col-lg-6 text-center">
        <p class="subtitle"></p>
        <h2 class="section-title">Minhas Turmas
        </h2>
        
      </div>
      <div class="col-lg-6 text-right">

        <form action="buscarturmasaluno.php" method="get" >
          <div class="position-relative ipt-busca"  >
            <input name="nomeTurma" type="text" placeholder="Buscar turmas por nome..." class="border-bottom form-control rounded-1 px-3 " required=""  >
            <button class="search-btn" type="submit"><i class="fa fa-search"></i></button>
          </div>
        </form>
        
      </div>
    </div>

    <?php if (isset($_GET['op']) && $_GET['op'] == "aplicou"): ?>
      <div class="row">
       <div class="col-lg-12">
        <div class="alert alert-primary alert-dismissible fade show text-center" role="alert">
          Aplicação realizada com sucesso! Por favor, aguarde pela resposta do professor ;)

          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      </div>
    </div>

  <?php endif ?>

  <?php if (isset($_GET['nomeTurma'])): ?>
    <span style="font-size: 1em; font-weight: bold; color: #000">Buscando por:</span> <span class="alert alert-primary"><?php echo $_GET['nomeTurma']; ?> <a href="buscarturmasaluno.php"><span aria-hidden="true">&times;</span></a></span>
  <?php endif ?>



  <?php 

  if ($turmas != null) {
    foreach ($turmas as $turmaatual) { ?>
     <?php 
     if ($aluno->VerificaParticipacaoTurma($conexao,$turmaatual[0]) == "Aprovado") {
      ?>








      <div class="col-lg-12 bg-white p-4 rounded shadow my-3">
        <div class="media align-items-center flex-column flex-sm-row">
         <?php 
         if ($turmaatual[5] != null) {
           echo '<img class="img-turma" src="data:'.$turmaatual[4].';base64,'.base64_encode( $turmaatual[5]).'"/>';

         }else{
          ?>
          <i class="fa-4x fas fa-globe-americas" ></i>
          <?php 
        }

        ?>
        <div class="media-body text-center text-sm-left mb-4 mb-sm-0" style="padding-left:5%">
          <h6 class="mt-0"><?php echo $turmaatual[3]." - ".$turmaatual[1]; ?></h6>
          <p class="mb-0 text-dark"><?php echo $turmaatual[2]; ?></p>
        </div>
        <p></p>


          <a href="turmaaluno.php?idTurma=<?php echo $turmaatual[0]?>" class="btn btn-outline-success">Entrar</a>


      </div>
    </div>
    <?php 
  } ?>




<?php }}else{  ?>
  <div class="col-lg-12 bg-white p-4 rounded shadow my-3">
    <div class="media align-items-center flex-column flex-sm-row">
      <i class="fa-4x fas fa-globe-americas" ></i>
      <div class="media-body text-center text-sm-left mb-4 mb-sm-0" style="padding-left:5%">
        <h6 class="mt-0">Nos desculpe... :(</h6>
        <p class="mb-0 text-gray">Não foram encontradas turmas com o nome <strong><?php echo $_GET['nomeTurma'] ?></strong>, por favor, tente novamente...</p>
      </div>
      <p></p>





    </div>
  </div>
<?php } ?>




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
include 'footer_aluno.php';

?>