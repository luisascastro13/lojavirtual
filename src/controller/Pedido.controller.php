<?php
session_start();

require_once('../model/Cliente.class.php');
require_once('../dao/Cliente.dao.php');

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
	echo '(warning Defaulted qtd )<br>';
	$qtd = 1;
}

switch($reqm['a']){
	case 'addtocart':
		echo 'add to cart<br>';
		echo 'id: ' . $reqm['id'] . '<br>';
		echo 'qtd: ' . $qtd . '<br>';
	break;
	default:
		echo 'action inválido: ' . $reqm['a'];
}
?>
