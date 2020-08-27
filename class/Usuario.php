<?php

class Usuario {

	private $id;
	private $nome;
	private $idade;

	public function getId(){

		return $this->id;
	}

	public function setId($value){

		$this->id = $value;
	}

	public function getNome(){

		return $this->nome;
	}

	public function setNome($value){

		$this->nome = $value;
	}

	public function getIdade(){

		return $this->idade;
	}

	public function setIdade($value){

		$this->idade = $value;
	}

	public function loadById($id){

		$sql = new Sql;

		$results = $sql->select("SELECT * FROM teste WHERE id = :ID", array(
			":ID"=>$id
		));

		if (count($results[0]) > 0){

			$row = $results[0];

			$this->setId($row['id']);
			$this->setNome($row['nome']);
			$this->setIdade($row['idade']);
		}
	}

	public function __toString(){
		
		return json_encode(array(
				"id" => $this->getId(),
				"nome" => $this->getNome(),
				"idade" => $this->getIdade()
		));
	}
}

?>