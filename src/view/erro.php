<!doctype html>
<html lang="pt-BR">
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
		</style>
	</head>
	<body class="bg-light">
		<?php include('template/header.php'); ?>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

		<div class="container" style="margin-top: 2rem;">
			<div class="text-center">
				<h2>Erro!</h2>
				<p class="lead">
					<?php
					switch ($_GET['msg']){
						case 'nobookparam':
							echo 'Página dos livros sem livro!';
							break;
						case 'nologin':
							echo 'Você precisa fazer login para<br> acessar esta área!';
							break;
						case 'noparam':
							echo 'Você tentou acessar uma página sem os parâmetros necessários!';
							break;
						default:
							echo 'Algo deu errado!';
							break;
					}
					?>

				</p>
			</div>
		</div>




	</body>
</html>
