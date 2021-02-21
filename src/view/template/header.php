<?php
	require_once('../dao/Categoria.dao.php');
?>
<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
	<div class="container-fluid">
		<a class="navbar-brand" href="index.php">Livraria Virtual</a>
		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarsExampleDefault">
			<form class="d-flex" method="GET" action="pesquisa.php" style="flex-grow:1; margin: 0">
				<input class="form-control me-2" name="texto" type="text" placeholder="Buscar Livros" aria-label="Search">
				<button class="btn btn-outline-success" type="submit">Buscar</button>
			</form>
			<div style="flex-grow:1" ></div>
			<ul class="navbar-nav me-auto mb-2 mb-md-0">
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-bs-toggle="dropdown" aria-expanded="false">Categorias</a>
					<ul class="dropdown-menu" aria-labelledby="dropdown01">
						<?php
							$categorias = CategoriaDAO::verTodos();
							for($i = 0; $i < count($categorias); ++$i){
								$formatted = filter_var($categorias[$i]['nome'], FILTER_SANITIZE_STRING);
								echo '<li><a class="dropdown-item" href="index.php?cat=' . $formatted . '"> ' . $formatted . '</a></li>';
							}
						?>
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
