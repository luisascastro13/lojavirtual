<?php

require_once 'Conexao.class.php';
require_once '../model/Livro.class.php';

class LivroDAO{

	public static function verTodos(){
		$conn = new Conexao();
		$sql = 'select * from livro';
		$res = $conn->consultarTabela($sql, null);
		return $res;
	}

	public static function selectByStock(){
		$conn = new Conexao();
		$sql = 'select * from livro order by estoque desc';
		$res = $conn->consultarTabela($sql, null);
		return $res;
	}

	public static function buscarPorId($id){
		$conn = new Conexao();
		$sql = 'select * from livro WHERE id=?';
		$res = $conn->consultarTabela($sql, [$id]);
		if(isset($res) && array_key_exists(0, $res) ){
			return $res[0];
		} else{
			return NULL;
		}
	}


}

?>
