<?php
	class Autor {
		protected $id, $nome, $descr;

		public function __construct($id, $nome){
			$this->id = $id;
			$this->nome = $nome;
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

		public function getDescr(){
			return $this->descr;
		}

		public function setDescr($descr){
			$this->descr = $descr;
		}
	}
?>
