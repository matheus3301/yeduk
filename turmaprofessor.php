<?php 

include 'classes/turma.php';
include 'header_professor.php';

$id = $_GET['id'];

$turma = new Turma();
$turma->setId($id);


$turma->CapturarTurma($conexao);
$capturarPostagem = $turma->CapturarPostagem($conexao);

$professor = new Professor();
$professor->setId($turma->getId_professor());

$professor->CapturarProfessor($conexao);




$alunosPendentes = $turma->ListarAlunosPendentes($conexao);


$alunosCadastrados = $turma->ListarAlunosAprovados($conexao);




?>

<style type="text/css">
.section{
  margin-top: 5%;
}
.publicacao{
  background-color: transparent;
  border:1px solid #009afa;
  color:#fff;
  resize:none;
}
.mensagem{
  padding:10px;
  border-radius: 5px;
}
.mensagem:hover{
  background-color: #ebebeb;
  transition: .4s linear;
}
#output{
  width:40px;
  height:40px;
  border-radius: 60px;
}
.btn-send{
 background: linear-gradient(45deg, #00a8f4 0%, #02d1a1 100%);
 border:none;
 float:right;
}
.visualizar:hover {
  background-color: red;
}
.btn-pub{
  border:none;
  color:#009afa;
  height:40px;
  width:100px;
  border-radius:40px;
  background-color: transparent;
  box-shadow: 0px 0px 5px #909090;

}

.bio:disabled{
  background-color: transparent;
  border:none;
}
.btn-submit{
  border:none;
  background-color: transparent;
}
.btn-pub:hover{
  background: linear-gradient(45deg, #00a8f4 0%, #02d1a1 100%);
  color:#fff;
  transition: .4s linear;
}
.ch{
 background: linear-gradient(80deg, #0030cc 0%, #00a4db 100%);
 color:#fff;
}
.small {
  float:right;
}
.i{
  display: none;
}
#inpt{
  border:1px solid #009afa;
}
.lbls{
  font-size: 1em;
  font-weight: bold;
  color: #3a7bd5;
}
.btn-send{


}

.btn-circle{
  width: 30px;
  height: 30px;
  text-align: center;
  padding:6px 0;
  font-size: 12px;
  line-height: 1.428571429;
  border-radius: 15px;
}
.btn-circle.btn-lg{
  width:50px;
  height: 50px;
  padding: 1px 1px;
  font-size: 1em;
  line-height: 1.33;
  border-radius: 25px;
}
.bt-more {
  border:none;
  background-color:transparent;
  color: #fff;
}
</style>
<section class="page-title page-title-overlay bg-cover" data-background="images/background/about.jpg">
  <div class="container">
    <div class="row">
      <div class="col-lg-8">
        <h1 class="text-white position-relative"><?php echo($turma->getNome()); ?></h1>
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
          <div class="tab-pane active" id="home" role="tabpanel" aria-labelledby="home-tab">
            <div class="row">
              <div class="col-md-12">

                <h1 class="subtitle">Faça uma nova Publicação na Turma</h1>
                <div class="dropdown-divider"></div>
                <h6 class="text-dark"><i class="fas fa-user-edit fa-2x"></i><?php echo $professor->getNome();?></h6>
                <br>
                <form action="postagemturma.php?idTurma=<?php echo $turma->getId(); ?>" method="POST">
                  <label class="lbls text-center">Título da Postagem</label>
                  <input type="text" id="inpt" name="titulo" class="form-control" required="Apresente o Conteúdo de sua postagem" >
                  <br>
                  <textarea class="form-control publicacao text-primary" name="publicacao" required="" > 
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
                foreach ($capturarPostagem as $posts) { ?>
                  <div class="card cards"> 

                    <div class="card-header ch">
                      <h5 class="text-white"></i>
                        <?php 
                        if ($professor->getImagem() != null) {
                         ?>
                         <img src="mostra_imagem.php" id="output">
                         <?php 



                       }else{
                        ?>
                        <img src="images/icon/man.png"  id="output" width="200px" height="200px"><br><br>
                        <?php 
                      }


                      ?> Professor - <?php echo $professor->getNome();?>  <small class="text-right small text-light"><div class="btn-group">
                        <button type="button" class="bt-more dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <i class="fas fa-list text-white"></i>
                        </button>
                        <script type="text/javascript">
                          var loadFile = function(event) {
                            var output = document.getElementById('output');
                            output.src = URL.createObjectURL(event.target.files[0]);
                          };
                        </script>
                        <div class="dropdown-menu">
                          <a class="dropdown-item" data-toggle="modal" data-target='#<?php echo $posts[0]."excluir"; ?>'>Excluir Postagem</a>
                          <a class="dropdown-item" data-toggle="modal" data-target="#<?php echo $posts[0]."alterar"; ?>">Alterar Postagem</a>
                        </div>
                      </div> </small></h5>
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

                </div>
                <div class="card-body">
                  <h5 class="card-title"><?php echo $posts[3]; ?></h5>
                  <p class="card-text"><?php echo $posts[2]; ?></p>

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
                <i class="fa-4x fas fa-globe-americas" ></i>
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
        <?php 

        if ($alunosCadastrados != null) {
         foreach ($alunosCadastrados as $alunoAtual) { ?>
          <div class="col-lg-12 bg-white p-4 rounded shadow my-3">
            <div class="media align-items-center flex-column flex-sm-row">
              <i class="fa-4x fas fa-globe-americas" ></i>
              <div class="media-body text-center text-sm-left mb-4 mb-sm-0" style="padding-left:5%">
                <h6 class="mt-0"><?php echo $alunoAtual[0];?></h6>

              </div>
              <form action="responder_aplicacao.php?idTurma=<?php echo $turma->getId();?>" method="post">
                <button name="op" value="remove" class="btn btn-primary btn-circle btn-circle btn-lg"><i class="fas fa-comments"></i></button>
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




          <div class="card cards">
            <div class="card-header ch">
              <h5 class="text-white text-light">Suas Mensagens</h5>

            </div>
            <a href="mensagemprofessor.php" class="visualizar">

              <div class="card-body">
                <div class="mensagem">

                 <button class="btn-ourline-primary btn-circle btn-send"><i class="fas fa-paper-plane text-white fa-1x"></i></button>
                 <h5 class="card-title"><i class="fa fa-user"></i> Aluno</h5>

                 <p class="card-text">Conteúdo da Mensagem</p>
               </a>
             </div>
             <div class="dropdown-divider"></div>
             <div class="mensagem">

               <button class="btn-ourline-primary btn-circle btn-send"><i class="fas fa-paper-plane text-white fa-1x"></i></button>
               <h5 class="card-title"><i class="fa fa-user"></i> Aluno</h5>

               <p class="card-text">Conteúdo da Mensagem</p>
             </a>
           </div>
           <div class="dropdown-divider"></div>
           <div class="mensagem">

             <button class="btn-ourline-primary btn-circle btn-send"><i class="fas fa-paper-plane text-white fa-1x"></i></button>
             <h5 class="card-title"><i class="fa fa-user"></i> Aluno</h5>

             <p class="card-text">Conteúdo da Mensagem</p>
           </a>
         </div>
         <div class="dropdown-divider"></div>
         <div class="mensagem">

           <button class="btn-ourline-primary btn-circle btn-send"><i class="fas fa-paper-plane text-white fa-1x"></i></button>
           <h5 class="card-title"><i class="fa fa-user"></i> Aluno</h5>

           <p class="card-text">Conteúdo da Mensagem</p>
         </a>
       </div>
       <div class="dropdown-divider"></div>


     </div>
   </div>

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


<!-- subscription -->

<?php 
include 'footer_professor.php';
?>
