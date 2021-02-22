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


switch($reqm['a']){
	case 'addtocart':
		if(!array_key_exists('pedido', $_SESSION)){
			$novo_pedido = new Pedido(null, $idCliente, 0);
			$novo_pedido->setId(PedidoDAO::inserir($novo_pedido));
			$_SESSION['pedido'] = $novo_pedido->getId();
		}

		$precoun = LivroDAO::buscarPorId($reqm['id'])['preco'];

		PedidoDAO::addLivro($_SESSION['pedido'], $reqm['id'], $qtd, $precoun);
		header('Location: ../view/pedido.php');
	break;

	case 'removeitem':
		PedidoDAO::removeLivro($_GET['id_pedido'], $_GET['id_livro']);
		header('Location: ../view/pedido.php');
		break;

	case 'finalizarpedido':

		//enviar email pro usuario com recibo
		$mensagem = PedidoDAO::buscarReciboPedido($_GET['id_pedido']);
		$email = 'luisascastro13@gmail.com';
		$emailDoCliente = $_SESSION['cliente'];

		if(mail($emailDoCliente, null, $mensagem, "From: Livraria Virtual <$email>" )){
			// echo 'E-Mail enviado com sucesso!<br>';
		}
		else {
		    // echo 'Erro no envio do e-mail.<br>';
		}
		PedidoDAO::alterarEstado($_GET['id_pedido'], '1');

		//limpar o session do carrinho
		unset($_SESSION['pedido']);

		$novo_pedido = new Pedido(null, $idCliente, 0);
		$novo_pedido->setId(PedidoDAO::inserir($novo_pedido));
		$_SESSION['pedido'] = $novo_pedido->getId();
		header('Location: ../view/index.php');
		break;

	case 'alterarquantidade':
		PedidoDAO::alterarQuantidade($_GET['id_livro'], $_GET['id_pedido'], $_GET['qtd']);
		header('Location: ../view/pedido.php');
		break;
	default:
		echo 'action inválido: ' . $reqm['a'];
}
?>
