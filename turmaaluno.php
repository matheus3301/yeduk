<?php 

include 'classes/turma.php';
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

.fc-title{
  color: white;
}
.img-post{
  width: 100%;
  border-radius: 30px;
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
                          <span class="username"><a href="#" class="nome_professor">Professor - <?php echo $professor->getNome(); ?></a></span>
                          <span class="description">Post - <?php echo $posts[4]; ?></span>
                        </div><!-- /.user-block -->

                      </div><!-- /.box-tools -->
                    </div><!-- /.box-header -->
                    <div class="box-body text-center bg-white">

                      <h4 class="text-left"><?php echo $posts[3]; ?></h4>
                      <?php 
                      if ($posts[8] != null) {
                        echo '<img class=" img-post" src="data:'.$posts[7].';base64,'.base64_encode( $posts[8] ).'"/>';
                      }else{?>
                          <img class=" img-post" src="images/defaultpost.png" alt="Photo"><?php 
                      }

                     ?>
                    
                    <p class="text-left text-dark m-3"><?php echo $posts[2]; ?></p>

                    <p class="text-right text-muted " style="font-size: 0.8em">[Numero Comentários]</p>
                      

                      <p class="text-left text-muted ">[Numero Comentários]</p>

                    </div><!-- /.box-body -->
                    <div class="dropdown-divider"></div>
                    <h6 class="m-4">Comentários</h6>
                    <div class="box-footer box-comments">


                      <div class="box-comment">
                        <!-- User image -->
                        <?php 
                        if ($professor->getImagem() != null) {
                         ?>
                         <img src="mostra_imagem.php?idProf=<?php echo $professor->getId(); ?>" class="img-responsive img-circle img-sm img-circle img-pequena"   >
                         <?php 



                       }else{
                        ?>
                        <img src="images/icon/man.png" class="img-responsive img-circle img-sm img-circle img-pequena"  >
                        <?php 
                      }


                      ?>

                      <div class="comment-text ">

                        <span class="username ">
                          <?php echo $professor->getNome(); ?>
                          <span class="text-muted pull-right text-light">8:03 PM Today</span>
                        </span><!-- /.username -->
                        Comentário
                      </div><!-- /.comment-text -->
                    </div><!-- /.box-comment -->
                  </div><!-- /.box-footer -->
                   <form action="#" method="post" >
                    <?php 
                    if ($aluno->getImagem() != null) {
                     ?>
                     <img src="mostra_imagem_aluno.php" class="img-responsive img-circle img-sm img-circle img-pequena"   >
                     <?php 



                   }else{
                    ?>
                    <img src="images/icon/man.png" class="img-responsive img-circle img-sm img-circle img-pequena"  >
                    <?php 
                  }



                  ?>


                  <div class="img-push">
                    <input type="text" class="form-control input-sm comentar"  placeholder="digite um comentário...">
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

        <h4>Eventos Turma <button type="button" class="btn btn-primary text-center btn-circle " data-toggle="modal" data-target="#modal_add">+</button></h4>

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



<!---- Modal Adicionar Evento ----->

<div class="modal fade" id="modal_add">
  <div class="modal-dialog" >
    <div class="modal-content">
      <div class="modal-header" style="background:linear-gradient(to right, #00d2ff,#3a7bd5);">
       <h4 class="modal-title text-white">
        <img src="images/logo/logo.png"> Cadastrar Novo Evento
      </h4>
      <button type="button" class="close" data-dismiss="modal"><span><i class="fas fa-times-circle text-white"></i></span></button>
    </div>
    <div class="modal-body"> 
      <div class="col-lg-12 text-center">
        <h3 class="section-title">Novo Evento</h3>
      </div>
      <div class="col-lg-12 text-center p-0">
        <form class="row" method="post" action="valida_cadastro/cadastra_evento.php?idTurma=<?php echo $turma->getId(); ?>">
          <div class="col-lg-12">
           <label for="exampleInputtext1" class=" lbls ">Título:</label>

           <input type="text" class="form-control mb-4 inpts text-primary" placeholder="Ex: Live no Youtube" name="titulo" required="">
         </div>
         <div class="col-lg-12">
           <label for="exampleInputtext1" class=" lbls ">Data:</label>
           <input type="date" class="form-control mb-4 inpts text-primary" name="data" required="">
         </div>
         
         <div class="col-12">
          <button type="submit" class="btn btn-block btn-outline-primary">Criar Evento</button>
          <br><br>
        </div>
      </form>
    </div>
    
    


  </div>
</div>
</div>
</div>



<!-- subscription -->

<?php 
include 'footer_professor.php';
?>
