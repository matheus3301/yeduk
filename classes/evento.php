<?php 
class Evento{
	private $id;
	private $titulo;
	private $data;
	private $id_turma;


	public function getId(){
		return $this->id;
	}

	public function setId($id){
		$this->id = $id;
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

	public function getId_turma(){
		return $this->id_turma;
	}

	public function setId_turma($id_turma){
		$this->id_turma = $id_turma;
	}

	public function Cadastrar($conexao){
		$sql = "INSERT INTO tb_evento VALUES(0,'$this->titulo','$this->data',$this->id_turma)";


			try {
				$conexao->query($sql);
				echo "Foi";

			} catch (Exception $ex) {
				$ex->getMessage();
			}
	}

	public function Excluir($conexao){
		$sql = "DELETE FROM tb_evento WHERE idtb_evento = $this->id ";


			try {
				$conexao->query($sql);
				echo "Foi";

			} catch (Exception $ex) {
				$ex->getMessage();
			}
	}

	public function Alterar($conexao){
		$sql = "UPDATE tb_evento SET titulo = '$this->titulo', data = '$this->data' WHERE idtb_evento = $this->id";


			try {
				$conexao->query($sql);
				echo "Foi";

			} catch (Exception $ex) {
				$ex->getMessage();
			}
	}

	

}

?>