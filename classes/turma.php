<?php 
class Turma{

	private $id;
	private $nome;
	private $data_criacao;
	private $descricao;
	private $id_professor;

	private $nome_imagem;
	private $tamanho_imagem;
	private $tipo_imagem;
	private $imagem;

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
	public function getData_criacao(){
		return $this->data_criacao;
	}

	public function setData_criacao($data_criacao){
		$this->data_criacao = $data_criacao;
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

	public function getNome_imagem(){
		return $this->nome_imagem;
	}

	public function setNome_imagem($nome_imagem){
		$this->nome_imagem = $nome_imagem;
	}

	public function getTamanho_imagem(){
		return $this->tamanho_imagem;
	}

	public function setTamanho_imagem($tamanho_imagem){
		$this->tamanho_imagem = $tamanho_imagem;
	}

	public function getTipo_imagem(){
		return $this->tipo_imagem;
	}

	public function setTipo_imagem($tipo_imagem){
		$this->tipo_imagem = $tipo_imagem;
	}

	public function getImagem(){
		return $this->imagem;
	}

	public function setImagem($imagem){
		$this->imagem = $imagem;
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
		$sql = "SELECT * FROM tb_turma WHERE idtb_turma = $this->id";

		$query = $conexao->query($sql);

		$return = $query->fetch();

		if ($return != null) {

			$this->nome = $return[1];
			$this->data_criacao = $return[2];
			$this->descricao = $return[3];
			$this->id_professor = $return[4];
			
			

			$this->nome_imagem = $return[5];
			$this->tamanho_imagem = $return[6];
			$this->tipo_imagem = $return[7];
			$this->imagem = $return[8];





		}
	}

	function CapturarTurmasNome($conexao,$nome){	


		$sth = $conexao->prepare("SELECT idtb_turma, tb_turma.nome, descricao, tb_professor.nome, tb_turma.tipo_imagem, tb_turma.imagem FROM tb_turma INNER JOIN tb_professor ON tb_professor.idtb_professor = tb_professor_idtb_professor WHERE tb_turma.nome LIKE '%$nome%'");
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


	public function ListarAlunosPendentes($conexao){
		$sth = $conexao->prepare("SELECT tb_aluno.nome, idtb_matricula, tb_aluno_idtb_aluno, tb_aluno.imagem  FROM tb_matricula INNER JOIN tb_aluno ON tb_aluno.idtb_aluno = tb_aluno_idtb_aluno WHERE  tb_turma_idtb_turma = $this->id AND situacao = 'Pendente'");
		$sth->execute();

		$result = $sth->fetchAll();

		return $result;
	}

	public function ListarAlunosAprovados($conexao){
		$sth = $conexao->prepare("SELECT tb_aluno.nome, idtb_matricula, tb_aluno_idtb_aluno, tb_aluno.imagem  FROM tb_matricula INNER JOIN tb_aluno ON tb_aluno.idtb_aluno = tb_aluno_idtb_aluno WHERE  tb_turma_idtb_turma = $this->id AND situacao = 'Aprovado'");
		$sth->execute();

		$result = $sth->fetchAll();

		return $result;
	}
	
	
	
	public function CapturarPostagem($conexao)
	{

		$sth = $conexao->prepare("SELECT * FROM tb_post WHERE tb_turma_idtb_turma=$this->id ORDER BY idtb_post DESC");
		$sth->execute();

		$result = $sth->fetchAll();

		return $result;
	}

	public function AlterarFoto($conexao){

		$sql = "UPDATE tb_turma SET nome_imagem = '$this->nome_imagem', tamanho_imagem = '$this->tamanho_imagem', tipo_imagem = '$this->tipo_imagem', imagem = '$this->imagem' WHERE idtb_turma = $this->id";

		


		try {
			$conexao->query($sql);
			echo "Foi";

		} catch (Exception $ex) {
			$ex->getMessage();
		}			



	}

	
	

}
?>

