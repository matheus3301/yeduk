<?php
  session_start();
  $id = $_SESSION['idtb_aluno'];

  include 'header_professor.php';
  include 'classes/aluno.php';
  include 'classes/conexao.php';
  
    $aluno = new Aluno();

    $aluno->setId($id);
    $aluno->CapturarAluno($conexao);


    
?>
<section class="page-title page-title-overlay " data-background="images/background/about.jpg">
  <div class="container">
    <div class="row">
      <div class="col-lg-7">
        <h1 class="text-white position-relative">
        <span class="watermark-sm">Aluno <?php echo($aluno->getNome()); ?></span>Aluno:<?php echo($aluno->getNome()); ?>
        </h1>
        <p class="text-white pt-4 pb-4">Biografia: <?php if ($aluno->getBiografia() == "") {
          echo "Sem biografia";
        }else{
          echo($aluno->getData_ingresso());
        }
        ?></p>

      </div>
      <div class="col-lg-3 ml-auto align-self-end">
        <nav class="position-relative zindex-1" aria-label="breadcrumb">
           <button class="btn btn btn-outline-primary text-white ml-3">Editar Perfil</button>
        </nav>
      </div>
    </div>
  </div>
</section>
<?php
    include 'footer.php';
?>
