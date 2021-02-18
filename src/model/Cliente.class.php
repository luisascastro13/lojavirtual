<?php
	class Cliente {
		protected $id, $nome, $endereco, $email, $senha;

		public function __construct($id, $email){
			$this->id = $id;
			$this->email = $email;
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

		public function getEndereco(){
			return $this->endereco;
		}
		public function setEndereco($endereco){
			$this->endereco = $endereco;
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
	}
?>
