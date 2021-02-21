<?php
	session_start();

	require_once('../dao/Livro.dao.php');
	require_once('../dao/Categoria.dao.php');
	require_once('../model/Util.php');

	$livros = LivroDAO::verTodos();
	$categorias = CategoriaDAO::verTodos();
	$filtraCategorias = false;
	$resultadoCategorias = [];

	// Decisão arbitrária: pode mudar se quiser:
		// Se ele não escolheu nenhuma categoria, não filtraremos por nenhuma;
		// Se ele escolheu as categorias a,b,c, então pegaremos todos os livros que são de qualquer uma das 3
	// Logo, o código aqui funciona da segunte forma: se ele vir algum que é de uma categoria, ele puxa para $resultadoCategorias já.
	// Mas se filtraCategorias for false lá no final (ou seja, não escolheu nenhuma categoria), ele bota todas as outras também
	// E depois ainda tem que filtrar o texto, de $resultadoCategorias para $resultado
	for($i = 0; $i < count($categorias); ++$i){
		if(array_key_exists('cat' . "$i", $_GET)){
			echo '$filtraCategorias  era pra ser true';
			$filtraCategorias = true;
			for($j = 0; $j < count($livros); ++$j){
				// Se o livro j possui o id da categoria i como true.
				if($livros[$j]['categorias'][ $categorias[$i]['id'] ]){
					$resultadoCategorias[count($resultadoCategorias)] = $livros[$j];
				}
			}
			// precisa filtrar pela categoria $categorias[$i];
		}
	}
	if(! $filtraCategorias){
		echo 'nao filtra cateogiras';
		$resultadoCategorias = $livros;
	}

	// se precisa filtrar por texto
	if(array_key_exists('texto', $_GET) && $_GET['texto'] !== ''){
		for($i = 0; $i < count($resultadoCategorias); ++$i){
			// procura o minúsculo de $_GET['texto'] no nome de $resultadoCategorias[$i]
			if(strpos(strtolower($resultadoCategorias[$i]['nome']), strtolower($_GET['texto'])) !== false){
				// se encontrou, o texto pesquisado ta dentro do nome do livro;
				$resultado[ count($resultado) ] = $resultadoCategorias[$i];
			}
		}
	} else {
		// senão o resultado é o filtro pelas categorias mesmo;
		$resultado = $resultadoCategorias;
	}
	// por enquanto
	// $resultado = $livros;

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

			.textfield-vertical{
				background: white;
				border-radius: 5px 5px 0px 0px;
				text-align: center;
				color: black;
			}
			.noradius{
				border-radius: 0px;

			}
			.textfield-vertical:hover{
				background: white;
				color: black;
			}
		</style>
	</head>
	<body class="bg-light">
		<?php include('template/header.php'); ?>
		<div class="container" style="margin-top: 2rem">
			<div class="row">
				<div class="col-md-3" >
					<h5>Termos da Pesquisa</h5>
					<form class="btn-group-vertical" style="width:100%" >
						<input name="texto" id="texto" placeholder="Nome do livro" class="form-control btn-outline-dark textfield-vertical" type="text"
							value="<?=filter_var($_GET['texto'],FILTER_SANITIZE_STRING) ?>" >
						<?php
							for($i = 0; $i < count($categorias); ++$i){
								echo "<input name=\"cat$i\" id=\"cat$i\" class=\"btn-check noradius\" type=\"checkbox\" ";

								if(array_key_exists('cat' . $i, $_GET)){
									echo "checked";
								}
								echo ">";


								echo "<label for=\"cat$i\"class=\"btn btn-outline-dark noradius\">" . $categorias[$i]['nome'] . "</label>";

							}
						?>
						<input type="submit" class="btn btn-primary" value="Pesquisar">
					</form>
				</div>
				<div class="col-md-9">
					<div class="row">
						<h5>Resultados</h5>
					</div>
					<div class="px-lg-5">
						<div class="row row-fluid">
							<?php
								for($i = 0; $i < count($resultado); ++$i){
									$livro = $resultado[$i];
							?>
								<div class="col-xl-3 col-lg-4 col-md-6 mb-4">
									<div class="card">
										<img src="$src" alt="" class="img-fluid card-img-top">
										<div class="card-body">
											<h5 class="card-title"><?=filter_var($livro['nome'], FILTER_SANITIZE_STRING)?></h5>
											<p class=""><?=filter_var($livro['descr'], FILTER_SANITIZE_STRING)?></p>
											<p class="small mb-0"><i class="fa fa-picture-o mr-2"></i><span class="font-weight-bold"><?=Util::format_currency($livro['preco'])?></span></p>
											<div class="d-flex align-items-center justify-content-between rounded-pill bg-light px-3 py-2 mt-4">
												<a class="btn btn-secondary" href="livro.php?id=<?=$livro['id']?>">Ver</a>
											</div>
										</div>
									</div>
								</div>
							<?php
								}
							?>
						</div>
					</div>
				</div>
			</div>
		</div>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
	</body>
</html>
