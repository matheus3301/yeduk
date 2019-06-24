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
		public function ConsultarAluno($conexao){
			$sth = $conexao->prepare("SELECT * FROM tb_aluno ORDER BY idtb_aluno ASC");
			$sth->execute();

			$result = $sth->fetchAll();

			return $result;


		
		}

		public function CapturarAluno($conexao){
			$sql = "SELECT * FROM tb_aluno WHERE idtb_aluno = $this->id";

			$query = $conexao->query($sql);

			$return = $query->fetch();

			if ($return != null) {

				$this->nome = $return[1];
				$this->data_nasc = $return[2];
				$this->data_ingresso = $return[3];
				$this->biografia = $return[4];
				$this->escolaridade = $return[5];


				$this->nome_imagem = $return[8];
				$this->tamanho_imagem = $return[9];
				$this->tipo_imagem = $return[10];
				$this->imagem = $return[11];




			}
		}

		public function VerificaParticipacaoTurma($conexao, $idturma){
			$sql = "SELECT situacao FROM tb_matricula WHERE tb_aluno_idtb_aluno = $this->id AND tb_turma_idtb_turma = $idturma";



			$query = $conexao->query($sql);

			$return = $query->fetch();

			if ($return != null) {
				return $return[0];

			}else{
				return  "nao aplicou";
			}
		}

		public function AplicarTurma($conexao, $idturma){
			$sql = "INSERT INTO tb_matricula VALUES(0,$this->id,$idturma,'Pendente')";

			try {
				$conexao->query($sql);
				return true;

			} catch (Exception $ex) {
				$ex->getMessage();
				return false;
			}
		}
		public function Alterar($conexao){
		 	$sql = "UPDATE tb_aluno SET nome = '$this->nome', data_nasc = '$this->data_nasc',  escolaridade = '$this->escolaridade'
		 		   WHERE  idtb_aluno = $this->id";

		 	

		 	try {
				$conexao->query($sql);
				echo "Foi";

			} catch (Exception $ex) {
				$ex->getMessage();
			}
		}
		public function AlterarBiografia($conexao){
		 	$sql = "UPDATE tb_aluno SET bio = '$this->biografia'
		 		   WHERE  idtb_aluno = $this->id";

		 	

		 	try {
				$conexao->query($sql);
				echo "Foi";

			} catch (Exception $ex) {
				$ex->getMessage();
			}
		}

		public function ListarMatriculasLimitado($conexao){		

			$sth = $conexao->prepare("SELECT * FROM tb_matricula WHERE tb_aluno_idtb_aluno = $this->id ORDER BY data DESC LIMIT 4");
			$sth->execute();

			$result = $sth->fetchAll();

			return $result;


		}

		public function AlterarFoto($conexao){

			$sql = "UPDATE tb_aluno SET nome_imagem = '$this->nome_imagem', tamanho_imagem = '$this->tamanho_imagem', tipo_imagem = '$this->tipo_imagem', imagem = '$this->imagem' WHERE idtb_aluno = $this->id";

			


			try {
				$conexao->query($sql);
				echo "Foi";

			} catch (Exception $ex) {
				$ex->getMessage();
			}			



			}


	}

?>