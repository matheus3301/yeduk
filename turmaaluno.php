<?php 
session_start();
include 'classes/turma.php';
include 'classes/posts.php';
include 'header_aluno.php';
include 'classes/professor.php';

$id = $_GET['idTurma'];

$turma = new Turma();
$turma->setId($id);


$turma->CapturarTurma($conexao);
$capturarPostagem = $turma->CapturarPostagem($conexao);






$alunosPendentes = $turma->ListarAlunosPendentes($conexao);


$alunosCadastrados = $turma->ListarAlunosAprovados($conexao);

$professor = new Professor();
$professor->setId($turma->getId_professor());
$professor->CapturarProfessor($conexao);





?>



<style type="text/css">
.img-post{
  width: 100%;
  border-radius: 30px;

}

.certo{
  color: green;
}

.errado{
  color:red;

}
</style>
<section class="page-title page-title-overlay bg-cover" data-background="images/background/about.jpg">
  <div class="container">
    <div class="row">
      <div class="col-lg-8">
        <h1 class="text-white position-relative"><?php echo($turma->getNome()); ?></h1>
        <small class="text-light">Turma Criada em: <?php echo $turma->getData_criacao(); ?></small>
        <p class="text-white pt-4 pb-4"><?php echo($turma->getDescricao()); ?></p>
        <h5 class="text-white">Professor: <?php echo $professor->getNome(); ?></h5>

      </div>
      <div class="col-md-4 m-auto ">


       <?php 

       
       if ($turma->getImagem() != null) {
        echo '<img class="img-turma" src="data:'.$turma->getTipo_imagem().';base64,'.base64_encode( $turma->getImagem() ).'"/>';



      }else{
        ?>
        <img src="images/icon/man.png"   width="300px" height="300px"><br><br>
        <?php 
      }
      ?>
    </div>


  </div>

</div>
</section>






