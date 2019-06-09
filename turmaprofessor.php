<?php 

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


<section class="page-title page-title-overlay bg-cover" data-background="images/background/about.jpg">
  <div class="container">
    <div class="row">
      <div class="col-lg-8">
        <h1 class="text-white position-relative"><?php echo($turma->getNome()); ?></h1>
        <small class="text-light">Turma Criada em: <?php echo $turma->getData_criacao(); ?></small>
        <p class="text-white pt-4 pb-4"><?php echo($turma->getDescricao()); ?></p>
        <h5 class="text-white">Professor: <?php echo $professor->getNome(); ?></h5>

      </div>
      <div class="col-md-4 m-auto "  >
       <?php 
       if ($turma->getImagem() != null) {
         ?>
         <img src="mostra_imagem_turma.php?idTurma=<?php echo $turma->getId(); ?>" class="img-turma"><br><br>


         <?php 



       }else{
        ?>
        <img src="images/icon/man.png"   width="200px" height="200px"><br><br>


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
            <a class="nav-link" id="settings-tab" data-toggle="tab" href="#settings" role="tab" aria-controls="settings" aria-selected="false">Configurações</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="questoes-tab" data-toggle="tab" href="#questoes" role="tab" aria-controls="questoes" aria-selected="false">Questões</a>
          </li>

        </ul>
        
        <div class="tab-content">
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
              <form action="postagemturma.php?idTurma=<?php echo $turma->getId(); ?>" method="POST">
                <label class="lbls text-center">Título da Postagem</label>
                <input type="text" id="inpt" name="titulo" class="form-control" required="Apresente o Conteúdo de sua postagem" >
                <br>
                <textarea class="form-control publicacao text-primary bg-white" name="publicacao" required="" > 
                </textarea><br>
                <center>
                  <button class="btn-pub text-center"><i class="far fa-image"></i> Imagem</button>
                  <button type="submit" class="btn-pub text-center"><i class="fas fa-check"></i> Publicar</button>
                </center>
              </form>

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

                    <h4 class="text-left"><?php echo $posts[3]; ?></h4>
                    <img class="img-responsive pad" src="images/icon/man.png" alt="Photo">
                    <p class="text-left"><?php echo $posts[2]; ?></p>

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
                       <img src="mostra_imagem.php" class="img-responsive img-circle img-sm img-circle img-pequena"   >
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
                <div class="box-footer">
                  <form action="#" method="post" ">
                    <?php 
                    if ($professor->getImagem() != null) {
                     ?>
                     <img src="mostra_imagem.php" class="img-responsive img-circle img-sm img-circle img-pequena"   >
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
          </div>




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


<div class="tab-pane"id="questoes" role="tabpanel" aria-labelledby="questoes-tab">
  <div class="row">
    <div class="col-md-12">

      <h1 class="subtitle">Elabore Questões para seus Alunos</h1>
      <div class="dropdown-divider"></div>
      <h6 class="text-dark"> <?php 
      if ($professor->getImagem() != null) {
       ?>
       <img src="mostra_imagem.php"  class="img-circle img-pequena" >
       <?php 



     }else{
      ?>
      <img src="images/icon/man.png"  class="img-circle img-pequena ">
      <?php 
    }


    ?> <?php echo $professor->getNome();?></h6>
    <br>
    <form action="questaoturma.php?idTurma=<?php echo $turma->getId(); ?>" method="POST">
      <label class="lbls text-center">Título da questão</label>
      <input type="text" id="inpt" name="titulo" class="form-control" required="Apresente o Conteúdo de sua postagem" >
      <br>
      <textarea class="form-control publicacao text-primary bg-white" name="enuciado" required="" > 
      </textarea><br>
      <center>
        <button class="btn-pub text-center"><i class="far fa-image"></i> Imagem</button>
        <button type="submit" class="btn-pub text-center"><i class="fas fa-check"></i> Publicar</button>
      </center>
    </form>

    <br><br>
    <div class="dropdown-divider"></div><br>
    <?php 
    if (isset($_GET ['op']) && $_GET['op'] == "novaquestao") {
      ?>
      <div class="alert alert-primary alert-dismissible fade show text-center"  role="alert">
        Nova questão Adicionada!

        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <?php } ?>
    <?php 
    if (isset($_GET ['op']) && $_GET['op'] == "questaoxcluida") {
      ?>
      <div class="alert alert-danger alert-dismissible fade show text-center"  role="alert">
        Uma questão foi excluída!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <?php } ?>

    <?php 
    if (isset($_GET ['op']) && $_GET['op'] == "questaoalterada") {
      ?>
      <div class="alert alert-warning alert-dismissible fade show text-center"  role="alert">
        Uma questão foi Alterada!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <?php } ?>

    <h3 class="text-primary">Questões para responder</h3><br>
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

          <h4 class="text-left"><?php echo $posts[3]; ?></h4>
          <img class="img-responsive pad" src="images/icon/man.png" alt="Photo">
          <p class="text-left"><?php echo $posts[2]; ?></p>

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
             <img src="mostra_imagem.php" class="img-responsive img-circle img-sm img-circle "id="img-professor"   >
             <?php 



           }else{
            ?>
            <img src="images/icon/man.png" class="img-responsive img-circle img-sm img-circle "id="img-professor"  >
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
      <div class="box-footer">
        <form action="#" method="post" ">
          <?php 
          if ($professor->getImagem() != null) {
           ?>
           <img src="mostra_imagem.php" class="img-responsive img-circle img-sm img-circle img-pequena"   >
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
</div>




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
            <p><?php echo $alunoAtual[1];?></p>

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
        <form action="responder_aplicacao.php?idTurma=<?php echo $turma->getId();?>" method="post">
          <button name="op" value="remove" class="btn btn-primary btn-circle btn-circle btn-lg"><i class="fas fa-comments"></i><span class="badge badge-danger badge-counter">4</span>
          </button>
          <button name="op" value="remove" class="btn btn-danger btn-circle btn-circle btn-lg"><i class="fas fa-user-times"></i></button>

        </form>         

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
              <a href="turmaprofessor.php"><i class="far fa-times-circle text-danger fa-2x i"></i></a>
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
               ?>
               <img src="mostra_imagem_turma.php?id=<?php echo $turma->getId() ?>" id="output "width="300px" height="300px" ><br><br>
               <?php 



             }else{
              ?>
              <img src="images/icon/man.png"  id="output" width="300px" height="300px"><br><br>
              <?php 
            }


            ?>
            <span class="btn btn-outline-primary btn-file text-dark" style="width:250px; "></i>
              Buscar Foto <input type="file" name="imagem"  accept="image/*" onchange="loadFile(event)">
            </span>


            <input type="hidden" name="MAX_FILE_SIZE" value="99999999"/>
            <br><br>
            <button type="submit" class="btn btn-outline-primary text-dark text-center" style="width:250px;" >Salvar</button>


          </center>

        </div>
      </form>


    </div>
    <div class="col-lg-5 text-center p-0">

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
  var loadFile = function(event) {
    var output = document.getElementById('output');
    output.src = URL.createObjectURL(event.target.files[0]);
  };
</script>


<!-- subscription -->

<?php 
include 'footer_professor.php';
?>
