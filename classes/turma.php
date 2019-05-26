<?php 
class Turma{

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
		$sql = "INSERT INTO tb_turma(nome,descricao,tb_professor_idtb_professor) VALUES('$this->nome','$this->descricao',$this->id_professor)";


		try {
			$conexao->query($sql);
			echo "Foi";

		} catch (Exception $ex) {
			$ex->getMessage();
		}

	}


	function CapturarTurmasProfessor($conexao,$idprofessor){	


		$sth = $conexao->prepare("SELECT * FROM tb_turma WHERE  tb_professor_idtb_professor = $idprofessor");
		$sth->execute();

		$result = $sth->fetchAll();

		return $result;
		
	}
	 public function CapturarTurma($conexao){
	 	$sql = "SELECT * FROM tb_turma WHERE  idtb_turma = $this->id";

	 	$query = $conexao->query($sql);

		$return = $query->fetch();

		if ($return != null) {

			$this->nome = $return[1];
			$this->descricao = $return[2];
			$this->id_professor = $return[3];
			

		}
	}

	function CapturarTurmasNome($conexao,$nome){	


		$sth = $conexao->prepare("SELECT idtb_turma, tb_turma.nome, descricao, tb_professor.nome FROM tb_turma INNER JOIN tb_professor ON tb_professor.idtb_professor = tb_professor_idtb_professor WHERE tb_turma.nome LIKE '%$nome%'");
		$sth->execute();

		$result = $sth->fetchAll();

		return $result;
		
	}
	public function Alterar($conexao){
	 	$sql = "UPDATE tb_turma SET nome = '$this->nome', descricao = '$this->descricao'
	 		   WHERE  idtb_turma = $this->id";

	 	

	 	try {
			$conexao->query($sql);
			echo "Foi";

		} catch (Exception $ex) {
			$ex->getMessage();
		}
	}
	

}
?>

