

<?php 
  include 'classes/conexao.php';
  include 'classes/professor.php';
  include 'classes/turma.php';
  include 'header_professor.php';


  $turma = new Turma();

  $turma->CapturarTurmasProfessor($conexao,$id);
  print_r($turma);


 ?>


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
                        <li class="breadcrumb-item text-white" aria-current="page">Career</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>




<!-- nav part end

</section>
<section class="section section-lg-bottom bg-light">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 text-center">
        <p class="subtitle"></p>
        <h2 class="section-title">Suas Turmas</h2>
      </div>
      <div class="col-lg-12 bg-white p-4 rounded shadow my-3">
        <div class="media align-items-center flex-column flex-sm-row">
          <img src="images/career/logo-1.png" class="mr-sm-3 mb-4 mb-sm-0 border rounded p-2" alt="logo-1">
          <div class="media-body text-center text-sm-left mb-4 mb-sm-0">
            <h6 class="mt-0"></h6>
            <p class="mb-0 text-gray"></p>
          </div>
          <a href="career-details.html" class="btn btn-outline-primary">Apply Now</a>
        </div>
      </div>
      <div class="col-lg-12 bg-white p-4 rounded shadow my-3">
        <div class="media align-items-center flex-column flex-sm-row">
          <img src="images/career/logo-2.png" class="mr-sm-3 mb-4 mb-sm-0 border rounded p-2" alt="logo-1">
          <div class="media-body text-center text-sm-left mb-4 mb-sm-0">
            <h6 class="mt-0"><?php echo($professor->getNome()); ?></h6>
            <p class="mb-0 text-gray">MySQL Developer I West New York, USA I Full Time I 2 Days Ago</p>
          </div>
          <a href="career-details.html" class="btn btn-outline-primary">Apply Now</a>
        </div>
      </div>
      <div class="col-lg-12 bg-white p-4 rounded shadow my-3">
        <div class="media align-items-center flex-column flex-sm-row">
          <img src="images/career/logo-3.png" class="mr-sm-3 mb-4 mb-sm-0 border rounded p-2" alt="logo-1">
          <div class="media-body text-center text-sm-left mb-4 mb-sm-0">
            <h6 class="mt-0">Web Project Manager - Team of PHP MySQL Developers</h6>
            <p class="mb-0 text-gray">MySQL Developer I West New York, USA I Full Time I 2 Days Ago</p>
          </div>
          <a href="career-details.html" class="btn btn-outline-primary">Apply Now</a>
        </div>
      </div>
      <div class="col-lg-12 bg-white p-4 rounded shadow my-3">
        <div class="media align-items-center flex-column flex-sm-row">
          <img src="images/career/logo-4.png" class="mr-sm-3 mb-4 mb-sm-0 border rounded p-2" alt="logo-1">
          <div class="media-body text-center text-sm-left mb-4 mb-sm-0">
            <h6 class="mt-0">Web Project Manager - Team of PHP MySQL Developers</h6>
            <p class="mb-0 text-gray">MySQL Developer I West New York, USA I Full Time I 2 Days Ago</p>
          </div>
          <a href="career-details.html" class="btn btn-outline-primary">Apply Now</a>
        </div>
      </div>
      <div class="col-lg-12 bg-white p-4 rounded shadow my-3">
        <div class="media align-items-center flex-column flex-sm-row">
          <img src="images/career/logo-5.png" class="mr-sm-3 mb-4 mb-sm-0 border rounded p-2" alt="logo-1">
          <div class="media-body text-center text-sm-left mb-4 mb-sm-0">
            <h6 class="mt-0">Web Project Manager - Team of PHP MySQL Developers</h6>
            <p class="mb-0 text-gray">MySQL Developer I West New York, USA I Full Time I 2 Days Ago</p>
          </div>
          <a href="career-details.html" class="btn btn-outline-primary">Apply Now</a>
        </div>
      </div>
    </div>
  </div>
</section>
 -->

<!--- Footer -->
  <?php 
  include 'footer_professor.php';

   ?>