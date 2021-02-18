<?php

#### VERIFICAR:
### como inserir o autor do livro? por nome? e se for mais de um autor?


	class Livro {
		protected $id, $nome, $descr, $preco, $estoque, $isbn, $autor, $categoria, $editora;

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
		public function getPreco(){
			return $this->preco;
		}
		public function setPreco($preco){
			$this->preco = $preco;
		}
		public function getEstoque(){
			return $this->estoque;
		}
		public function setEstoque($estoque){
			$this->estoque = $estoque;
		}
		public function setIsbn($isbn){
			$this->isbn = $isbn;
		}
		public function getIsbn(){
			return $this->isbn;
		}

		###FAZER ISSO COMO UM VETOR DE CATEGORIAS, POR ID
		public function setCategoria($categoria){
			$this->categoria = $categoria;
		}
		public function getCategoria(){
			return $this->categoria;
		}
	}
?>
