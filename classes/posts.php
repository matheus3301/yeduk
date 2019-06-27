<?php 

class Posts{

	private $id;
	private $id_turma;
	private $post;
	private $titulo;
	private $data;




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

	public function PostarComFoto($conexao)
	{
		$sql = "INSERT INTO tb_post(tb_turma_idtb_turma,postagem,titulo,nome_imagem,tamanho_imagem,tipo_imagem,imagem) VALUES('$this->id_turma','$this->post','$this->titulo','$this->nome_imagem','$this->tamanho_imagem','$this->tipo_imagem','$this->imagem')";


		try {
			$conexao->query($sql);
			echo "Foi";

		} catch (Exception $ex) {
			$ex->getMessage();
		}
	}
	public function ExcluirPostagem($conexao)
	{
		$sql = "DELETE FROM tb_comentario WHERE tb_post_idtb_post = $this->id";


		try {
			$conexao->query($sql);
			echo "Foi";

		} catch (Exception $ex) {
			$ex->getMessage();
		}



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
	
	public function ListarComentarios($conexao){
		$sth = $conexao->prepare("SELECT * FROM tb_comentario WHERE tb_post_idtb_post=$this->id ORDER BY idtb_comentario ASC");
		$sth->execute();

		$result = $sth->fetchAll();

		return $result;
	}


	




}


?>