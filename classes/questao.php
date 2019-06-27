<?php 
class Questao{
	private $id;
	private $enunciado;
	private $id_turma;
	private $item1;
	private $item2;
	private $item3;
	private $item4;
	private $item5;
	private $itemCerto;


	public function getId(){
		return $this->id;
	}

	public function setId($id){
		$this->id = $id;
	}

	public function getEnunciado(){
		return $this->enunciado;
	}

	public function setEnunciado($enunciado){
		$this->enunciado = $enunciado;
	}

	public function getId_turma(){
		return $this->id_turma;
	}

	public function setId_turma($id_turma){
		$this->id_turma = $id_turma;
	}

	public function getItem1(){
		return $this->item1;
	}

	public function setItem1($item1){
		$this->item1 = $item1;
	}

	public function getItem2(){
		return $this->item2;
	}

	public function setItem2($item2){
		$this->item2 = $item2;
	}

	public function getItem3(){
		return $this->item3;
	}

	public function setItem3($item3){
		$this->item3 = $item3;
	}

	public function getItem4(){
		return $this->item4;
	}

	public function setItem4($item4){
		$this->item4 = $item4;
	}

	public function getItem5(){
		return $this->item5;
	}

	public function setItem5($item5){
		$this->item5 = $item5;
	}

	public function getItemCerto(){
		return $this->itemCerto;
	}

	public function setItemCerto($itemCerto){
		$this->itemCerto = $itemCerto;
	}



 	public function Cadastrar($conexao){
		$sql = "INSERT INTO tb_questoes VALUES(0,'$this->enunciado', $this->id_turma, '$this->item1', '$this->item2', '$this->item3', '$this->item4', '$this->item5', '$this->itemCerto')";


			try {
				$conexao->query($sql);
				echo "Foi";

			} catch (Exception $ex) {
				$ex->getMessage();
			}
	}
	public function Excluir($conexao){
		$sql = "DELETE FROM tb_questoes WHERE idtb_questoes = $this->id ";


			try {
				$conexao->query($sql);
				echo "Foi";

			} catch (Exception $ex) {
				$ex->getMessage();
			}
	}
	public function Alterar($conexao){
		$sql = "UPDATE tb_questoes SET enunciado = '$this->enunciado', resposta = '$this->itemCerto', item1 = '$this->item1', item2 = '$this->item2', item3 = '$this->item3', item4 = '$this->item4', item5 = '$this->item5' WHERE idtb_questoes = $this->id";


			try {
				$conexao->query($sql);
				echo "Foi";

			} catch (Exception $ex) {
				$ex->getMessage();
			}
	}

}


?>