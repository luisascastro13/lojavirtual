<?php

require_once('../model/Cliente.class.php');
require_once('Conexao.class.php');
error_reporting(E_ALL);

class ClienteDAO{

	public static function inserir($cliente){
		$conn = new Conexao();
		$sql = 'insert into cliente (nome, endereco, email, id_carrinho, senha) values (?,?,?,?,?);';
		$id = $conn->atualizarTabela($sql, [$cliente->getNome(), $cliente->getEndereco(), $cliente->getEmail(), $cliente->getIdCarrinho(), $cliente->getSenha()]);
		return $id;
	}

	// Não envolve nem senha nem idcarrinho
	public static function updateBasico($cliente){
		$conn = new Conexao();
		$sql = 'update cliente set nome=?, endereco=?, email=? WHERE id=?;';
		$id = $conn->atualizarTabela($sql, [$cliente->getNome(), $cliente->getEndereco(), $cliente->getEmail(),  $cliente->getId()]);
		return $id;
	}

	public static function updateSenha($cliente){
		$conn = new Conexao();
		$sql = 'update cliente set senha = ? WHERE id=?;';
		$id = $conn->atualizarTabela($sql, [$cliente->getSenha(), $cliente->getId()]);
		return $id;
	}

	public static function updateIdCarrinho($cliente){
		$conn = new Conexao();
		$sql = 'update cliente set id_carrinho = ? WHERE id=?;';
		$id = $conn->atualizarTabela($sql, [$cliente->getIdCarrinho(), $cliente->getId()]);
		return $id;
	}


	public static function buscarPorId($id){
		$conn = new Conexao();
		$sql = 'select nome,endereco,email,id_carrinho,senha from cliente where id=?;';
		$res = $conn->consultarTabela($sql, [$id]);
		if(array_key_exists(0, $res)){
			$tmp = $res[0];
			$cliente=  new Cliente($tmp['id'], $tmp['nome'], $tmp['endereco'], $tmp['email'],  $tmp['senha'], $tmp['id_carrinho']);
			return $cliente;
		} else {
			echo 'Busca por cliente com id inexistente... ('. $id . ')<br>';
			return NULL;
		}
	}

	public static function verTodos(){
		$conn = new Conexao();
		$sql = 'select * from cliente';
		$res = $conn->consultarTabela($sql, null);
		return $res;
	}
}

?>
