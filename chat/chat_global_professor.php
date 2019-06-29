<style type="text/css">
	.eu{
			width:50%;
			left:5%;
			
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
$mensagens = $gerenciador->ListarMensagens($conexao);


	//TENTAR MENSAGEM DO ALUNO

foreach ($mensagens as $mensagemAtual ) { 
	if ($mensagemAtual[1] != null) { $aluno = new Aluno(); $aluno->setId($mensagemAtual[1]); $aluno->CapturarAluno($conexao);?>
		
		<!-- COMEÇA MENSAGEM ALUNO -->


		<!-- Message. Default to the left -->
		<div class="direct-chat-msg text-right">
			<div class="direct-chat-info clearfix">


			</div><!-- /.direct-chat-info -->

			<!-- /.direct-chat-img -->
			<div class="direct-chat-text text-left aluno" style="width:70%;right:30px;">
				<h6 class="text-primary"><?php echo $aluno->getNome(); ?></h6>
				<small class="text-right" ><?php echo $mensagemAtual[5]; ?></small>
				<div><p class="text-dark" style="word-wrap: break-word;"><?php echo $mensagemAtual[4]; ?></p></div>
				
			</div><!-- /.direct-chat-text -->
		</div><!-- /.direct-chat-msg -->


		<!-- TERMINA MENSAGEM ALUNO -->

		

		<?php 	
		
		//TENTAR MENSAGEM DO PROFESSOR


	}if($mensagemAtual[2] != null){ $professor = new Professor(); $professor->setId($mensagemAtual[2]); $professor->CapturarProfessor($conexao);?>

		<!-- COMEÇA MENSAGEM PROFESSOR  -->
		<!-- Message to the right -->
		<div class="direct-chat-msg right">
			<div class="direct-chat-info clearfix">


			</div><!-- /.direct-chat-info -->
			
			<div class="direct-chat-text text-left text-white eu" style="border:none; margin-left:20%;  background:linear-gradient(45deg, #00a8f4 0%, #02d1a1 100%); width:70%;">
				<small><?php echo  $mensagemAtual[5]; ?></small>
				<div><p class="text-white" style="word-wrap: break-word;"><?php echo  $mensagemAtual[4]; ?></p></div>
				
			</div><!-- /.direct-chat-text -->
		</div><!-- /.direct-chat-msg -->


		<!-- TERMINA MENSAGEM PROFESSOR -->

		

		<?php 		

	}


	?>




	
	
<?php  }  ?>

