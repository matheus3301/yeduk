<?php 
include 'classes/conexao.php';
include 'classes/professor.php';
include 'classes/turma.php';
include 'header_professor.php';

$id = $_GET['id'];

$turma = new Turma();
$turma->setId($id);


$turma->CapturarTurma($conexao);

$professor = new Professor();
$professor->setId($turma->getId_professor());

$professor->CapturarProfessor($conexao);

?>

<section class="page-title page-title-overlay bg-cover" data-background="images/background/about.jpg">
  <div class="container">
    <div class="row">
      <div class="col-lg-8">
        <h1 class="text-white position-relative"><?php echo($turma->getNome()); ?><span class="watermark-sm"><?php echo($turma->getNome()); ?></span></h1>
        <p class="text-white pt-4 pb-4"><?php echo($turma->getDescricao()); ?></p>
        <h5 class="text-white">Professor: <?php echo $professor->getNome(); ?></h5>
      </div>
      <div class="col-lg-3 ml-auto align-self-end">
        <nav class="position-relative zindex-1" aria-label="breadcrumb">
          <ol class="breadcrumb justify-content-end bg-transparent">
            <li class="breadcrumb-item text-white"><a href="meuperfilprofessor.php" class="text-white">Perfil</a></li>
            <li class="breadcrumb-item text-white"><a href="minhasturmasprofessor.php" class="text-white">Turmas</a></li>
            <li class="breadcrumb-item text-white" aria-current="page"><?php echo($turma->getNome()); ?></li>
          </ol>
        </nav>
      </div>


    </div>

  </div>
</section>



<style type="text/css">
  .section{
    margin-top: 5%;
  }

</style>


<section class="section section-lg-bottom">
  <div class="container">
    <div class="row">

      <div class="col-md-8">
         
        <ul class="nav nav-pills mb-3" id="myTab" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Início</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Alunos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="messages-tab" data-toggle="tab" href="#messages" role="tab" aria-controls="messages" aria-selected="false">Mensagens</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="settings-tab" data-toggle="tab" href="#settings" role="tab" aria-controls="settings" aria-selected="false">Configurações</a>
          </li>
        </ul>

        <div class="tab-content">
          <div class="tab-pane active" id="home" role="tabpanel" aria-labelledby="home-tab">a</div>
          <div class="tab-pane" id="profile" role="tabpanel" aria-labelledby="profile-tab">aa</div>
          <div class="tab-pane" id="messages" role="tabpanel" aria-labelledby="messages-tab">aaa</div>
          <div class="tab-pane" id="settings" role="tabpanel" aria-labelledby="settings-tab">aaaa</div>
        </div>

      </div>
      <div class="col-lg-4">
  <div class="rounded-sm shadow bg-white pb-4">
    <div class="widget">
      <h4>Search</h4>
      <form action="#">
        <div class="position-relative">
          <input type="text" placeholder="Search here" class="border-bottom form-control rounded-0 px-0">
          <button class="search-btn" type="submit"><i class="fa fa-search"></i></button>
        </div>
      </form>
    </div>
    <div class="widget">
      <h4>Category</h4>
      <ul class="list-styled list-bordered">
        <li><a class="text-color d-block py-3" href="blog-details.html">Investment Planning</a></li>
        <li><a class="text-color d-block py-3" href="blog-details.html">Valuable Idea</a></li>
        <li><a class="text-color d-block py-3" href="blog-details.html">Market Strategy</a></li>
        <li><a class="text-color d-block py-3" href="blog-details.html">development Maping</a></li>
        <li><a class="text-color d-block py-3" href="blog-details.html">Afiliated Marketing</a></li>
        <li><a class="text-color d-block py-3" href="blog-details.html">Targated Marketing</a></li>
      </ul>
    </div>
    <div class="widget">
      <h4>Latest Article</h4>
      <ul class="list-unstyled list-bordered">
        <li class="media border-bottom py-3">
          <img src="images/men/sm-img-1.jpg" class="rounded-sm mr-3" alt="post-thumb">
          <div class="media-body">
            <h6 class="mt-0"><a href="blog-details.html" class="text-dark">Aiusmod tempor did labore dolory</a></h6>
            <p class="mb-0 text-color">Aug 02, 2018</p>
          </div>
        </li>
        <li class="media border-bottom py-3">
          <img src="images/men/sm-img-2.jpg" class="rounded-sm mr-3" alt="post-thumb">
          <div class="media-body">
            <h6 class="mt-0"><a href="blog-details.html" class="text-dark">Aiusmod tempor did labore dolory</a></h6>
            <p class="mb-0 text-color">Aug 02, 2018</p>
          </div>
        </li>
        <li class="media border-bottom py-3">
          <img src="images/men/sm-img-3.jpg" class="rounded-sm mr-3" alt="post-thumb">
          <div class="media-body">
            <h6 class="mt-0"><a href="blog-details.html" class="text-dark">Aiusmod tempor did labore dolory</a></h6>
            <p class="mb-0 text-color">Aug 02, 2018</p>
          </div>
        </li>
      </ul>
    </div>
    <div class="widget">
      <h4>Tags</h4>
      <ul class="list-inline tag-list mt-4">
        <li class="list-inline-item mb-3"><a href="blog-details.html" class="text-color shadow">Business</a></li>
        <li class="list-inline-item mb-3"><a href="blog-details.html" class="text-color shadow">Market Analysis</a></li>
        <li class="list-inline-item mb-3"><a href="blog-details.html" class="text-color shadow">Consultancy</a></li>
        <li class="list-inline-item mb-3"><a href="blog-details.html" class="text-color shadow">Marketing</a></li>
        <li class="list-inline-item mb-3"><a href="blog-details.html" class="text-color shadow">Finance</a></li>
      </ul>
    </div>
  </div>
</div>
    </div>
  </div>
</section>
      </div>
    </section>
    <script>
      $(function () {
        $('#myTab li:last-child a').tab('show');
      })
    </script>


    <!-- subscription -->

    <?php 
    include 'footer_professor.php';
    ?>
