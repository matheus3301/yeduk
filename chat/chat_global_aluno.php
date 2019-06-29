<style type="text/css">
	
	
	
	@media only screen and (min-width: 1024px){
		.eu{
			width:50%;
			left: 13%;
		}
		.professor{
			width:70%;
		}
		.date{

		}

	}
	@media screen and (min-width: 320px){
		.eu{
			width: 70%;
			right: 10% !important;
		}
	}
</style>
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
				<div class="direct-chat-text text-right text-white eu" style="border:none;  background:linear-gradient(45deg, #00a8f4 0%, #02d1a1 100%); max-width: 80%; margin-left: 100px;">
					<div><p class="mostra-msg text-white" style="word-wrap: break-word;"><?php echo  $mensagemAtual[4]; ?></p></div>
					<small class="date"><?php echo  $mensagemAtual[5]; ?></small>
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
			<div class="direct-chat-msg text-right">

			<!-- /.direct-chat-img -->

			<div class="direct-chat-text text-left professor" style="margin-right:7%; width:70%;">
				<h6 class="text-dark"><?php echo $aluno->getNome(); ?></h6><small class="date"><?php echo $mensagemAtual[5]; ?></small>
				<div><p class="text-dark" style="word-wrap: break-word;"><?php echo $mensagemAtual[4];?></p></div>
				
			</div><!-- /.direct-chat-text -->
		</div><!-- /.direct-chat-msg -->


			<!-- TERMINA MENSAGEM OUTRO ALUNO -->



		<?php } 	
		
		//TENTAR MENSAGEM DO PROFESSOR


	}if($mensagemAtual[2] != null){ $professor = new Professor(); $professor->setId($mensagemAtual[2]); $professor->CapturarProfessor($conexao);?>

		<!-- COMEÇA MENSAGEM OUTRO PROFESSOR -->


		<!-- Message. Default to the left -->
		<div class="direct-chat-msg text-right">

			<!-- /.direct-chat-img -->

			<div class="direct-chat-text text-left professor" style="margin-right:7%; width:70%;">
				<h6 class="text-primary">Professor</h6><small class="date"><?php echo $mensagemAtual[5]; ?></small>
				<div><p class="text-dark" style="word-wrap: break-word;"><?php echo $mensagemAtual[4];?></p></div>
				
			</div><!-- /.direct-chat-text -->
		</div><!-- /.direct-chat-msg -->


		<!-- TERMINA MENSAGEM OUTRO PROFESSOR -->

		

		<?php 		

	}


	?>




	
	
<?php  }  ?>


