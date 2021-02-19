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
}

?>