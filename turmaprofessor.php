<?php 
if (!isset($_GET['id'])) {
  header('location:minhasturmasprofessor.php');
}




session_start();
include 'classes/posts.php';

include 'classes/aluno.php';


include 'classes/turma.php';
include 'header_professor.php';

$id = $_GET['id'];

$turma = new Turma();
$turma->setId($id);


$turma->CapturarTurma($conexao);
$capturarPostagem = $turma->CapturarPostagem($conexao);






$alunosPendentes = $turma->ListarAlunosPendentes($conexao);


$alunosCadastrados = $turma->ListarAlunosAprovados($conexao);




?>





<style type="text/css">

.img-post{
  width: 100%;
  border-radius: 30px;

}

.sumido{
  display: none;
}
small{
  font-size: 0.4em;
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
        echo '<img class="img-turma mr-1 img-top" src="data:'.$turma->getTipo_imagem().';base64,'.base64_encode( $turma->getImagem() ).'"/>';



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
            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Alunos   <span class="badge badge-danger badge-counter"><?php if (count($alunosPendentes) > 0) {
             echo count($alunosPendentes);
           } ?></span></a>
         </li>
         <li class="nav-item">
          <a class="nav-link" id="global-tab" data-toggle="tab" href="#global" role="tab" aria-controls="global" aria-selected="false">Chat Global</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="messages-tab" data-toggle="tab" href="#messages" role="tab" aria-controls="messages" aria-selected="false">Eventos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="questoes-tab" data-toggle="tab" href="#questoes" role="tab" aria-controls="questoes" aria-selected="false">Questões</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="settings-tab" data-toggle="tab" href="#settings" role="tab" aria-controls="settings" aria-selected="false">Configurações</a>
        </li>



      </ul>



      
      
      <div class="tab-content" >
        <div class="tab-pane active" id="home" role="tabpanel" aria-labelledby="home-tab">
          <div class="row">
            <div class="col-md-12">

              <h1 class="subtitle">Faça uma nova Publicação na Turma</h1>
              <div class="dropdown-divider"></div>
              <h6 class="text-dark"> <?php 
              if ($professor->getImagem() != null) {
               ?>
               <img src="mostra_imagem.php"  class="img-circle img-pequena" >
               <?php 



             }else{
              ?>
              <img src="images/icon/man.png"   class="img-circle img-pequena">
              <?php 
            }
            ?> <?php echo $professor->getNome();?></h6>
            <br>
            <div class="row">
              <div class="col-md-8">
                <form action="postagemturma.php?idTurma=<?php echo $turma->getId(); ?>" method="POST" enctype="multipart/form-data">

                  <input type="text" id="inpt" name="titulo" class="form-control" required="" placeholder="Título da Postagem" >
                  <br>


                  <textarea class="form-control publicacao text-primary bg-white" name="publicacao" required="" ></textarea>

                  <br>

                  <center>                    
                    <span class="btn btn-outline-primary btn-file text-primary mb-2"></i>
                      <i class="far fa-image"></i> Imagem<input type="file" name="imagem"  accept="image/*" onchange="loadPost(event)"style="float: left; margin-left: 5%;">
                    </span>
                    <button type="submit" class=" btn btn-outline-primary text-center" ><i class="fas fa-check"></i> Publicar</button><br><br>
                    </center>

                
                </form>
                <script>
                  var loadPost = function(event) {
                    var output = document.getElementById('outputPost');
                    output.src = URL.createObjectURL(event.target.files[0]);
                  };
                </script>
              </div>
              <div class="col-md-4">
                <center>
                <img src="images/defaultpost.png " id="outputPost" class="img-post"  >
                </center>
              </div>
            </div>

            <br><br>
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
              <section id="post<?php echo $posts[0]; ?>">
              <div class="col-md-12 ">
                <!-- Box Comment -->
                <div class="post bg-white">
                  <div class="box box-widget ">
                    <div class="box-header without-border">
                      <div class="user-block ">

                       <?php 
                       if ($professor->getImagem() != null) {
                         ?>
                         <img src="mostra_imagem.php"   class="img-circle img-pequena" >
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
                    <div class="box-tools">
                      <button type="button" class="bt-more dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-list text-dark"></i>
                      </button>
                      <div class="dropdown-menu text">
                        <a class="dropdown-item" data-toggle="modal" data-target='#<?php echo $posts[0]."excluir"; ?>'>Excluir Postagem</a>
                        <a class="dropdown-item" data-toggle="modal" data-target="#<?php echo $posts[0]."alterar"; ?>">Alterar Postagem</a>
                      </div>
                    </div>
                  </div><!-- /.box-tools -->
                </div><!-- /.box-header -->
                <div class="box-body text-center bg-white">

                  <h4 class="text-center"><?php echo $posts[3]; ?></h4>

                  <?php 
                  if ($posts[8] != null) {
                    echo ' <img class=" img-post" src="data:'.$posts[7].';base64,'.base64_encode( $posts[8] ).'" data-toggle="modal" data-target="#'.$posts[0].'ver"/>';
                    ?>
                    <div class="modal fade bd-example-modal-lg" id="<?php echo $posts[0].'alterar';?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">



                      <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Faça a Alteração que deseja em sua Postagem</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="row">
                            <div class="col-md-12" style="padding:5%;">
                             <form action="valida_alt/alterarpost.php?idTurma=<?php echo $turma->getId(); ?>&idP=<?php echo $posts[0]; ?>" method="POST">
                              <label class="lbls text-center">Título da Postagem</label>
                              <input type="text" id="inpt" name="titulo" class="form-control" value="<?php echo $posts[3]; ?>" >
                              <br>
                              <textarea class="form-control publicacao text-primary" name="publicacao" ><?php echo $posts[2]; ?></textarea><br>
                              <button type="submit" class="btn btn-outline-primary">Alterar</button>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                <?php }else{ ?>
                  <img class=" img-post" src="images/defaultpost.png" alt="Photo"><?php 
                }



                $postOBJ = new Posts();
                $postOBJ->setId($posts[0]);

                $comentarios = $postOBJ->ListarComentarios($conexao);
                ?>

                <p class="text-left text-dark" ><?php echo $posts[2]; ?></p>

                <p class="text-right text-muted  " style="font-size: 0.8em"> <?php echo count($comentarios); ?> Comentário(s)</p>

              </div><!-- /.box-body -->
              <div class="dropdown-divider"></div>
              
              

              <div class="box-footer box-comments bg-white coment">



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

              <div class="comment-text ">

               <span class="username text-primary ">
                <?php echo $professorComentario->getNome(); ?>
                <span class="text-muted pull-right text-light"><?php echo $comentarioAtual[5]; ?></span>
              </span><!-- /.username -->
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




    <div class="box-footer">
      <form action="valida_cadastro/comenta_post_professor.php?idT=<?php  echo $turma->getId() ?>" method="post" >
        <?php 
        if ($professor->getImagem() != null) {
         ?>
         <img src="mostra_imagem.php" class="img-responsive img-circle img-sm img-circle img-pequena m-1"   >
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
            <input type="text" class="form-control input-sm comentar"  name="comentario" required="" placeholder="digite um comentário..." >
          </div>
          <div class="col-md-2 text-center">

            <button type="submit" class="btn-circle-coment" id="enviaDados"><i class="fa fa-paper-plane fa-x text-white ml-10"></i></button>
          </div>
        </div>
      </div>
    </form>
  </div><!-- /.box-footer -->
</div><!-- /.box -->
</div>

</section>




<div class="modal fade" id="<?php echo $posts[0]."excluir"; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Deseja Excluir Esta Postagem?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-dark">
       <strong><?php echo $posts[3];?></strong><br>
       <p><?php echo $posts[2];?></p>
     </div>
     <div class="modal-footer">

      <a class="btn btn-outline-primary " href="excluirposts.php?id=<?php echo $posts[0]; ?>&idT=<?php echo $turma->getId(); ?>">Excluir</a>
    </div>
  </div>
</div>
</div>
<div class="modal fade bd-example-modal-lg" id="<?php echo $posts[0].'alterar';?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Faça a Alteração que deseja em sua Postagem</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="row">
        <div class="col-md-12" style="padding:5%;">
         <form action="valida_alt/alterarpost.php?idTurma=<?php echo $turma->getId(); ?>&idP=<?php echo $posts[0]; ?>" method="POST">
          <label class="lbls text-center">Título da Postagem</label>
          <input type="text" id="inpt" name="titulo" class="form-control" value="<?php echo $posts[3]; ?>" >
          <br>
          <textarea class="form-control publicacao text-primary" name="publicacao" ><?php echo $posts[2]; ?></textarea><br>
          <button type="submit" class="btn btn-outline-primary">Alterar</button>
        </form>
      </div>
    </div>
  </div>
</div>
</div>
<br><br><br>
<?php }?>

</div>
</div>
</div>
<div class="tab-pane" id="global" role="tabpanel" aria-labelledby="global-tab">
  <div class="row">
    <div class="col-md-12">
      <div class="box box-primary chat-global">
        <div class="box-header with-border">
          <h3 class="box-title"> <?php 


          if ($turma->getImagem() != null) {
            echo '<img  class="img-pequena" src="data:'.$turma->getTipo_imagem().';base64,'.base64_encode( $turma->getImagem() ).'"/>';



          }else{
            ?>
            <img src="images/icon/man.png"  id="output" width="300px" height="300px"><br><br>
            <?php 
          }



          ?>  <?php echo $turma->getNome(); ?></h3>
          <div class="box-tools pull-right">



          </div>
        </div><!-- /.box-header -->
        <div class="box-body">

          <script type="text/javascript">
            var resposta = null;


            function AtualizaChatGlobal(){
              var req = new XMLHttpRequest();

              req.open('GET', 'chat/chat_global_professor.php?idTurma=<?php echo $turma->getId(); ?>', true);
              req.send();

              req.onreadystatechange = function(){
                if (req.readyState == 4 && req.status == 200) {
              //alert("Rodando");




              if (resposta != req.responseText) {

                audio.play();
                resposta = req.responseText;



                document.getElementById('chatGlobal').innerHTML = req.responseText;
                $('#chatGlobal').scrollTop($('#chatGlobal')[0].scrollHeight);
              }

            }
          }

          
        }

        //LOOP PARA ATUALIZAR A DIV 
        setInterval(function(){AtualizaChatGlobal();}, 750);
      </script>












      <!-- Conversations are loaded here -->
      <div class="direct-chat-messages messages" id="chatGlobal"></div><!--/.direct-chat-messages-->

      <!-- Contacts are loaded here -->
    </div><!-- /.box-body -->
    <div class="box-footer">

      <div class="input-group">
        <input type="text" name="mensagemGlobal" id="mensagemGlobal" placeholder="Digite aqui..." class="form-control msg">
        <span class="input-group-btn">
          <button type="button" class="btn-circle-chat mt-2" id="enviaGlobal"><i class="fa fa-paper-plane fa-x text-white ml-10"></i></button>
        </span>
      </div>


      <!-- ENVIA MENSAGEM INICIO -->
      <script>
       $("#enviaGlobal").click(function(){
        if ($("input[name='mensagemGlobal']").val() != "") {
         $.ajax({
           dataType:'html',
           url:"chat/professor_envia_global.php",
           type:"POST",
           data:({mensagem:$("input[name='mensagemGlobal']").val(),idTurma: <?php  echo $turma->getId(); ?>}),

           beforeSend: function(data){ 
            console.log("Mandou mensagem");


            $("#mensagemGlobal").val("");


          }, success:function(data){



          }, complete: function(data){}


        });
       }





     });
   </script>


   <!-- ENVIA MENSAGEM FIM -->



 </div><!-- /.box-footer-->
</div>


</div>
</div>
</div>


<div class="tab-pane"id="questoes" role="tabpanel" aria-labelledby="questoes-tab">
  <div class="row">
    <div class="col-md-12">
      <h4>Questões <button type="button" class="btn btn-primary text-center btn-circle-content " data-toggle="modal" data-target="#modal_questao">+</button></h4>

      <table class="table table-hover">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Enunciado</th>
            <th scope="col">Resposta Certa</th>
            <th scope="col">Ações</th>

          </tr>
        </thead>
        <tbody>
         <?php 
         $questoes = $turma->ListarQuestoesTurma($conexao);

         ?>

         <?php 
         foreach ($questoes as $questaoAtual) { ?>
          <tr>
           <th scope="row"><?php echo $questaoAtual[0]; ?></th>
           <td><?php echo $questaoAtual[1]; ?></td>
           <td><?php 
           if ($questaoAtual[8] == 1) {
            echo $questaoAtual[3];
          }
          if ($questaoAtual[8] == 2) {
            echo $questaoAtual[4];
          }
          if ($questaoAtual[8] == 3) {
            echo $questaoAtual[5];
          }
          if ($questaoAtual[8] == 4) {
            echo $questaoAtual[6];
          }
          if ($questaoAtual[8] == 5) {
            echo $questaoAtual[7];
          }

          ?></td>
          <td><a  class="btn btn-outline-primary text-dark text-center" data-toggle="modal" data-target='#questao<?php echo $questaoAtual[0]."alterar"; ?>'>Editar</a>
            <a  class="btn btn-outline-danger text-dark text-center" data-toggle="modal" data-target='#questao<?php echo $questaoAtual[0]."excluir"; ?>'>Excluir</a></td>
          </tr>



          <!-- MODAL EXCLUIR QUESTÕES -->
          <div class="modal fade" id="questao<?php echo $questaoAtual[0]."excluir"; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLongTitle">Deseja Excluir Esta Questão?</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body text-dark">
                 <p><?php echo $questaoAtual[1];?></p>
               </div>
               <div class="modal-footer">

                <a class="btn btn-outline-primary " href="valida_delete/excluir_questao.php?id=<?php echo $questaoAtual[0]; ?>&idT=<?php echo $turma->getId(); ?>">Excluir</a>
              </div>
            </div>
          </div>
        </div>

        <!-- MODAL EDITAR QUESTÕES -->
        <div class="modal fade bd-example-modal-lg" id="questao<?php echo $questaoAtual[0].'alterar';?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Faça a Alteração no Evento</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="row">
                <div class="col-md-12" style="padding:5%;">
                <form class="row" method="post" action="valida_alt/altera_questao.php?id=<?php echo $questaoAtual[0];?>&idT=<?php echo $turma->getId(); ?>">
          <div class="col-lg-12">
           <label for="exampleInputtext1" class=" lbls ">Enunciado:</label>

           <textarea  class="form-control mb-4 inpts text-primary" name="enunciado" required=""><?php echo $questaoAtual[1]; ?>
           </textarea>
         </div>

         <!---- ITEM 1 ----->
         <div class="col-lg-12">
          <div class="row">
            <div class="col-sm-2">
              <div class="custom-control custom-radio">
                <input type="radio" <?php
                 if($questaoAtual[8] == 1){
                  echo 'checked';
                 } 

                 ?> id="customRadio1" name="itemCerto" class="custom-control-input" value="1" required="">
                <label class="custom-control-label" for="customRadio1"></label>
              </div>
            </div>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="itemA" value="<?php echo $questaoAtual[3]; ?>" placeholder="Item A">
            </div>
          </div>
        </div>
        <!---- FIM ITEM 1 ----->



        <!---- ITEM 2 ----->
        <div class="col-lg-12">
          <div class="row">
            <div class="col-sm-2">
              <div class="custom-control custom-radio">
                <input type="radio" <?php
                 if($questaoAtual[8] == 2){
                  echo 'checked';
                 } 

                 ?> id="customRadio2" name="itemCerto" class="custom-control-input" value="2" required="">
                <label class="custom-control-label" for="customRadio2"></label>
              </div>
            </div>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="itemB" value="<?php echo $questaoAtual[4]; ?>" placeholder="Item B">
            </div>
          </div>
        </div>
        <!---- FIM ITEM 2 ----->

        <!---- ITEM 3 ----->
        <div class="col-lg-12">
          <div class="row">
            <div class="col-sm-2">
              <div class="custom-control custom-radio">
                <input type="radio"  id="customRadio3" name="itemCerto" class="custom-control-input" value="3" required="" <?php
                 if($questaoAtual[8] == 3){
                  echo 'checked';
                 } 

                 ?>>
                <label class="custom-control-label" for="customRadio3"></label>
              </div>
            </div>
            <div class="col-sm-10">
              <input type="text" class="form-control" value="<?php echo $questaoAtual[5]; ?>" name="itemC" placeholder="Item C">
            </div>
          </div>
        </div>
        <!---- FIM ITEM 3 ----->


        <!---- ITEM 4 ----->
        <div class="col-lg-12">
          <div class="row">
            <div class="col-sm-2">
              <div class="custom-control custom-radio">
                <input type="radio" <?php
                 if($questaoAtual[8] == 4){
                  echo 'checked';
                 } 

                 ?> id="customRadio4" name="itemCerto" class="custom-control-input" value="4" required="">
                <label class="custom-control-label" for="customRadio4"></label>
              </div>
            </div>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="itemD" value="<?php echo $questaoAtual[6]; ?>" placeholder="Item D">
            </div>
          </div>
        </div>
        <!---- FIM ITEM 4 ----->

        <!---- ITEM 5 ----->
        <div class="col-lg-12">
          <div class="row">
            <div class="col-sm-2">
              <div class="custom-control custom-radio">
                <input type="radio" <?php
                 if($questaoAtual[8] == 5){
                  echo 'checked';
                 } 

                 ?> id="customRadio5" name="itemCerto" class="custom-control-input" value="5" required="">
                <label class="custom-control-label" for="customRadio5"></label>
              </div>
            </div>
            <div class="col-sm-10">
              <input type="text" class="form-control" value="<?php echo $questaoAtual[7]; ?>" name="itemE" placeholder="Item E">
            </div>
          </div>
        </div>
        <!---- FIM ITEM 5 ----->



        
        <div class="col-12" style="margin-top: 10%">
          <button type="submit" class="btn btn-block btn-outline-primary">Alterar</button>
          <br><br>
        </div>
      </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    <?php }
    ?>
  </tbody>
</table>






</div>
</div>
</div>

















<div class="tab-pane" id="profile" role="tabpanel" aria-labelledby="profile-tab">
  <h4>Solicitações de Entrada</h4>
  <?php 

  if ($alunosPendentes != null) {
    foreach ($alunosPendentes as $alunoAtual) { ?>
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
          <form action="responder_aplicacao.php?idTurma=<?php echo $turma->getId();?>&idMatricula=<?php echo $alunoAtual[1] ?>" method="post">
            <button name="op" value="recusa" type="submit"class="btn btn-danger btn-circle btn-circle btn-lg"><i class="fas fa-user-times"></i></button>
            <button name="op" value="aceita" type="submit" class="btn btn-success btn-circle btn-circle btn-lg"><i class="fas fa-user-check"></i></button>
          </form>         

        </div>
      </div>
    <?php }
  }else{ ?>
    <div class="col-lg-12 bg-white p-4 rounded shadow my-3">
      <div class="media align-items-center flex-column flex-sm-row">
        <i class="fa-4x fas fa-globe-americas" ></i>
        <div class="media-body text-center text-sm-left mb-4 mb-sm-0" style="padding-left:5%">
          <h6 class="mt-0">Não há solicitações de participação pendentes</h6>

        </div>


      </div>
    </div>
  <?php }?>

  <h4>Alunos da Turma</h4>

  <audio id="audio">

    <source src="chat/toque-sms.mp3" type="audio/mpeg">
      Seu navegador não possui suporte ao elemento audio
    </audio>



    <?php 

    if ($alunosCadastrados != null) {
     foreach ($alunosCadastrados as $alunoAtual) { ?>


      <div class="box box-primary direct-chat box-chat direct-chat-primary sumido" id="chat<?php echo $alunoAtual[2]; ?>" >
        <div class="box-header with-border">
          <h3 class="box-title"><?php echo $alunoAtual[0]; ?></h3><span data-toggle="tooltip" title="3 New Messages" class="badge bg-light-blue">3</span>
          <div class="box-tools pull-right">

            <i class="fas fa-times-circle text-primary" id="fecharChat<?php echo $alunoAtual[2]; ?>" onclick="FechaChat(<?php echo $alunoAtual[2]; ?>);"></i>

          </div>
        </div><!-- /.box-header -->







        <!-- COMEÇA O ATUALIZADOR DE CHAT  _-->

        <script type="text/javascript">
          var resposta<?php echo $alunoAtual[2]; ?> = null;


          function AtualizaChat<?php echo $alunoAtual[2]; ?>(){
            var req = new XMLHttpRequest();

            req.open('GET', 'chat/chat_professor_aluno.php?idAluno=<?php echo $alunoAtual[2]; ?>', true);
            req.send();

            req.onreadystatechange = function(){
              if (req.readyState == 4 && req.status == 200) {
                if (resposta<?php echo $alunoAtual[2]; ?> != req.responseText) {
                  audio.play();
                  resposta<?php echo $alunoAtual[2]; ?> = req.responseText;

                  //alert(req.responseText);
                  //alert(document.getElementById('chatContent<?php echo $alunoAtual[2]; ?>').innerHTML);

                  document.getElementById('chatContent<?php echo $alunoAtual[2]; ?>').innerHTML = req.responseText;
                  $('#chatContent<?php echo $alunoAtual[2]; ?>').scrollTop($('#chatContent<?php echo $alunoAtual[2]; ?>')[0].scrollHeight);
                }

              }
            }


          }

        //LOOP PARA ATUALIZAR A DIV 
        setInterval(function(){AtualizaChat<?php echo $alunoAtual[2]; ?>();}, 750);
      </script>






      <!-- TERMINA O ATUALIZADOR DE CHAT  _-->


      <!-- COMEÇA O CHAT! _-->

      <div class="box-body">
        <!-- Conversations are loaded here -->
        <div class="direct-chat-messages messages" id="chatContent<?php echo $alunoAtual[2]; ?>"></div><!--/.direct-chat-messages-->

        <!-- Contacts are loaded here -->
        <div class="direct-chat-contacts">
          <ul class="contacts-list">
            <li>
              <a href="#">
               <?php 
               if ($professor->getImagem() != null) {
                 ?>
                 <img src="mostra_imagem.php"  class="img-circle img-pequena" >
                 <?php 



               }else{
                ?>
                <img src="images/icon/man.png"   class="img-circle img-pequena">
                <?php 
              }
              ?>

            </a>
          </li><!-- End Contact Item -->
        </ul><!-- /.contatcts-list -->
      </div><!-- /.direct-chat-pane -->
    </div><!-- /.box-body -->
    <div class="box-footer">

      <div class="input-group">
        <input type="text" name="mensagem<?php echo $alunoAtual[2]; ?>"  id="mensagem<?php echo $alunoAtual[2]; ?>"  placeholder="Digite aqui ..." class="form-control msg">
        <span class="input-group-btn">
          <button type="button" class="btn-circle-chat mt-2" id="enviar<?php echo $alunoAtual[2]; ?>"><i class="fa fa-paper-plane fa-x text-white ml-10"></i></button>
        </span>
      </div>
      


      <!-- ENVIA MENSAGEM INICIO -->
      <script>
       $("#enviar<?php echo $alunoAtual[2]; ?>").click(function(){
        if ($("input[name='mensagem<?php echo $alunoAtual[2]; ?>']").val() != "") {
         $.ajax({
           dataType:'html',
           url:"chat/professor_envia_aluno.php",
           type:"POST",
           data:({mensagem:$("input[name='mensagem<?php echo $alunoAtual[2]; ?>']").val(),idAluno: <?php  echo $alunoAtual[2]; ?>}),

           beforeSend: function(data){ 
            console.log("Mandou mensagem");


            $("#mensagem<?php echo $alunoAtual[2]; ?>").val("");


          }, success:function(data){



          }, complete: function(data){}


        });
       }





     });
   </script>


   <!-- ENVIA MENSAGEM FIM -->




 </div><!-- /.box-footer-->
</div>

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
      <h6 class="mt-0 "><a href="perfilaluno.php?id=<?php echo $alunoAtual[2]; ?>" class="text-dark"><?php echo $alunoAtual[0];?></a></h6>


    </div>

    <i class="fas fa-comments fa-2x text-primary" id="chamaChat<?php echo $alunoAtual[2]; ?>" onclick="ChamaChat(<?php echo $alunoAtual[2]; ?>);"></i><span class="badge badge-danger badge-counter">4</span>

    <button name="op" value="remove" class="btn btn-danger btn-circle btn-circle btn-lg"><i class="fas fa-user-times"></i></button>         

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

        <h4>Eventos Turma <button type="button" class="btn btn-primary text-center btn-circle-content " data-toggle="modal" data-target="#modal_add">+</button></h4>

        <div id='calendar' ></div><br><br><br>
        <?php 
        $eventos = $turma->ListarEventosTurma($conexao);

        ?>
        <h4>Controle Eventos</h4>
        <table class="table table-hover">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Título</th>
              <th scope="col">Data</th>
              <th scope="col">Ações</th>
            </tr>
          </thead>
          <tbody>


            <?php 
            foreach ($eventos as $eventoAtual) { ?>
              <tr>
               <th scope="row"><?php echo $eventoAtual[0]; ?></th>
               <td><?php echo $eventoAtual[1]; ?></td>
               <td><?php echo $eventoAtual[2]; ?></td>
               <td><a  class="btn btn-outline-primary text-dark text-center" data-toggle="modal" data-target='#evento<?php echo $eventoAtual[0]."alterar"; ?>'>Editar</a>
                <a  class="btn btn-outline-danger text-dark text-center" data-toggle="modal" data-target='#evento<?php echo $eventoAtual[0]."excluir"; ?>'>Excluir</a></td>
              </tr>




              <div class="modal fade" id="evento<?php echo $eventoAtual[0]."excluir"; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLongTitle">Deseja Excluir Este Evento?</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body text-dark">
                     <p><?php echo $eventoAtual[1];?></p>
                   </div>
                   <div class="modal-footer">

                    <a class="btn btn-outline-primary " href="valida_delete/excluir_evento.php?id=<?php echo $eventoAtual[0]; ?>&idT=<?php echo $turma->getId(); ?>">Excluir</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="modal fade bd-example-modal-lg" id="evento<?php echo $eventoAtual[0].'alterar';?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Faça a Alteração no Evento</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="row">
                    <div class="col-md-12" style="padding:5%;">
                     <form action="valida_alt/altera_evento.php?idTurma=<?php echo $turma->getId(); ?>&idE=<?php echo $eventoAtual[0]; ?>" method="POST">
                      <label class="lbls text-center">Título</label>
                      <input type="text" id="inpt" name="titulo" class="form-control" value="<?php echo $eventoAtual[1]; ?>" >
                      <br>
                      <label class="lbls text-center">Data</label>
                      <input type="date" id="inpt" name="data" class="form-control" value="<?php echo $eventoAtual[2]; ?>" ><br><br>
                      <button type="submit" class="btn btn-outline-primary">Alterar</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        <?php }
        ?>
      </tbody>
    </table>




  </div>
</div>
</div>
</div>

<div class="tab-pane" id="settings" role="tabpanel" aria-labelledby="settings-tab">
  <section class="section section-lg-bottom">
    <div class="container">
      <div class="row">

        <div class="col-lg-12">

          <br>
          <?php 
          if (isset($_GET ['op']) && $_GET['op'] == "turmaalterada") {
            ?>
            <div class="alert alert-primary alert-dismissible fade show text-center"  role="alert">
              Informações Alteradas com sucesso!

              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          <?php } ?>

          <h3 class="section-title">Verifique as informações da Turma</h3>
        </div>
        <div class="col-lg-12 text-center p-0">
          <form class="row" action="valida_alt/altera_dados_turma.php?id=<?php echo $turma->getId(); ?>" method="POST">
            <div class="col-lg-12">
             <label for="exampleInputtext1" class="lbls ">Nome da Turma:</label>
             <input type="text" id="inpt" name="nome" class="form-control" readonly="" value="<?php echo($turma->getNome());?>"> 
           </div>


           <div class="col-lg-12">
            <br><br>
            <label for="exampleInputtext1" class="lbls ">Descrição:</label>
            <input type="text" id="inpt" class="form-control" name="descricao" readonly="" value=" <?php echo($turma->getDescricao());?>">





            <div class="col-12 text-right">
              <br><br>
              <a href="turmaprofessor.php?id=<?php echo $turma->getId(); ?>"><i class="far fa-times-circle text-danger fa-2x i"></i></a>
              <button type="submit" class="btn-submit"><i class="far fa-check-circle text-success fa-2x i"></i></button>
              <a class="btn btn-outline-primary" id="editar" onclick="editar(false);">Editar Turma</a>

              <br><br>
            </div>
          </form>

          <form action="valida_alt/altera_img_turma.php?idTurma=<?php echo($turma->getId()); ?>" enctype="multipart/form-data" method="post">
            <div class="col-lg-4 m-auto" >


             <center>


              <?php 


              if ($turma->getImagem() != null) {
                echo '<img id="output-turma" class="img-turma-setting " src="data:'.$turma->getTipo_imagem().';base64,'.base64_encode( $turma->getImagem() ).'"/>';



              }else{
                ?>
                <img src="images/icon/man.png"  id="output" width="300px" height="300px"><br><br>
                <?php 
              }



              ?>
              <div class="btn btn-outline-primary btn-file text-dark mb-2 mt-2" style="width:250px; "></i>
                Buscar Foto <input type="file" name="imagem"  accept="image/*" onchange="loadFile(event)">
              </div>


              <input type="hidden" name="MAX_FILE_SIZE" value="99999999"/>
              <br>
              <button type="submit" class="btn btn-outline-primary text-dark text-center " style="width:250px;" >Salvar</button>

              <script>
                var loadFile = function(event) {
                  var output = document.getElementById('output-turma');
                  output.src = URL.createObjectURL(event.target.files[0]);
                };
              </script>
            </center>

          </div>
        </form>


      </div>

    </div>
  </div>
  <br><br><br>
</section>

</div>
</div>

</div>

<div class="col-lg-4">
  <div class="rounded-sm shadow bg-white pb-4">
    <div class="widget">
      <h4 class="text-success">Postagens</h4>

    </div>
    <div class="widget">
      <ul class=" text-primary text-bold list-bordered" style="font-size: 1.2em;">
        <?php 
          foreach ($capturarPostagem as $postAtual) { ?>
              <li class="online"><a class="text-color d-block py-3" href="#post<?php echo $postAtual[0]; ?>"><?php echo $postAtual[3]; ?></a></li>
          <?php }
         ?>



        
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
<script type="text/javascript">

  var ultimo;

  function ChamaChat(id) {
   $("#chamaChat"+id).click(function(){
    FechaTodoChat(id);

    $("#chat"+id).slideDown(100);


  });
 }
 function FechaChat(id) {
   $("#fecharChat"+id).click(function(){
    $("#chat"+id).fadeOut(100);
  });
 }
 function FechaTodoChat(id) {

  $("#chat"+ultimo).hide();
  ultimo = id;
}

function ExpandChat() {
 $("#expand").click(function(){
  $(".chat-expand").fadeIn(100);
});
}
function NormalChatGlobal() {
 $("#exitChat").click(function(){
  $(".chat-expand").fadeOut(100);
});
}
</script>




<!---- Modal Adicionar Questão ----->

<div class="modal fade" id="modal_questao">
  <div class="modal-dialog" >
    <div class="modal-content">
      <div class="modal-header" style="background:linear-gradient(to right, #00d2ff,#3a7bd5);">
       <h4 class="modal-title text-white">
        <img src="images/logo/logo.png"> Criar Questão
      </h4>
      <button type="button" class="close" data-dismiss="modal"><span><i class="fas fa-times-circle text-white"></i></span></button>
    </div>
    <div class="modal-body"> 
      <div class="col-lg-12 text-center">
        <h3 class="section-title">Nova Questão</h3>
      </div>
      <div class="col-lg-12 text-center p-0">
        <form class="row" method="post" action="valida_cadastro/cadastra_questao.php?idTurma=<?php echo $turma->getId(); ?>">
          <div class="col-lg-12">
           <label for="exampleInputtext1" class=" lbls ">Enunciado:</label>

           <textarea  class="form-control mb-4 inpts text-primary" name="enunciado" required=""></textarea>
         </div>

         <!---- ITEM 1 ----->
         <div class="col-lg-12">
          <div class="row">
            <div class="col-sm-2">
              <div class="custom-control custom-radio">
                <input type="radio" id="customRadio1" name="itemCerto" class="custom-control-input" value="1" required="">
                <label class="custom-control-label" for="customRadio1"></label>
              </div>
            </div>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="itemA" placeholder="Item A">
            </div>
          </div>
        </div>
        <!---- FIM ITEM 1 ----->



        <!---- ITEM 2 ----->
        <div class="col-lg-12">
          <div class="row">
            <div class="col-sm-2">
              <div class="custom-control custom-radio">
                <input type="radio" id="customRadio2" name="itemCerto" class="custom-control-input" value="2" required="">
                <label class="custom-control-label" for="customRadio2"></label>
              </div>
            </div>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="itemB" placeholder="Item B">
            </div>
          </div>
        </div>
        <!---- FIM ITEM 2 ----->

        <!---- ITEM 3 ----->
        <div class="col-lg-12">
          <div class="row">
            <div class="col-sm-2">
              <div class="custom-control custom-radio">
                <input type="radio" id="customRadio3" name="itemCerto" class="custom-control-input" value="3" required="">
                <label class="custom-control-label" for="customRadio3"></label>
              </div>
            </div>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="itemC" placeholder="Item C">
            </div>
          </div>
        </div>
        <!---- FIM ITEM 3 ----->


        <!---- ITEM 4 ----->
        <div class="col-lg-12">
          <div class="row">
            <div class="col-sm-2">
              <div class="custom-control custom-radio">
                <input type="radio" id="customRadio4" name="itemCerto" class="custom-control-input" value="4" required="">
                <label class="custom-control-label" for="customRadio4"></label>
              </div>
            </div>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="itemD" placeholder="Item D">
            </div>
          </div>
        </div>
        <!---- FIM ITEM 4 ----->

        <!---- ITEM 4 ----->
        <div class="col-lg-12">
          <div class="row">
            <div class="col-sm-2">
              <div class="custom-control custom-radio">
                <input type="radio" id="customRadio5" name="itemCerto" class="custom-control-input" value="5" required="">
                <label class="custom-control-label" for="customRadio5"></label>
              </div>
            </div>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="itemE" placeholder="Item E">
            </div>
          </div>
        </div>
        <!---- FIM ITEM 4 ----->



        
        <div class="col-12" style="margin-top: 10%">
          <button type="submit" class="btn btn-block btn-outline-primary">Adicionar Questão</button>
          <br><br>
        </div>
      </form>
    </div>
  </div>
</div>
</div>
</div>


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

<!--- Modal Ver Posts -->












<!-- subscription -->

<?php 
include 'footer_professor.php';
?>
