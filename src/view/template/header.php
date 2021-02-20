<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
	<div class="container-fluid">
		<a class="navbar-brand" href="index.php">Livraria Virtual</a>
		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarsExampleDefault">
			<form class="d-flex" style="flex-grow:1; margin: 0">
				<input class="form-control me-2" type="search" placeholder="Buscar Livros" aria-label="Search">
				<button class="btn btn-outline-success" type="submit">Buscar</button>
			</form>
			<div style="flex-grow:1" ></div>
			<ul class="navbar-nav me-auto mb-2 mb-md-0">
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-bs-toggle="dropdown" aria-expanded="false">Categorias</a>
					<ul class="dropdown-menu" aria-labelledby="dropdown01">
						<!-- SELECT NO NOME DAS CATEGORIAS -->
						<li><a class="dropdown-item" href="#">Categoriaxxx</a></li>
						<li><a class="dropdown-item" href="#">Another action</a></li>
						<li><a class="dropdown-item" href="#">Something else here</a></li>
					</ul>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="faleconosco.php">Fale Conosco</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="pedido.php">Meu Carrinho</a>
				</li>
				<li class="nav-item dropdown">
					<?php
						if(array_key_exists('cliente', $_SESSION)){
					?>
						<a class="nav-link dropdown-toggle"  id="dropdownconta" href="#" data-bs-toggle="dropdown" aria-expanded="false">Conta</a>
						<ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownconta">
							<!-- SELECT NO NOME DAS CATEGORIAS -->
							<li><a class="dropdown-item" href="arealogada.php"  >Preferências</a></li>
							<li><a class="dropdown-item" href="historico.php"  >Pedidos Anteriores</a></li>
							<li><a class="dropdown-item" href="../controller/Cliente.controller.php?a=logout">Sair</a></li>
						</ul>
					<?php
						} else {
					?>
						<a class="nav-link" href="login.php">Login/Cadastro</a>
					<?php
						}
					?>
				</li>
			</ul>
		</div>
	</div>
</nav>
