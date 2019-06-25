

<?php 


include '../classes/conexao.php';
include '../classes/mensagemprofessor.php';

$gerenciador = new MensagemProfessor();

session_start();
$gerenciador->setId_professor($_POST['idProf']);
$gerenciador->setId_aluno($_SESSION['idaluno']);
$gerenciador->setConteudo($_POST['mensagem']);	


$gerenciador->AlunoEnviarProfessor($conexao);

?>