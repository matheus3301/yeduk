<?php 
class Admin{

	private $id;
	private $nome;
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





}
 ?>