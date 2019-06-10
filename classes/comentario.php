<?php 

class Comentario{
	private $id;
	private $comentario;
	private $id_aluno;
	private $id_professor;
	private $id_post;


	public function getId(){
		return $this->id;
	}

	public function setId($id){
		$this->id = $id;
	}

	public function getComentario(){
		return $this->comentario;
	}

	public function setComentario($comentario){
		$this->comentario = $comentario;
	}

	public function getId_aluno(){
		return $this->id_aluno;
	}

	public function setId_aluno($id_aluno){
		$this->id_aluno = $id_aluno;
	}

	public function getId_professor(){
		return $this->id_professor;
	}

	public function setId_professor($id_professor){
		$this->id_professor = $id_professor;
	}

	public function getId_post(){
		return $this->id_post;
	}

	public function setId_post($id_post){
		$this->id_post = $id_post;
	}



	public function ComentarPostProfessor($conexao){
		
		$sql = "INSERT INTO tb_comentario(comentario,tb_post_idtb_post,tb_professor_idtb_professor) VALUES ('$this->comentario','$this->id_post','$this->id_professor')";
		


		try {
			$conexao->query($sql);
			echo "Foi";

		} catch (Exception $ex) {
			$ex->getMessage();
		}
	}

	public function ComentarPostAluno($conexao){
		
		$sql = "INSERT INTO tb_comentario(comentario,tb_post_idtb_post,tb_aluno_idtb_aluno) VALUES ('$this->comentario',$this->id_post,$this->id_aluno)";
		


		try {
			$conexao->query($sql);
			echo "Foi";

		} catch (Exception $ex) {
			$ex->getMessage();
		}
	}
}

?>