<section class="section section-lg-bottom bg-light ">
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
            <a class="nav-link" id="messages-tab" data-toggle="tab" href="#messages" role="tab" aria-controls="messages" aria-selected="false">Eventos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="questoes-tab" data-toggle="tab" href="#questoes" role="tab" aria-controls="questoes" aria-selected="false">Questões</a>
          </li>
          
          

        </ul>
        
        <div class="tab-content">
          <div class="tab-pane active" id="home" role="tabpanel" aria-labelledby="home-tab">
            <div class="row">
              <div class="col-md-12">



                <br>
                <div class="dropdown-divider"></div><br>
                <?php 
                if (isset($_GET ['op']) && $_GET['op'] == "novapostagem") {
                  ?>
                  <div class="alert alert-primary alert-dismissible fade show text-center"  role="alert">
                    Postagem adicionada com sucesso!

                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                <?php } ?>
                <?php 
                if (isset($_GET ['op']) && $_GET['op'] == "postexcluido") {
                  ?>
                  <div class="alert alert-danger alert-dismissible fade show text-center"  role="alert">
                    Uma postagem foi excluída!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                <?php } ?>

                <?php 
                if (isset($_GET ['op']) && $_GET['op'] == "postalterado") {
                  ?>
                  <div class="alert alert-warning alert-dismissible fade show text-center"  role="alert">
                    Uma postagem foi Alterada!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                <?php } ?>

                <h3 class="text-primary">Veja as últimas publicações.</h3><br>
                <?php 
                foreach ($capturarPostagem as $posts) { 

                  ?>

                  <div class="col-md-12 ">
                    <!-- Box Comment -->
                    <div class="post bg-white">
                      <div class="box box-widget ">
                        <div class="box-header without-border">
                          <div class="user-block ">

                           <?php 
                           if ($professor->getImagem() != null) {
                             ?>
                             <img src="mostra_imagem.php?idProf=<?php echo $professor->getId(); ?>"   class="img-circle img-pequena" >
                             <?php 



                           }else{
                            ?>
                            <img src="images/icon/man.png"   class="img-circle img-pequena">
                            <?php 
                          }


                          ?>
                          <span class="username"><a href="perfilprofessor.php?id=<?php echo $professor->getId(); ?>" class="nome_professor">Professor - <?php echo $professor->getNome(); ?></a></span>
                          <span class="description">Post - <?php echo $posts[4]; ?></span>
                        </div><!-- /.user-block -->

                      </div><!-- /.box-tools -->
                    </div><!-- /.box-header -->
                    <div class="box-body text-center bg-white">

                      <h4 class="text-center"><?php echo $posts[3]; ?></h4>
                      <?php 
                      if ($posts[8] != null) {
                        echo '<img class=" img-post" src="data:'.$posts[7].';base64,'.base64_encode( $posts[8] ).'" data-toggle="modal" data-target="#'.$posts[0].'ver"/>';
                      }else{?>
                        <img class=" img-post" src="images/defaultpost.png" alt="Photo"><?php 
                      }




                      $postOBJ = new Posts();
                      $postOBJ->setId($posts[0]);

                      $comentarios = $postOBJ->ListarComentarios($conexao);
                      ?>

                      <p class="text-left text-dark m-3"><?php echo $posts[2]; ?></p>

                      <p class="text-right text-muted  " style="font-size: 0.8em"> <?php echo count($comentarios); ?> Comentário(s)</p>
                      <div class="modal fade bd-example-modal-lg-a" id="<?php echo $posts[0].'ver';?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">



                        <div class="modal-dialog modal-lg">
                          <div class="modal-content">
                            <div class="modal-header">

                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="row col-md-12">

                              <div class="col-md-6 ">
                               <p class="text-left text-dark" ><?php echo $posts[2]; ?></p>
                               <?php 
                               if ($posts[8] != null) {
                                echo ' <img class=" img-post-modal" src="data:'.$posts[7].';base64,'.base64_encode( $posts[8] ).'" data-toggle="modal" data-target="#'.$posts[0].'ver"/> ';
                                ?>



                              <?php }else{ ?>
                                <img class=" img-post" src="images/defaultpost.png" alt="Photo"><?php 
                              }
                              ?>
                              
                            </div>
                            <div class="col-md-6 coment-modal">
                              <?php
                              
                              $postOBJ = new Posts();
                              $postOBJ->setId($posts[0]);

                              $comentarios = $postOBJ->ListarComentarios($conexao);
                              ?>

                              

                              <p class="text-right text-muted  " style="font-size: 0.8em"> <?php echo count($comentarios); ?> Comentário(s)</p>
                              

                              <?php 



                              foreach ($comentarios as $comentarioAtual ) {?>
                                <?php 
                                if ($comentarioAtual[2] != null) {
                                  $alunoComentario = new Aluno();

                                  $alunoComentario->setId($comentarioAtual[2]);
                                  $alunoComentario->CapturarAluno($conexao);


                                  ?>


                                  <div class="box-comment ">

                                    <?php 
                                    if ($alunoComentario->getImagem() != null) {
                                     ?>
                                     <img src="mostra_imagem_aluno.php?idAluno=<?php echo $alunoComentario->getId(); ?>" class="img-responsive img-circle img-sm img-circle img-pequena"  >
                                     <?php 
                                   }else{
                                    ?>
                                    <img src="images/icon/man.png" class="img-responsive img-circle img-sm img-circle img-pequena"  >
                                  <?php } ?>

                                  <div class="comment-text text-left">

                                   <span class="username ml-1">
                                    <?php echo $alunoComentario->getNome(); ?>
                                    <span class="text-muted pull-right text-light"><?php echo $comentarioAtual[5]; ?></span>
                                  </span><br><!-- /.username -->
                                  <?php echo $comentarioAtual[1]; ?>
                                  <div class="dropdown-divider"></div>  

                                </div><!-- /.comment-text -->
                              </div><!-- /.box-comment -->

                              <?php 

                            }else{

                             $professorComentario = new Professor();

                             $professorComentario->setId($comentarioAtual[4]);
                             $professorComentario->CapturarProfessor($conexao);


                             ?>


                             <div class="box-comment">

                              <?php 
                              if ($professorComentario->getImagem() != null) {
                               ?>
                               <img src="mostra_imagem.php?idProf=<?php echo $professorComentario->getId(); ?>" class="img-responsive img-circle img-sm img-circle img-pequena"  >
                               <?php 
                             }else{
                              ?>
                              <img src="images/icon/man.png" class="img-responsive img-circle img-sm img-circle img-pequena"  >
                            <?php } ?>

                            <div class="comment-text text-left">

                             <a href="perfilprofessor.php?id=<?php echo $professor->getId(); ?>"></a><span class="username text-primary ml-1">
                              <?php echo $professorComentario->getNome(); ?>
                              <span class="text-muted pull-right text-light"><?php echo $comentarioAtual[5]; ?></span>
                            </span></a><!-- /.username -->
                            <?php echo $comentarioAtual[1]; ?>
                            <div class="dropdown-divider"></div>







                          </div><!-- /.comment-text -->
                        </div><!-- /.box-comment -->


                        <?php 


                      }
                      ?>





                      <?php 
                    }
                    ?>






                  </div>
                  
                  
                  
                </div>
                <form action="valida_cadastro/comenta_post_aluno.php?idT=<?php  echo $turma->getId() ?>" method="post" class ="m-4">
                  <?php 
                  if ($professor->getImagem() != null) {
                   ?>
                   <img src="mostra_imagem_aluno.php" class="img-responsive img-circle img-sm img-circle img-pequena m-1"   >
                   <?php 



                 }else{
                  ?>
                  <img src="images/icon/man.png" class="img-responsive img-circle img-sm img-circle img-pequena"  >
                  <?php 
                }



                ?>


                <div class="img-push">
                  <div class="row">
                    <div class="col-md-10">
                      <input type="text" class="form-control input-sm"  name="idPost" hidden="" value='<?php  echo $posts[0]; ?>'>
                      <input type="text" class="form-control input-sm"  name="idProfessor" hidden="" value='<?php  echo $professor->getId(); ?>'>
                      <input type="text" class="form-control input-sm comentar"  name="comentario" placeholder="digite um comentário..." >
                    </div>
                    <div class="col-md-2">
                      <button type="submit" class="btn-circle-coment " id="enviaDdos"><i class="fa fa-paper-plane fa-x text-white"></i></button>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>

        



      </div><!-- /.box-body -->
      <div class="dropdown-divider"></div>
      <h6 class="m-4" id="exibir">Comentários</h6>
      <div class="box-footer box-comments bg-white coment">


        <?php 
        


        foreach ($comentarios as $comentarioAtual ) {?>
          <?php 
          if ($comentarioAtual[2] != null) {
            $alunoComentario = new Aluno();

            $alunoComentario->setId($comentarioAtual[2]);
            $alunoComentario->CapturarAluno($conexao);


            ?>


            <div class="box-comment">
              <?php 
              if ($alunoComentario->getImagem() != null) {
               ?>
               <img src="mostra_imagem_aluno.php?idAluno=<?php echo $alunoComentario->getId(); ?>" class="img-responsive img-circle img-sm img-circle img-pequena"  >
               <?php 
             }else{
              ?>
              <img src="images/icon/man.png" class="img-responsive img-circle img-sm img-circle img-pequena"  >
            <?php } ?>

            <div class="comment-text ">

             <a href="perfilaluno.php?id=<?php echo $alunoComentario->getId(); ?>"><span class="username ">
              <?php echo $alunoComentario->getNome(); ?>
              <span class="text-muted pull-right text-light"><?php echo $comentarioAtual[5]; ?></span>
            </span></a><!-- /.username -->
            <?php echo $comentarioAtual[1]; ?>
          </div><!-- /.comment-text -->
        </div><!-- /.box-comment -->

        <?php 

      }else{

        $professorComentario = new Professor();

        $professorComentario->setId($comentarioAtual[4]);
        $professorComentario->CapturarProfessor($conexao);


        ?>


        <div class="box-comment ">
          <?php 
          if ($professorComentario->getImagem() != null) {
           ?>
           <img src="mostra_imagem.php?idProf=<?php echo $professorComentario->getId(); ?>" class="img-responsive img-circle img-sm img-circle img-pequena"  >
           <?php 
         }else{
          ?>
          <img src="images/icon/man.png" class="img-responsive img-circle img-sm img-circle img-pequena"  >
        <?php } ?>

        <div class="comment-text ">

         <a href="perfilprofessor.php?id=<?php echo $professorComentario->getId(); ?>"><span class="username text-primary ">
          <?php echo $professorComentario->getNome(); ?>
          <span class="text-muted pull-right text-light"><?php echo $comentarioAtual[5]; ?></span>
        </span></a><!-- /.username -->
        <?php echo $comentarioAtual[1]; ?>
      </div><!-- /.comment-text -->
    </div><!-- /.box-comment -->
    

    <?php 


  }
  ?>





  <?php 
}
?>











</div><!-- /.box-footer -->
<form action="valida_cadastro/comenta_post_aluno.php?idT=<?php  echo $turma->getId() ?>" method="post" >
  <?php 
  if ($aluno->getImagem() != null) {
   ?>
   <img src="mostra_imagem_aluno.php" class="img-responsive img-circle img-sm img-circle img-pequena m-1"   >
   <?php 



 }else{
  ?>
  <img src="images/icon/man.png" class="img-responsive img-circle img-sm img-circle img-pequena"  >
  <?php 
}



?>


<div class="img-push">
  <div class="row">
    <div class="col-md-10">
      <input type="text" class="form-control input-sm"  name="idPost" hidden="" value='<?php  echo $posts[0]; ?>'>
      <input type="text" class="form-control input-sm"  name="idAluno" hidden="" value='<?php  echo $aluno->getId(); ?>'>
      <input type="text" class="form-control input-sm comentar"  name="comentario" placeholder="digite um comentário..." >
    </div>
    <div class="col-md-2">
      <button type="submit" class="btn-circle-coment mb-3"><i class="fa fa-paper-plane fa-x text-white"></i></button>
    </div>
  </div>
</div>
</form>
</div><!-- /.box-footer -->
</div><!-- /.box -->






<br><br><br>
<?php }?>

