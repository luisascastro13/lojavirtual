<?php 

require_once 'model/Livro.class.php';

$livro = new Livro('idzinho', 'nomezinhozinho');
$livro->setPreco("4,50");
$livro->setDescr("Um livro bem legal");
?>

<html>

<head>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<header>	
	<ul>
		<p>O que vai ter nessa página:</p>
		<li>Navbar
			<ul>
				<li><a href="view/login.php">Login e Cadastro de Cliente</a></li>
				<li>Produtos da vitrine</li>		
				<li>Carrinho de compras</li>
			</ul>
		</li>
		
		<li>Busca de produtos</li>
		<li><a href="view/faleconosco.php">Fale conosco</a></li>
	<ul>
</header>

<div>
	<h1>VITRINE</h1>
	<div class="container-fluid">
  		<div class="px-lg-5">
   			<div class="row">

				<!-- FAZER UM FOREACH PARA MOSTRAR 8 LIVROS NA VITRINE -->
				<!-- livrosDAO::mostrartodos() -->
				<!-- exibir no máximo 8 -->

				<!-- Gallery item -->
				<div class="col-xl-3 col-lg-4 col-md-6 mb-4">
					<div class="bg-white rounded shadow-sm"><img src="$src" alt="" class="img-fluid card-img-top">
						<div class="p-4">
							<h5> <a href="#" class="text-dark"><?=$livro->getNome()?></a></h5>
							<p class="small text-muted mb-0"><?=$livro->getDescr()?></p>
							<div class="d-flex align-items-center justify-content-between rounded-pill bg-light px-3 py-2 mt-4">
							<p class="small mb-0"><i class="fa fa-picture-o mr-2"></i><span class="font-weight-bold"><?=$livro->getPreco()?></span></p>
								<div class="badge badge-danger px-3 rounded-pill font-weight-normal">Adicionar ao carrinho</div>
							</div>
						</div>
					</div>
				</div>
				<!-- End -->


			</div>
		</div>
	</div>


	
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
</html>