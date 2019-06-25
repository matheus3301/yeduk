<?php 
class MensagemProfessor{

	private $id;
	private $conteudo;
	private $remetente;
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

	public function getRemetente(){
		return $this->remetente;
	}

	public function setRemetente($remetente){
		$this->remetente = $remetente;
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

		$sth = $conexao->prepare("SELECT * FROM tb_chat_aluno_professor WHERE tb_professor_idtb_professor = $this->id_professor AND tb_aluno_idtb_aluno = $this->id_aluno");
		$sth->execute();

		$result = $sth->fetchAll();

		return $result;
	}



	public function ProfessorEnviarAluno($conexao){
		$sql = "INSERT INTO tb_chat_aluno_professor(conteudo, remetente, tb_professor_idtb_professor, tb_aluno_idtb_aluno) VALUES ('$this->conteudo' , 'professor', $this->id_professor, $this->id_aluno)";


			try {
				$conexao->query($sql);
				echo "Foi";

			} catch (Exception $ex) {
				$ex->getMessage();
			}

	}

	public function  AlunoEnviarProfessor($conexao){
		$sql = "INSERT INTO tb_chat_aluno_professor(conteudo, remetente, tb_professor_idtb_professor, tb_aluno_idtb_aluno) VALUES ('$this->conteudo' , 'aluno', $this->id_professor, $this->id_aluno)";


			try {
				$conexao->query($sql);
				echo "Foi";

			} catch (Exception $ex) {
				$ex->getMessage();
			}

	}

}


?>