</div>
</div>
</div>


<div class="tab-pane"id="questoes" role="tabpanel" aria-labelledby="questoes-tab">
  <div class="row">
    <div class="col-md-12">

      <h4>Questões</h4>
      <?php 
      $questoes = $turma->ListarQuestoesTurma($conexao);
      ?>


      <?php 

      foreach ($questoes as $questaoAtual) { ?>
        <div class="box box-widget">
          <div class="box-header with-border">
            <div class="user-block">
             <?php 
             if ($professor->getImagem() != null) {
               ?>
               <img src="mostra_imagem.php?idProf=<?php echo $professor->getId(); ?>"   class="img-circle img-pequena" >
               <?php 



             }else{
              ?>
              <img src="images/icon/man.png"   class="img-circle img-pequena">
              <?php 
            }


            ?>
            <span class="username"><a href="#"><?php echo $professor->getNome(); ?></a></span>

          </div>
          <!-- /.user-block -->

        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <h4><?php echo $questaoAtual[1]; ?></h4>

          
          <div class="custom-control custom-radio">
            <input type="radio" id="customRadio<?php echo $questaoAtual[0]; ?>1" name="itens<?php echo $questaoAtual[0]; ?>" value="<?php if($questaoAtual[8] == 1){ echo '1';}else{ echo '0';} ?>" class="custom-control-input">
            <label class="custom-control-label" for="customRadio<?php echo $questaoAtual[0]; ?>1"><?php echo $questaoAtual[3]; ?></label>
          </div>
          <div class="custom-control custom-radio">
            <input type="radio" id="customRadio<?php echo $questaoAtual[0]; ?>2" name="itens<?php echo $questaoAtual[0]; ?>" value="<?php if($questaoAtual[8] == 2){ echo '1';}else{ echo '0';} ?>" class="custom-control-input">
            <label class="custom-control-label" for="customRadio<?php echo $questaoAtual[0]; ?>2"><?php echo $questaoAtual[4]; ?></label>
          </div>
          <div class="custom-control custom-radio">
            <input type="radio" id="customRadio<?php echo $questaoAtual[0]; ?>3" name="itens<?php echo $questaoAtual[0]; ?>" value="<?php if($questaoAtual[8] == 3){ echo '1';}else{ echo '0';} ?>" class="custom-control-input">
            <label class="custom-control-label" for="customRadio<?php echo $questaoAtual[0]; ?>3"><?php echo $questaoAtual[5]; ?></label>
          </div>
          <div class="custom-control custom-radio">
            <input type="radio" id="customRadio<?php echo $questaoAtual[0]; ?>4" name="itens<?php echo $questaoAtual[0]; ?>" value="<?php if($questaoAtual[8] == 4){ echo '1';}else{ echo '0';} ?>" class="custom-control-input">
            <label class="custom-control-label" for="customRadio<?php echo $questaoAtual[0]; ?>4"><?php echo $questaoAtual[6]; ?></label>
          </div>
          <div class="custom-control custom-radio">
            <input type="radio" id="customRadio<?php echo $questaoAtual[0]; ?>5" name="itens<?php echo $questaoAtual[0]; ?>" value="<?php if($questaoAtual[8] == 5){ echo '1';}else{ echo '0';} ?>" class="custom-control-input">
            <label class="custom-control-label" for="customRadio<?php echo $questaoAtual[0]; ?>5"><?php echo $questaoAtual[7]; ?></label>
          </div>
          <div class="form-group row">
           <p id="resposta<?php echo $questaoAtual[0]; ?>"></p>
           <div class="col-sm-10 text-left" style="margin-top: 10%">
            <button type="button" id="btnRes<?php echo $questaoAtual[0]; ?>" onclick="ResponderQuestao(value)"  value="<?php echo $questaoAtual[0]; ?>" class="btn btn-primary">Responder</button>





          </div>
        </div>





      </div>

    </div>




    <?php 
  }

  ?>



  <!-- /.box-body -->










