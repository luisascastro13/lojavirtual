<?php
session_start();

require_once('../model/Cliente.class.php');
require_once('../dao/Cliente.dao.php');
error_reporting(E_ALL);

// if(array_key_exists('a', $_GET)){
// 	$reqm = $_GET;
// } else if(array_key_exists('a', $_POST)){

// } else {
// 	header("Location: ../index.php");
// }

$reqm = $_POST;

switch($reqm['a']){
	case 'inserirNovo':
		echo('Vai inserir novo<br>');
		$plaintext_password = $reqm['senha'];
		$hash = password_hash($plaintext_password, PASSWORD_DEFAULT);

		$cliente = new Cliente(-1, $reqm['nome'], NULL, $reqm['email'], $hash, NULL);
		$idCliente = ClienteDAO::inserir($cliente);
		if($idCliente == 'EXCEPTION'){
			header("Location: ../view/login.php?msg=emailDuplicado");
		} else{
			$cliente->setId($idCliente);
			// Loga direto
			$_SESSION['cliente'] = $cliente->getEmail();
			$_SESSION['id'] = $cliente->getId();
			header("Location: ../index.php");
		}
		break;

	case 'efetuarLogin':
		$plaintext_password = $reqm['senha'];
		$hash = password_hash($plaintext_password, PASSWORD_DEFAULT);
		// TODO: por que nao fazer isso ser uma consulta sql?
		$todosClientes = ClienteDAO::verTodos();

		// em todas colunas de email, verifica se existe o email informado.
		$indice = array_search($reqm['email'], array_column($todosClientes, 'email'));

		if($indice !== false) {
    		if (password_verify($reqm['senha'], $todosClientes[$indice]['senha'])) {
				$_SESSION['cliente'] = $todosClientes[$indice]['email'];
			    $_SESSION['id'] = $todosClientes[$indice]['id'];
				header('Location: ../view/index.php');
			} else {
				echo 'opa erro na senha';
			    header('Location: ../view/login.php?msg=senhaIncorreta');
			}
		} else{
			echo 'Email não existe no cadastro, taokei?';
			// header('Location: ../view/login.php?msg=emailInvalido');
		}
		break;

	case 'update':
		$cliente = new Cliente($reqm['id'], $reqm['nome'], $reqm['endereco'], $reqm['email'], NULL, NULL);
		ClienteDAO::updateBasico($cliente);
		// echo 'Pedindo redirect para '
		header('Location: ' . $reqm['redirect']);
		break;
	case 'updatePassword':
		$cliente = new Cliente($reqm['id'], NULL, NULL, NULL, $hash, NULL);
		ClienteDAO::updateSenha($cliente);
		header('Location: ' . $reqm['redirect']);
		break;
	
}

if(isset($_GET['sair'])){
	switch($_GET['sair']){
		case 'sim':
			unset($_SESSION['cliente']);
			header('Location: ../view/index.php');
			break;
	}
}


// header('Location: ../view/login.php');
?>
