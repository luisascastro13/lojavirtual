<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once('../model/Pedido.class.php');
require_once('../dao/Livro.dao.php');
require_once('../dao/Cliente.dao.php');
require_once('../dao/Pedido.dao.php');

$reqm;
if(array_key_exists('a', $_POST)){
	$reqm = $_POST;
} else if (array_key_exists('a', $_GET)){
	$reqm = $_GET;
} else {
	header('Location: ../view/erro.php?msg=noparam');
}

// Adicionar ao carinho sem dizer quantos. Default: 1;
$qtd;
if(array_key_exists('qtd', $reqm)){
	$qtd = $reqm['qtd'];
} else {
	// echo '(warning Defaulted qtd )<br>';
	$qtd = 1;
}

$precoun = LivroDAO::buscarPorId($reqm['id'])['preco'];

switch($reqm['a']){
	case 'addtocart':
		if(!array_key_exists('pedido', $_SESSION)){
			$novo_pedido = new Pedido(-1, -1, 0);
			$novo_pedido->setId(PedidoDAO::inserir($novo_pedido));
			$_SESSION['pedido'] = $novo_pedido->getId();
		}
		PedidoDAO::addLivro($_SESSION['pedido'], $reqm['id'], $qtd, $precoun);
		header('Location: ../view/pedido.php');
	break;
	default:
		echo 'action inválido: ' . $reqm['a'];
}
?>
