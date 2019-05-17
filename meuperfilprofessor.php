<?php
  include 'classes/conexao.php';
  include 'classes/professor.php';
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
  .mod{
    position: absolute;
    width: 100%;
    padding: 50px;
    background-color: #fff;
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
        <br>
        <h3 class="section-title">Verifique suas Informações!</h3>
      </div>
      <div class="col-lg-6 text-center p-0">
          <form class="row">
          <div class="col-lg-12">
           <label for="exampleInputtext1" class="lbls ">Seu nome: <span class="text-dark"> <?php    echo ucfirst(($professor->getNome()));?> </span></label>

          
         </div>
         <div class="col-lg-12">
           <label for="exampleInputtext1" class="lbls ">Seu Email: <span class="text-dark"><?php echo($professor->getEmail());?></span></label>
         
         </div>
         
        <div class="col-lg-12">
          <label for="exampleInputtext1" class=" lbls">Data de Nascimento:   <span class="text-dark"><?php echo($professor->getData_nasc());?></span></label>
          
        </div>
        <div class="col-lg-12">
          <label for="exampleInputtext1" class=" lbls">Nível de Escolaridade: <span class="text-dark"><?php echo($professor->getEscolaridade());?></span></label>
          
        </div>
         <div class="col-lg-12">
          <label for="exampleInputtext1" class="lbls">CPF: <span class="text-dark">           <?php echo($professor->getCpf());?> 
        </span></label>
        </div>
        <br><br><br><br>
        <div class="col-12">
          <a class="btn btn-primary text-white"  data-toggle="modal" data-target=".bd-example-modal-lg">Editar Perfil</a>
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



<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">

  <div class="modal-dialog modal-lg">


    <div class="modal-content mod">
       <div class="modal-header" >
        <center> <h4 class="header-title"> Faça a alteração nas suas informações</h4></center>
                 <button type="button" class="close" data-dismiss="modal"><span><i class="fas fa-times-circle"></i></span></button>

             </div>
             <br><br>
      <form action="altera_professor.php" method="POST">
  <div class="form-row">
    <div class="form-group col-md-12 ">
      <label for="inputEmail4" class=" lbls " >Nome</label>
      <input type="text" class="form-control inputs text-dark"  name="nome" id="inputEmail4" value="<?php echo($professor->getNome());?>">
    </div>
    <div class="form-group col-md-12 ">
      <label for="inputPassword4" class=" lbls"  name="email">Email</label>
      <input type="email" class="form-control inputs text-dark" name="email" id="inputPassword4" value="<?php echo($professor->getEmail());?>" >
    </div>
     <div class="form-group col-md-12">
      <label for="inputPassword4" class=" lbls "  name="data_nasc">Data de Nasc.</label>
      <input type="date" class="form-control inputs text-dark" name="data_nasc" id="inputPassword4" value="<?php echo($professor->getData_nasc());?>" >
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6 ">
      <label for="inputEmail4" class=" lbls "  name="cpf">CPF</label>
      <input type="text" class="form-control inputs text-dark" name="cpf" id="inputEmail4" value="<?php echo($professor->getCpf());?>">
    </div>
    <div class="form-group col-md-6 ">
      <label for="exampleInputtext1" class=" lbls">Nível de Escolaridade:</label>
          <select class="form-control mb-4 inputs" name="escolaridade" required="" style="height: 60px;  name="escolaridade">
            <option value=""><?php echo($professor->getEscolaridade());?></option>
            <option>Ensino Fundamental Completo</option>
            <option>Ensino Fundamental Incompleto</option>
            <option>Ensino Médio Completo</option>
            <option>Ensino Médio Incompleto</option>
            <option>Ensino Superior Incompleto</option>
            <option>Ensino Superior Completo</option>



          </select>
        
    </div>
    <div class="col-lg-12">
           <label for="exampleInputtext1" class=" lbls ">Biografia:</label>
           <textarea  class="form-control mb-4 inputs text-primary" name="biografia"></textarea>  
         </div>
  </div>
   <div class="modal-footer m_footer" >
              <button type="submit" class="btn btn-primary">Alterar Informações</button>
            </div>
  
  
</form>
    </div>
  </div>
</div>





<?php
    include 'footer_professor.php';
?>
<script src="js/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
    $('.cpf').mask('000.000.000-00');
});