</div>
</div>
</div>

















<div class="tab-pane" id="profile" role="tabpanel" aria-labelledby="profile-tab">


  <h4>Colegas de Turma</h4>
  <?php 

  if ($alunosCadastrados != null) {
   foreach ($alunosCadastrados as $alunoAtual) { ?>
    <div class="col-lg-12 bg-white p-4 rounded shadow my-3">
      <div class="media align-items-center flex-column flex-sm-row">
        <?php 
        if ($alunoAtual[3] != null) { ?>

          <img src="mostra_imagem_aluno.php?idAluno=<?php echo $alunoAtual[2];?>" class="foto-perfil">

        <?php }else{
          ?>
          <i class="fa-4x fas fa-globe-americas" ></i>
          <?php 
        }

        ?>

        <div class="media-body text-center text-sm-left mb-4 mb-sm-0" style="padding-left:5%">
          <h6 class="mt-0"><?php echo $alunoAtual[0];?></h6>


        </div>


      </div>
    </div>
  <?php }
}else{ ?>
 <div class="col-lg-12 bg-white p-4 rounded shadow my-3">
  <div class="media align-items-center flex-column flex-sm-row">
    <i class="fa-4x fas fa-globe-americas" ></i>
    <div class="media-body text-center text-sm-left mb-4 mb-sm-0" style="padding-left:5%">
      <h6 class="mt-0">Não há alunos participando da turma</h6>

    </div>


  </div>
</div>
<?php              }?>


