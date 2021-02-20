<?php
	session_start();

	require_once('../dao/Cliente.dao.php');

	if(! array_key_exists('cliente',$_SESSION)){
		header('Location: erro.php?msg=nologin');
		return;
	}

	$cliente = ClienteDAO::buscarPorId($_SESSION['id']);


?>
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
			form .row {
				margin-bottom: 1rem;
			}
		</style>
	</head>
	<body class="bg-light">


		<?php include('template/header.php'); ?>
		<div class="container" style="margin-top: 2rem;">
			<div class="text-center">
				<h2>Meus Dados</h2>
				<p class="lead">Atualize aqui sua senha, <br>seu e-mail ou até seu nome.</p>
			</div>
		</div>
		<div class="card" style="max-width:35rem; margin: 0 auto">
			<div class="card-body">
				<h5 class="card-title">Meus dados</h5>
				<form method='POST' action="../controller/Cliente.controller.php">
					<div class="container">
						<input type="hidden"  name="a" value="update">
						<input type="hidden"  name="redirect" value="../view/arealogada.php">
						<input type="hidden"  name="id" value="<?=$_SESSION['id']?>">

						<label for='nome' class="row">Nome
							<input type="text" class="form-control" name="nome" value="<?=filter_var($cliente->getNome(),FILTER_SANITIZE_STRING)?>" required>
						</label>

						<label for="email" class="row">E-mail
							<input type="email" class="form-control" name="email" value="<?=filter_var($cliente->getEmail(),FILTER_SANITIZE_STRING)?>" required>
						</label>

						<label for="endereco" class="row">Endereço
							<input type="text" class="form-control" name="endereco" value="<?=filter_var($cliente->getEndereco(),FILTER_SANITIZE_STRING)?>" required>
						</label>

						<input type="submit" class="row btn btn-primary" value="Atualizar">
					</div>
				</form>
			</div>
		</div>
		<br>
		<div class="card" style="max-width:35rem; margin: 0 auto">
			<div class="card-body">
				<h5 class="card-title">Alterar Senha</h5>
				<form method='POST' action="../controller/Cliente.controller.php">
					<div class="container">
						<input type="hidden"  name="a" value="updatePassword">
						<input type="hidden"  name="redirect" value="../view/arealogada.php">
						<input type="hidden"  name="id" value="<?=$_SESSION['id']?>">

						<label for='senhaatual' class="row">Senha Atual
							<input type="password" class="form-control" name="senhaatual" required>
						</label>

						<label for="novasenha" class="row">Nova Senha
							<input type="password" class="form-control" name="novasenha" required>
						</label>

						<label for="repnovasenha" class="row">Repita Nova Seha
							<input type="password" class="form-control" name="repnovasenha" required>
						</label>

						<input type="submit" class="row btn btn-primary" value="Atualizar">
					</div>
				</form>
			</div>
		</div>


		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
	</body>
</html>
