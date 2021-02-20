<?php
	session_start();

	require_once('../dao/Livro.dao.php');
	require_once('../model/Util.php');
	$success = true;

	if(array_key_exists('id', $_GET)){
		$id = $_GET['id'];
	} else if(array_key_exists('id', $_POST)){
		$id = $_POST['id'];
	} else {
		header('Location: erro.php?msg=nobookparam');
		return;
	}
	$livro = LivroDAO::buscarPorId($id);
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
		</style>
	</head>
	<body class="bg-light">
		<?php include('template/header.php'); ?>
		<div class="container" style="margin-top: 2rem;">

			<div class="card">
				<div class="card-body">
					<div class="container" style="margin-top: 2rem">
						<div class="row" >
							<h2><?=filter_var($livro['nome'], FILTER_SANITIZE_STRING) ?></h2>
						</div>
						<div class="row">
							<div class="col-sm-3">
								<div style="margin:90px;width: calc(100%-60px); height: 400px;margin: 0px auto; background: blue; color: white; text-align:center">
									livro stock footage<br> botar 'imagem deste livro nao <br>disponivel como a capa de um livro'
								</div>
							</div>
							<div class="col-sm-9" >
								<h5>Valor</h5>
								<p><?=Util::format_currency(filter_var($livro['preco'], FILTER_SANITIZE_STRING))?></p>
								<h5>Descrição</h5>
								<p><?=filter_var($livro['descr'], FILTER_SANITIZE_STRING)?></p>
								<h5>Em Estoque?</h5>
								<p><?=filter_var($livro['estoque'], FILTER_SANITIZE_STRING) > 0 ? "Sim" : "Não"?></p>
								<br>
								<h5>Adicionar ao Carrinho</h5>
								<form method="POST" action="../controller/Pedido.controller.php">
									<!-- necessário para identificar a action no controller -->
									<input type="hidden" name="a" value="addtocart">
									<input type="hidden" name="id" value="<?=$livro['id']?>">
									<label for="qtd">Quantidade:
										<input type="number" value="1" name="qtd" class="form-control">
									</label>
									<label>
										<!-- TODO CHECK qtd > 0  && qtd < $livro['estoque'] -->
										<button href="#" class="btn btn-primary">Adicionar</button>
									</label>
								</form>
							</div>

						</div>
					</div>
				</div>
			</div>
		</div>

		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
	</body>
</html>
