<?php
  session_start();
  $id = $_SESSION['idprof'];


  include 'header_professor.php';
  include 'classes/professor.php';
  include 'classes/conexao.php';

    $professor = new Professor();

    $professor->setId($id);
    $professor->CapturarProfessor($conexao);


    
?>
<style type="text/css">
  .lbls{
    font-size: 1em;
    font-weight: bold;
    color: #3a7bd5;
    float: left;
  }
  .inpts{
    border:none;
    color:rgba(0,0,0,.4);
    
    
  }
  .inpts:focus{
    background-color: transparent;
    border-bottom: : 2px solid #009afa;
    color:rgba(0,0,0,.4);
    transition: .4s linear;

  }

</style>
<section class="page-title page-title-overlay " data-background="images/background/about.jpg">
  <div class="container">
    <div class="row">
      <div class="col-lg-7">
        <h1 class="text-white position-relative">
        <span class="watermark-sm">Professor: <?php echo($professor->getNome()); ?></span>Professor:<?php echo($professor->getNome()); ?>
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
        <p class="subtitle">Suas Informações</p>
        <h3 class="section-title">Verifique suas Informações!</h3>
      </div>
      <div class="col-lg-6 text-center p-0">
          <form class="row">
          <div class="col-lg-12">
           <label for="exampleInputtext1" class="lbls ">Seu nome:</label>

           <input type="text" class="form-control mb-4 inpts" disabled value="<?php echo($professor->getNome());?>">
         </div>
         <div class="col-lg-12">
           <label for="exampleInputtext1" class="lbls ">Seu Email:</label>
           <input type="text" class="form-control mb-4 inpts" disabled value="<?php echo($professor->getEmail());?>" >

           
         </div>
         
        <div class="col-lg-6">
          <label for="exampleInputtext1" class=" lbls">Data de Nascimento:</label>
          <input type="date" class="form-control mb-4 inpts" disabled value="<?php echo($professor->getData_nasc());?>" >
        </div>
        <div class="col-lg-6">
          <label for="exampleInputtext1" class=" lbls">Nível de Escolaridade:</label>
          <input type="text" class="form-control inpts" disabled value="<?php echo($professor->getEscolaridade());?>" ></input>
          



          
        </div>
         <div class="col-lg-12">
          <label for="exampleInputtext1" class="lbls">CPF:</label>
          <input type="text" class="form-control mb-4 inpts cpf" disabled value="<?php echo($professor->getCpf());?>" >
        </div>
        <div class="col-12">
          <a class="btn btn-primary text-white">Editar Perfil</a>
          <br><br>
        </div>
      </form>
    </div>
    <div class="col-lg-6 text-center p-0">
      <img src="images/banner/banner-2.png" width="350px" height="350px">
    </div>
  </div>
</div>
</section>






<?php
    include 'footer_professor.php';
?>
