
include 'classes/conexao.php';
include 'classes/posts.php';


$turma = new Posts();
$turma->setId_turma($_GET['idT']);
$turma->setTitulo($_POST['titulo']);
$turma->setPost($_POST['publicacao']);
$id_post = $_GET['id'];
$turma->setId($id_post);

$turma->Alterar($conexao);

header('location:turmaprofessor.php?op=postalterado&id='.$turma->getId_turma());





 ?>