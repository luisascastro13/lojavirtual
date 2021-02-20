<?php
	function function_alert($msg) {
	    echo "<script type='text/javascript'>alert('$msg');</script>";
	}

	session_start();

	if(isset($_GET['msg'])){
		switch($_GET['msg']){
			case 'emailDuplicado':
				function_alert('Email já cadastrado. Tente outro.');
				break;
			case 'senhaIncorreta':
				function_alert('Senha incorreta. Tente novamente.');
				break;
			case 'emailInvalido':
				function_alert('Email não cadastrado no sistema.');
				break;
		}
	}
?>

<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<title>Livraria Virtual</title>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
		<style>
			.bd-placeholder-img {
				font-size: 1.125rem;
				text-anchor: middle;
				-webkit-user-select: none;
				-moz-user-select: none;
				user-select: none;
			}

			@media (min-width: 768px) {
				.bd-placeholder-img-lg {
					font-size: 3.5rem;
				}
			}
			body {
				padding-top: 3.5rem;
			}

			form .row {
				margin-bottom: 1rem;
			}
		</style>
	</head>
	<body class="bg-light">
		<?php include('template/header.php'); ?>
		<div class="container" style="margin-top: 2rem;">
			<div class="text-center">
				<h2>Histórico de Pedidos</h2>
				<p class="lead">Veja aqui seus pedidos anteriores,<br> seus valores e suas datas de entrega.</p>
			</div>
		</div>
	</body>
</html>
