<?php

require_once '../model/Cliente.class.php';
require_once '../dao/Cliente.dao.php';


switch($_GET['a']){
	case 'inserirNovo':

	$plaintext_password = $_POST['senha'];
	$hash = password_hash($plaintext_password, PASSWORD_DEFAULT);

	$cliente = new Cliente($_POST['email']);
	$cliente->setSenha($hash);

	$idCliente = ClienteDAO::inserir($cliente);
	$cliente->setId($idCliente);

	break;	

}

// header('Location: ../../index.php');
?>