</div>
<div class="tab-pane" id="messages" role="tabpanel" aria-labelledby="messages-tab">
  <div class="tab-pane active" id="messages" role="tabpanel" aria-labelledby="home-tab">
    <div class="row">
      <div class="col-md-12">

        <h4>Eventos da Turma </h4>

        <div id='calendar' ></div><br><br><br>
        <?php 
        $eventos = $turma->ListarEventosTurma($conexao);

        ?>
        




      </div>
    </div>
  </div>
</div>


</div>

</div>
<div class="col-lg-4">
  <div class="rounded-sm shadow bg-white pb-4">
    <div class="widget">
      <h4 class="text-success">Online</h4>
      <form action="#">
        <div class="position-relative">
          <input type="text" placeholder="Buscar" class="border-bottom form-control rounded-0 px-0">
          <button class="search-btn" type="submit"><i class="fa fa-search"></i></button>
        </div>
      </form>
    </div>
    <div class="widget">
      <h4>Alunos da turma online</h4>
      <ul class=" text-success text-bold list-bordered" style="font-size: 1.2em;">
        <li class="online"><a class="text-color d-block py-3" href="blog-details.html">Aluno</a></li>
        <li class="online"><a class="text-color d-block py-3" href="blog-details.html">Aluno</a></li>
        <li class="online"><a class="text-color d-block py-3" href="blog-details.html">Aluno</a></li>
        <li class="online"><a class="text-color d-block py-3" href="blog-details.html">Aluno</a></li>
        <li class="online"><a class="text-color d-block py-3" href="blog-details.html">Aluno</a></li>
        <li class="online"><a class="text-color d-block py-3" href="blog-details.html">Aluno</a></li>
      </ul>
    </div>

  </div>
