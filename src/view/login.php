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
	<body>
		<?php include('template/header.php'); ?>
		<div class="container" style="margin-top: 2rem;">
			<div class="text-center">
				<h2>Entrar na Conta</h2>
				<p class="lead">Acesse sua conta para acompanhar pedidos,<br> alterar seus dados e realizar encomendas!</p>
			</div>
		</div>
		<!-- 75 rem é 2x35 (dos cards) + 5 de padding -->
		<div class="row" style="max-width: 75rem; margin: 0 auto">
			<div class="col-sm-6">
				<div class="card" style="max-width:35rem; margin: 0 auto">
					<div class="card-body">
						<h5 class="card-title">Cadastre-se!</h5>
						<form onsubmit="return validarSenhas(this)" action="../controller/Cliente.controller.php?a=inserirNovo" method="POST">
							<div class="container">
								<label for="email" class="row">E-mail
									<input type="email" name="email" class="form-control">
								</label>

								<label for="senha" class="row">Senha
									<input type="password" name="senha" class="form-control">
								</label>

								<label for="resenha" class="row">Repita a senha
									<input type="password" name="resenha" class="form-control">
								</label>

							 	<input type="submit" class="row btn btn-primary" value="Cadastrar">
							</div>
						</form>
					</div>
				</div>
			</div>
			<div class="col-sm-6" style="max-width:35rem; margin: 0 auto">
				<div class="card">
					<div class="card-body">
						<h5 class="card-title">Ou Faça Login</h5>
						<form onsubmit="return validarCadastri(this)" action="../controller/Cliente.controller.php?a=efetuarLogin" method="POST">
							<div class="container">
								<label for="email" class="row">E-mail
									<input type="email" name="email" class="form-control">
								</label>

								<label for="senha" class="row">Senha
									<input type="password" name="senha" class="form-control">
								</label>

								<input type="submit" value="Efetuar Login"  class="row btn btn-primary">
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</body>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
</html>


<script type="text/javascript">

//VALIDA SE AS SENHAS SÃO IGUAIS PARA O CADASTRO
function validarCadastro(formulario){
	const email_regex = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

	var email = formulario.email.value;
	var senha = formulario.senha.value;
	var resenha = formulario.resenha.value;

	if(senha.length < 6){
		alert("Senha curta demais. Por favor, tente novamente");
		return false;
	}
	if(senha != resenha){
		alert("Senhas diferentes. Impossível cadastrar login. Por favor, tente novamente.");
		return false;
	}
	if(! email_regex.test(email)){
		alert("E-mail inválido. Por favor, tente novamente.");
		return false;
	}

	return true;
}

</script>
