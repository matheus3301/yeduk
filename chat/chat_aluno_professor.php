
<?php 
	include '../classes/conexao.php';
	include '../classes/aluno.php';
	include '../classes/professor.php';
	include '../classes/mensagemprofessor.php';

	$gerenciador = new MensagemProfessor();

	session_start();
	$gerenciador->setId_professor($_GET['idProf']);
	$gerenciador->setId_aluno($_SESSION['idaluno']);


	$mensagens = $gerenciador->ListarMensagens($conexao);

	foreach ($mensagens as $mensagemAtual ) { 
		if ($mensagemAtual[2] == "aluno") { $aluno = new Aluno(); $aluno->setId($gerenciador->getId_aluno()); $aluno->CapturarAluno($conexao);?>
			 



           <!-- COMEÇA MENSAGEM PROFESSOR -->

          <!-- Message to the right -->
          <div class="direct-chat-msg right" style="width: 70%; margin-left: 30%;">
            <div class="direct-chat-info clearfix">

              <span class="direct-chat-timestamp " style="float:right;"><?php echo  $mensagemAtual[5]; ?></span>
            </div><!-- /.direct-chat-info -->
            <?php 
            if ($aluno->getImagem() != null) {
             ?>
             <img src="mostra_imagem_aluno.php"  class="img-circle img-pequena-chat direct-chat-img">
             <?php 



           }else{
            ?>
            <img src="images/icon/man.png"  class="img-circle img-pequena-chat direct-chat-img">
            <?php 
          }
          ?> 



          <div class="direct-chat-text text-right" style="border:none;   background:linear-gradient(45deg, #00a8f4 0%, #02d1a1 100%);">
            <div style="width: 80%;"><p class="text-white" style="word-wrap: break-word; text-align: left; "><?php echo $mensagemAtual[1]; ?></p></div>
          </div><!-- /.direct-chat-text -->

        </div><!-- /.direct-chat-msg -->

        <!-- TERMINA MENSAGEM PROFESSOR -->






         

	<?php 	
			
		}if($mensagemAtual[2] == "professor"){ $professor = new Professor(); $professor->setId($gerenciador->getId_professor()); $professor->CapturarProfessor($conexao);?>

			 <!-- COMEÇA MENSAGEM ALUNO -->
          <div class="direct-chat-msg text-right" style="width: 70%;">
            <div class="direct-chat-info clearfix">


              

              <span class="direct-chat-timestamp pull-right" style="float:left;"><?php echo  $mensagemAtual[5]; ?></span>
            </div><!-- /.direct-chat-info -->
            <?php 
            if ($professor->getImagem() != null) { ?>

              <img src="mostra_imagem.php?idProf=<?php echo $professor->getId();?>" class="img-circle img-pequena-chat direct-chat-img">

            <?php }else{
              ?>
              <img src="images/icon/man.png"  class="img-circle img-pequena-chat direct-chat-img">
              <?php 
            }

            ?>

            <!-- /.direct-chat-img -->
            <div class="direct-chat-text text-left">
              <div><p style="word-wrap: break-word;"><?php echo $mensagemAtual[1]; ?></p></div>
            </div><!-- /.direct-chat-text -->
          </div><!-- /.direct-chat-msg -->


          <!-- TERMINA MENSAGEM ALUNO -->

	

	<?php 		

		}
	?>




	
		
	<?php  }  ?>

