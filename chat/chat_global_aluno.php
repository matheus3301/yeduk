
<?php 
include '../classes/conexao.php';
include '../classes/aluno.php';
include '../classes/professor.php';
include '../classes/mensagemglobal.php';

$gerenciador = new MensagemGlobal();

session_start();


$gerenciador->setId_turma($_GET['idTurma']);
$idAluno = $_SESSION['idaluno'];


$mensagens = $gerenciador->ListarMensagens($conexao);


	//TENTAR MENSAGEM DO ALUNO

foreach ($mensagens as $mensagemAtual ) { 
	if ($mensagemAtual[1] != null) { 
		if ($mensagemAtual[1] == $idAluno) {?> 
			<!-- COMEÇA MENSAGEM PROPRIO ALUNO -->

			<!-- Message to the right -->
			<div class="direct-chat-msg right">
				<div class="direct-chat-info clearfix">


				</div><!-- /.direct-chat-info -->				
				<div class="direct-chat-text text-right text-white" style="border:none; float:right;  background:linear-gradient(45deg, #00a8f4 0%, #02d1a1 100%); width:50%;">
					<?php echo  $mensagemAtual[4]; ?><br>
					<small  style="float:right;"><?php echo  $mensagemAtual[5]; ?></small>
				</div><!-- /.direct-chat-text -->
			</div><!-- /.direct-chat-msg -->

			<!-- TERMINA MENSAGEM PROPRIO ALUNO -->


		<?php }else{

			$aluno = new Aluno(); 
			$aluno->setId($mensagemAtual[1]); 
			$aluno->CapturarAluno($conexao);

			?>

			<!-- COMEÇA MENSAGEM OUTRO ALUNO -->


			<!-- Message. Default to the left -->
			<div class="direct-chat-msg right">
				<div class="direct-chat-info clearfix">


				</div><!-- /.direct-chat-info -->

				<!-- /.direct-chat-img -->
				<div class="direct-chat-text text-left" style="position: relative; right:7%; width:80%;white-space: nowrap;">
					<h6 class="text-dark"><?php echo $aluno->getNome(); ?></h6>
					<?php echo $mensagemAtual[4]; ?>
					<small class="" style="float: right;" ><?php echo $mensagemAtual[5]; ?></small>
				</div><!-- /.direct-chat-text -->
			</div><!-- /.direct-chat-msg -->


			<!-- TERMINA MENSAGEM OUTRO ALUNO -->



		<?php } 	
		
		//TENTAR MENSAGEM DO PROFESSOR


	}if($mensagemAtual[2] != null){ $professor = new Professor(); $professor->setId($mensagemAtual[2]); $professor->CapturarProfessor($conexao);?>

		<!-- COMEÇA MENSAGEM OUTRO PROFESSOR -->


		<!-- Message. Default to the left -->
		<div class="direct-chat-msg text-right">
			<div class="direct-chat-info clearfix">


			</div><!-- /.direct-chat-info -->

			<!-- /.direct-chat-img -->
			<div class="direct-chat-text text-left" style="position: relative; right:7%; width:80%;">
				<h6 class="text-primary">Professor <?php echo $professor->getNome(); ?></h6>
				<?php echo $mensagemAtual[4]; ?>
				<small class="" style="float: right;" ><?php echo $mensagemAtual[5]; ?></small>
			</div><!-- /.direct-chat-text -->
		</div><!-- /.direct-chat-msg -->


		<!-- TERMINA MENSAGEM OUTRO PROFESSOR -->

		

		<?php 		

	}


	?>




	
	
<?php  }  ?>

