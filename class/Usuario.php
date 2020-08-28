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

	public function __construct($nome = "", $idade = ""){

		$this->setNome($nome);
		$this->setIdade($idade);
	}

	public function loadById($id){

		$sql = new Sql;

		$results = $sql->select("SELECT * FROM teste WHERE id = :ID", array(
			":ID"=>$id
		));

		if (count($results[0]) > 0){

			$row = $results[0];

			$this->setDados($row);
		}
	}

	public static function getList(){

		$sql = new Sql();

		return $sql->select("SELECT * FROM teste");

	}

	public static function getSearch($nome){

		$sql = new Sql;

		return $sql->select("SELECT * FROM teste WHERE nome LIKE :SEARCH",array(
			':SEARCH'=>'%'.$nome.'%'
		));
	}

	private function setDados($dados){

		$this->setId($dados['id']);
		$this->setNome($dados['nome']);
		$this->setIdade($dados['idade']);
	}


	public function login($nome, $idade){

		$sql = new Sql;

		$results = $sql->select("SELECT * FROM teste WHERE nome = :NOME and idade = :IDADE", array(
			":NOME"=>$nome,
			":IDADE"=>$idade
		));

		if (isset($results[0])){

			$row = $results[0];

			$this->setDados($row);
		} else {

			throw new Exception("Dados não encontrados");
		}

	}

	public function insert(){

		$sql = new Sql;

		$sql->query("INSERT INTO teste (nome, idade) VALUES (:NOME, :IDADE)",array(
			":NOME"=>$this->getNome(),
			":IDADE"=>$this->getIdade()
		));
	}

	public function update($nome){

		$this->setNome($nome);

		$sql = new Sql;

		$sql->query("UPDATE teste SET nome = :NOME WHERE id = :ID",array(
			":NOME" => $this->getNome(),
			":ID" => $this->getId()
		));		
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