<?php 
class Aluno{

	private $id;
	private $nome;
	private $descricao;
	private $id_professor;


	public function getId(){
		return $this->id;
	}

	public function setId($id){
		$this->id = $id;
	}
	public function getNome(){
		return $this->nome;
	}

	public function setNome($nome){
		$this->nome = $nome;
	}
	public function getDescricao(){
		return $this->descricao;
	}

	public function setDescricao($descricao){
		$this->descricao = $descricao;
	}
	public function getId_professor(){
		return $this->id_professor;
	}

	public function setId_professor($id_professor){
		$this->id_professor = $id_professor;
	}

	public function Cadastrar($conexao) {
		$sql = "INSERT INTO tb_turmas(nome,descricao,tb_professor_idtb_professor) VALUES('$this->nome','$this->descricao',$this->id_professor)";


		try {
			$conexao->query($sql);
			echo "Foi";

		} catch (Exception $ex) {
			$ex->getMessage();
		}

	}
	public function CapturarTurmas($conexao) {
		$sql = "SELECT * FROM tb_turma WHERE  tb_professor_idtb_professor = $this->id_professor";
		
		try {
			$conexao->query($sql);
			echo "Foi";

		} catch (Exception $ex) {
			$ex->getMessage();
		}

	}


}
?>
	
