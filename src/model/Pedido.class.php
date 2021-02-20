<?php
class Pedido{
	protected $id, $idCliente, $estado;


	// Lista de {'idlivro', 'qtd', 'precoun'}
	protected $livros;
			### exemplo:
			// [0]{
			// 	[idlivro] = 1;
			// 	[qtd] = 2;
			// 	[precoun] = 24,90;
			// }
			// [1]{
			// 	[idlivro] = 2;
			// 	[qtd] = 4;
			// 	[precoun] = 30,50;
			// }

	public function __construct($id, $idCliente, $estado){
		$this->setId($id); $this->setIdCliente($idCliente); $this->setEstado($estado);
	}

	public function addLivro($idLivro, $qtd, $precoun){
		$this->livros[count($this->livros)] = ['idlivro' => $idLivro, 'qtd' => $qtd, 'precoun' => $precoun];
	}

	public function getId(){
		return $this->id;
	}
	public function getIdCliente(){
		return $this->idCliente;
	}
	public function getEstado(){
		return $this->estado;
	}
	public function getLivros(){
		return $this->livros;
	}
	public function setId($id){
		$this->id = $id;
	}
	public function setIdCliente($idCliente){
		$this->$idCliente = $idCliente;
	}
	public function setEstado($estado){
		$this->estado = $estado;
	}
	public function setLivros($livros){
		$this->livros = $livros;
	}


}
?>
