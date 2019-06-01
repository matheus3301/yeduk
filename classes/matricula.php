<?php 
class Matricula{

	private $id;
	private $id_aluno;
	private $id_turma;
	private $situacao;

	public function getId(){
		return $this->id;
	}

	public function setId($id){
		$this->id = $id;
	}

	public function getId_aluno(){
		return $this->id_aluno;
	}

	public function setId_aluno($id_aluno){
		$this->id_aluno = $id_aluno;
	}

	public function getId_turma(){
		return $this->id_turma;
	}

	public function setId_turma($id_turma){
		$this->id_turma = $id_turma;
	}

	public function getSituacao(){
		return $this->situacao;
	}

	public function setSituacao($situacao){
		$this->situacao = $situacao;
	}

	public function AprovarAplicacao($conexao){
		$sql = "UPDATE tb_matricula SET situacao = 'Aprovado' WHERE idtb_matricula = $this->id ";

		try {
			$conexao->query($sql);
			echo "Foi";

		} catch (Exception $ex) {
			$ex->getMessage();
		}
	}

	public function RecusarAplicacao($conexao){
		$sql = "UPDATE tb_matricula SET situacao = 'Recusado' WHERE idtb_matricula = $this->id ";

		try {
			$conexao->query($sql);
			echo "Foi";

		} catch (Exception $ex) {
			$ex->getMessage();
		}
	}

	

	

}
?>