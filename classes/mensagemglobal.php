<?php 
class MensagemGlobal{

	private $id;
	private $conteudo;

	private $id_turma;
	private $id_professor;
	private $id_aluno;


	public function getId(){
		return $this->id;
	}

	public function setId($id){
		$this->id = $id;
	}

	public function getConteudo(){
		return $this->conteudo;
	}

	public function setConteudo($conteudo){
		$this->conteudo = $conteudo;
	}

	public function getId_turna(){
		return $this->id_turma;
	}

	public function setId_turma($id_turma){
		$this->id_turma = $id_turma;
	}

	public function getId_professor(){
		return $this->id_professor;
	}

	public function setId_professor($id_professor){
		$this->id_professor = $id_professor;
	}

	public function getId_aluno(){
		return $this->id_aluno;
	}

	public function setId_aluno($id_aluno){
		$this->id_aluno = $id_aluno;
	}





	public function ListarMensagens($conexao){

		$sth = $conexao->prepare("SELECT * FROM tb_chat_turma_global WHERE tb_turma_idtb_turma = $this->id_turma");
		$sth->execute();

		$result = $sth->fetchAll();

		return $result;
	}



	public function ProfessorEnviarMensagem($conexao){
		$sql = "INSERT INTO tb_chat_turma_global(content, tb_turma_idtb_turma, tb_professor_idtb_professor) VALUES ('$this->conteudo' , $this->id_turma, $this->id_professor)";


			try {
				$conexao->query($sql);
				echo "Foi";

			} catch (Exception $ex) {
				$ex->getMessage();
			}

	}

	public function  AlunoEnviarMensagem($conexao){
		$sql = "INSERT INTO tb_chat_turma_global(content, tb_turma_idtb_turma, tb_aluno_idtb_aluno) VALUES ('$this->conteudo' , $this->id_turma, $this->id_aluno)";


			try {
				$conexao->query($sql);
				echo "Foi";

			} catch (Exception $ex) {
				$ex->getMessage();
			}

	}

}


?>