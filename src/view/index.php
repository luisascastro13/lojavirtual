<?php
	require_once('../dao/Cliente.dao.php');
	require_once('../dao/Livro.dao.php');
	session_start();

	$destaques = LivroDAO::selectByStock();
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
		<div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
			<div class="carousel-inner">
				<div class="carousel-item active">
					<img src="https://img.ibxk.com.br/2020/01/30/30021141299110.jpg?w=1120&h=420&mode=crop&scale=both" width="200" height="200" class="d-block w-100" alt="...">
				</div>
				<div class="carousel-item">
					<img src="https://img.freepik.com/fotos-gratis/moldura-quadrada-feita-de-papel-de-lava-exuberante-conceito-minimo-espaco-para-texto-ou-imagem_141856-215.jpg?size=626&ext=jpg" class="d-block w-100" width="200" height="200" alt="...">
				</div>
				<div class="carousel-item">
					<img src="https://img.freepik.com/fotos-gratis/moldura-quadrada-simples-pendurada_187882-267.jpg?size=626&ext=jpg" width="200" height="200" class="d-block w-100" alt="...">
				</div>
			</div>
			<button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"  data-bs-slide="prev">
				<span class="carousel-control-prev-icon" aria-hidden="true"></span>
				<span class="visually-hidden">Previous</span>
			</button>
			<button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"  data-bs-slide="next">
				<span class="carousel-control-next-icon" aria-hidden="true"></span>
				<span class="visually-hidden">Next</span>
			</button>
		</div>
		<main class="container">
			<div class="container-fluid">
				<h2>Destaques da Semana</h2>
				<div class="px-lg-5">
					<div class="row row-fluid">
					<!-- FAZER UM FOREACH PARA MOSTRAR 8 LIVROS NA VITRINE -->

					<!-- exibir no máximo 8 -->

					<!-- Gallery item -->

					<?php
						for($i = 0; $i < 8 && $i < count($destaques); ++$i){
							$livro = $destaques[$i];
					?>
						<div class="col-xl-3 col-lg-4 col-md-6 mb-4">
							<div class="card">
								<img src="$src" alt="" class="img-fluid card-img-top">
								<div class="card-body">
									<h5 class="card-title"><?=filter_var($livro['nome'], FILTER_SANITIZE_STRING)?></h5>
									<p class=""><?=filter_var($livro['descr'], FILTER_SANITIZE_STRING)?></p>
									<p class="small mb-0"><i class="fa fa-picture-o mr-2"></i><span class="font-weight-bold">preco</span></p>
									<div class="d-flex align-items-center justify-content-between rounded-pill bg-light px-3 py-2 mt-4">
										<a class="btn btn-secondary" href="livro.php?id=<?=$livro['id']?>">Ver</a>
										<a class="btn btn-primary" href="../controller/Pedido.controller.php?a=addtocart&id=<?=$livro['id']?>">Adicionar ao carrinho</a>
									</div>
								</div>
							</div>
						</div>
					<?php
						}
					?>
				</div>
			</div>
		</main>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
	</body>
</html>
