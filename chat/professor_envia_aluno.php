

<?php 


include '../classes/conexao.php';
include '../classes/mensagemprofessor.php';

$gerenciador = new MensagemProfessor();

session_start();
$gerenciador->setId_professor($_SESSION['idprof']);
$gerenciador->setId_aluno($_POST['idAluno']);
$gerenciador->setConteudo($_POST['mensagem']);	


$gerenciador->ProfessorEnviarAluno($conexao);

?>