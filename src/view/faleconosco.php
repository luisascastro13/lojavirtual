<?php
$caixaDeEntrada = 'luisascastro13@gmail.com';

if(array_key_exists('mensagem',$_POST)){
	$mensagem = $_POST['mensagem'];
	$cliente = $_POST['nome'];
	$email = $_POST['email'];

	if(mail($caixaDeEntrada, null, $mensagem, "From: $cliente <$email>" )){
		 echo 'E-Mail enviado com sucesso!<br>';
	}
	else {
	    echo 'Erro no envio do e-mail.<br>';
	}
}

?>

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
	<body>
		<?php include('template/header.php'); ?>
		<div class="container" style="margin-top: 2rem;">
			<div class="text-center">
				<h2>Fale conosco!</h2>
				<p class="lead">Nos envie sugestões, críticas, <br>reclamações e propostas =)</p>
			</div>
		</div>
		<div class="card" style="max-width:35rem; margin: 0 auto">
			<div class="card-body">
				<h5 class="card-title">Fale conosco!</h5>
				<form method='POST'>
					<div class="container">
						<label for='nome' class="row">Seu nome
							<input type="text" class="form-control" name="nome" required>
						</label>

						<label for="email" class="row">Seu e-mail
							<input type="email" class="form-control" name="email" required>
						</label>

						<label for="mensagem" class="row">Mensagem
							<textarea name="mensagem" class="form-control" required></textarea>
						</label>
						<input type="submit" class="row btn btn-primary" value="Enviar mensagem">
					</div>
				</form>
			</div>
		</div>
	</body>
</html>
