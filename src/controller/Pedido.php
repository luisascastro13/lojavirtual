<?php
session_start();

require_once('../model/Cliente.class.php');
require_once('../dao/Cliente.dao.php');

switch($_POST['a']){
	case 'addtocart':
		echo 'add to cart<br>';
		echo 'id: ' . $_POST['id'] . '<br>';
		echo 'qtd: ' . $_POST['qtd'] . '<br>';
	break;
}
?>
