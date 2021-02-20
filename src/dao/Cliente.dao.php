<?php

require_once('Conexao.class.php');
require_once('../model/Cliente.class.php');

class ClienteDAO{

	public static function inserir($cliente){
		$conn = new Conexao();
		$sql = 'insert into cliente (email, senha) values (?,?);';
		$id = $conn->atualizarTabela($sql, [$cliente->getEmail(), $cliente->getSenha()]);
		return $id;
	}
	public static function verTodos(){
		$conn = new Conexao();
		$sql = 'select * from cliente';
		$res = $conn->consultarTabela($sql, null);
		return $res;
	}
}

?>