</section>

<script>
  $(function () {
    $('#myTab li:last-child a').tab('show');
  })
  
  $(document).ready(function(){
    $('.cpf').mask('000.000.000-00');
  });

  function editar(bool) {

   var inputs = document.getElementsByTagName("input");
   for (var i = 0; i < inputs.length; i++) {
    if (inputs[i].type === "text") {
      inputs[i].readOnly = bool;
    }
  }


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
v

$('#editar').fadeIn(1000);
$('.i').hide();




}
function editarText() {
  var bio = document.getElementById('biografia');
  bio.disabled = false;
  $('#text').hide();
  $('.i2').fadeIn(1000);
}




$( "#exibir" ).click(function() {
  $( ".box-coment" ).slideDown( "slow", function() {

  });
});








</script>

<script>

  document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
      plugins: [ 'dayGrid' ],
      locale: 'pt-br',
      timeZone: 'UTC',
      defaultView: 'dayGridMonth',
      events: [

      <?php 
      foreach ($eventos as $eventoAtual) {
       ?>
       {
        id:'<?php echo $eventoAtual[0]; ?>',
        title:'<?php echo $eventoAtual[1]; ?>',
        start:'<?php echo $eventoAtual[2]; ?>'
      },


      <?php   
    }

    ?>


    ]








  });

    calendar.render();
  });

</script>

<script type="text/javascript">

  function ResponderQuestao(value){

    console.log("Respondendo....");

    var selValue = $('input[name=itens'+value+']:checked').val(); 



    if (selValue == '1') {
      console.log("Acertou");
      $('#resposta'+value).removeClass("errado");
      $('#resposta'+value).addClass("certo");
      $('#resposta'+value).html('<br><i class="far fa-check-circle"></i><b>Parabéns, você acertou! ;) </b>');

    }else{
      console.log("Errou");
      $('#resposta'+value).removeClass("certo");
      $('#resposta'+value).addClass("errado");
      $('#resposta'+value).html('<br><i class="far fa-times-circle"></i><b>Você errou!  :( </b>');
    }

  }








</script>



<!---- Modal Adicionar Evento ----->






</div>
</div>
</div>
</div>



<!-- subscription -->

<?php 
include 'footer_professor.php';
?>
