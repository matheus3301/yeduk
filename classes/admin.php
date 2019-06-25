<?php 
class Admin{

	private $id;
	private $nome;
	private $email;
	private $senha;

	private $nome_imagem;
	private $tamanho_imagem;
	private $tipo_imagem;
	private $imagem;



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



		public function Login($conexao){
			$sql = "SELECT idtb_admin FROM tb_admin WHERE email = '$this->email' AND senha = '$this->senha'";

			$query = $conexao->query($sql);

			$return = $query->fetch();

			if ($return != null) {
				return $return[0];
			}else{
				return false;
			}


		}
		public function CapturarAdmin($conexao){
	 	$sql = "SELECT * FROM tb_admin WHERE  idtb_admin = $this->id";

	 	$query = $conexao->query($sql);

		$return = $query->fetch();

		if ($return != null) {
			$this->nome = $return[1];	
			$this->email = $return[2];
		}
	}
	public function Alterar($conexao){
		 	$sql = "UPDATE tb_admin SET nome = '$this->nome', email = '$this->email' WHERE  idtb_admin = $this->id";

		 	

		 	try {
				$conexao->query($sql);
				echo "Foi";

			} catch (Exception $ex) {
				$ex->getMessage();
			}
		}






}
 ?>