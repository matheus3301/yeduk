<?php 

 class Posts{

	private $id;
	private $id_turma;
	private $post;
	private $titulo;
	private $data;

	public function getId(){
		return $this->id;
	}

	public function setId($id){
		$this->id = $id;
	}
	public function getId_turma(){
		return $this->id_turma;
	}

	public function setId_turma($id_turma){
		$this->id_turma = $id_turma;
	}

	public function getPost(){
		return $this->post;
	}

	public function setPost($post){
		$this->post = $post;
	}

	public function getTitulo(){
		return $this->titulo;
	}

	public function setTitulo($titulo){
		$this->titulo = $titulo;
	}

	public function getData(){
		return $this->data;
	}

	public function setData($data){
		$this->data = $data;
	}

	public function Postar($conexao)
	{
		$sql = "INSERT INTO tb_post(tb_turma_idtb_turma,postagem,titulo) VALUES('$this->id_turma','$this->post','$this->titulo')";


		try {
			$conexao->query($sql);
			echo "Foi";

		} catch (Exception $ex) {
			$ex->getMessage();
		}
	}
	public function ExcluirPostagem($conexao)
	{
		$sql = "DELETE FROM tb_post WHERE idtb_post = $this->id";


		try {
			$conexao->query($sql);
			echo "Foi";

		} catch (Exception $ex) {
			$ex->getMessage();
		}
	}
	public function Alterar($conexao){
	 	$sql = "UPDATE tb_post SET titulo = '$this->titulo', postagem = '$this->post'
	 		   WHERE  idtb_post = $this->id";

	 	

	 	try {
			$conexao->query($sql);
			echo "Foi";

		} catch (Exception $ex) {
			$ex->getMessage();
		}
	}
	

	




}


 ?>