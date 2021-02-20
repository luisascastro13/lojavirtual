<?php

require_once('Conexao.class.php');
require_once('../model/Categoria.class.php');

class CategoriaDAO{
	public static function inserir($cat){
		$conn = new Conexao();
		$sql = 'insert into categoria(nome) values (?);';
		$id = $conn->atualizarTabela($sql, [$cat->getNome()]);
		return $id;
	}
	public static function verTodos(){
		$conn = new Conexao();
		$sql = 'select * from categoria';
		$res = $conn->consultarTabela($sql, null);
		return $res;
	}

}

?>
