<!-- Usa este arquivo para testar se ele tá conectando com o banco -->
<?php
	require_once('../dao/Conexao.class.php');
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);

	echo 'Criando conexão<br>';
	try {
		$c = new Conexao();
		echo 'Conectado.<br>';
		$res = $c->consultarTabela('SELECT nome from livro', [ ]);
		echo 'Teste de SQL: ';

		// foreach($a in $res){
		// 	echo '<br>' . $a;
		// }
	} catch(Exception $e){
		echo 'Exception ' . $e . '<br>';
	}
?>
