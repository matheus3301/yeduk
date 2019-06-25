

<?php 


include '../classes/conexao.php';
include '../classes/mensagemglobal.php';

$gerenciador = new MensagemGlobal();

session_start();
$gerenciador->setId_aluno($_SESSION['idaluno']);
$gerenciador->setId_turma($_POST['idTurma']);
$gerenciador->setConteudo($_POST['mensagem']);	


$gerenciador->AlunoEnviarMensagem($conexao);

?>