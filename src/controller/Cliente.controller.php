<?php
session_start();

require_once('../model/Cliente.class.php');
require_once('../dao/Cliente.dao.php');


switch($_GET['a']){
	case 'inserirNovo':
		$plaintext_password = $_POST['senha'];
		$hash = password_hash($plaintext_password, PASSWORD_DEFAULT);

		$cliente = new Cliente($_POST['email']);
		$cliente->setSenha($hash);

		$idCliente = ClienteDAO::inserir($cliente);

		if($idCliente == 'EXCEPTION'){
			// echo 'opa opa opa email ja existe no cadastro, tenta outro';
			header("Location: ../view/login.php?msg=emailDuplicado");
		}
		else{
			$cliente->setId($idCliente);
			header("Location: ../index.php");
		}
		break;

	case 'efetuarLogin':

		$cliente = new Cliente($_POST['email']);

		$plaintext_password = $_POST['senha'];
		$hash = password_hash($plaintext_password, PASSWORD_DEFAULT);
		$cliente->setSenha($hash);

		$todosClientes = ClienteDAO::verTodos();

		// em todas colunas de email, verifica se existe o email informado.
		$indice = array_search($_POST['email'], array_column($todosClientes, 'email'));

		if($indice !== false) {
		    // echo 'Email cadastrado já, pode seguir o baile.';
	    		if (password_verify($_POST['senha'], $todosClientes[$indice]['senha'])) {
				    $_SESSION['cliente'] = $todosClientes[$indice]['email'];
					header('Location: ../view/index.php');
				    // echo 'tudo certinho';
				} else {
					echo 'opa erro na senha';
				    header('Location: ../view/login.php?msg=senhaIncorreta');
				}
		}
		else{
			echo 'Email não existe no cadastro, taokei?';
			// header('Location: ../view/login.php?msg=emailInvalido');
		}
		break;

	case 'logout':
		unset($_SESSION['cliente']);
		header('Location: ../view/index.php');
		break;
}

// header('Location: ../view/login.php');
?>
