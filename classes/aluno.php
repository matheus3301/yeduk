
<?php 
class Aluno{

	private $id;
	private $nome;
	private $data_nasc;
	private $data_ingresso;
	private $biografia;
	private $escolaridade;
	private $email;
	private $senha;



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

	public function getData_nasc(){
		return $this->data_nasc;
	}

	public function setData_nasc($data_nasc){
		$this->data_nasc = $data_nasc;
	}

	public function getData_ingresso(){
		return $this->data_ingresso;
	}

	public function setData_ingresso($data_ingresso){
		$this->data_ingresso = $data_ingresso;
	}

	public function getBiografia(){
		return $this->biografia;
	}

	public function setBiografia($biografia){
		$this->biografia = $biografia;
	}

	public function getEscolaridade(){
		return $this->escolaridade;
	}

	public function setEscolaridade($escolaridade){
		$this->escolaridade = $escolaridade;
	}

	public function getEmail(){
		return $this->email;
	}

	public function setEmail($email){
		$this->email = $email;
	}

	public function getSenha(){
		return $this->senha;
	}

	public function setSenha($senha){
		$this->senha = $senha;
		
	}

	public function Cadastrar($conexao) {
		$sql = "INSERT INTO tb_aluno(nome,data_nasc,escolaridade,email,senha) VALUES('$this->nome','$this->data_nasc','$this->escolaridade','$this->email','$this->senha')";


		try {
			$conexao->query($sql);
			echo "Foi";

		} catch (Exception $ex) {
			$ex->getMessage();
		}

	}

	public function Login($conexao){
		$sql = "SELECT idtb_aluno FROM tb_aluno WHERE email = '$this->email' AND senha = '$this->senha'";

		$query = $conexao->query($sql);

		$return = $query->fetch();

		if ($return != null) {
			return $return[0];
		}else{
			return false;
		}


	}
	public function CapturarAluno($conexao){
	 	$sql = "SELECT * FROM tb_aluno WHERE  idtb_aluno = $this->id";

	 	$query = $conexao->query($sql);

		$return = $query->fetch();

		if ($return != null) {

			$this->nome = $return[1];
			$this->data_nasc = $return[2];
			$this->data_ingresso = $return[3];
			$this->biografia = $return[4];
			$this->escolaridade = $return[5];




		}
	}

}
?>