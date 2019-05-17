<?php
  include 'classes/professor.php';
  include 'classes/conexao.php';
  include 'header_professor.php';
 
   

    
?>

<style type="text/css">
  .lbls{
    font-size: 1em;
    font-weight: bold;
    color: #3a7bd5;
    float: left;
    padding: 10px;
  }
  .inpts{
    border: 1px solid;
    color:#3a7bd5;
  }

</style>
<section class="page-title page-title-overlay " data-background="images/background/about.jpg">
  <div class="container">
    <div class="row">
      <div class="col-lg-7">
        <h1 class="text-white position-relative">
        <span class="watermark-sm">Professor: <?php echo($professor->getNome()); ?></span>Professor: <?php echo ucfirst(($professor->getNome())); ?>
        </h1>
        <p class="text-white pt-4 pb-4"><?php if ($professor->getBiografia() == "") {
          echo "Sem Biografia";
        }else{
          echo($professor->getBiografia());
        } ?></p>
      </div>
      <div class="col-lg-3 ml-auto align-self-end">
        <nav class="position-relative zindex-1" aria-label="breadcrumb">
           
        </nav>
      </div>
    </div>
  </div>
</section>
<section class="section section-lg-bottom bg-light">
  <div class="container">
    <div class="row">
      <div class="col-lg-10 text-center">
        <p class="subtitle">Turmas</p>
        <h3 class="section-title">Preencha os Campos Abaixo Para Registrar Suas Turmas.</h3>
      </div>
        <div class="col-lg-6 text-center p-0">
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
          <button type="submit" class="btn btn-outline-primary">Cadastrar Turma</button>
          <br><br>
        </div>
      </form>
    </div>
    <div class="col-lg-5 text-center p-0">
      <img src="images/icon/man.png" width="250px" height="250px">
    </div>
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


