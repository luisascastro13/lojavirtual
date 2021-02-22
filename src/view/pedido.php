<?php
	session_start();
	error_reporting(E_ALL);

	// require_once('../model/Cliente.php');
	require_once('../dao/Cliente.dao.php');
	// require_once('../model/Pedido.php');
	require_once('../dao/Pedido.dao.php');
	require_once('../dao/Livro.dao.php');
	require_once('../model/Util.php');


	$total=0;
	$pedido = NULL;

	if(array_key_exists('id', $_GET)){
		// Se for uma consulta, puxando por um id específico
		$pedido = PedidoDAO::buscarPorId($_GET['id']);
	} else if(array_key_exists('id', $_POST)){
		// Se for uma consulta, puxando por um id específico
		$pedido = PedidoDAO::buscarPorId($_POST['id']);
	} else {
		// Se for para ver o carrinho atual,
		if(array_key_exists('pedido', $_SESSION)){
			$pedido = PedidoDAO::buscarPorId($_SESSION['pedido']);
		} else if(array_key_exists('id', $_SESSION)){
			$cliente = ClienteDAO::buscarPorId($_SESSION['id']);
			$id = $cliente->getIdCarrinho();
			if($id != NULL && $id > 0){
				$pedido = PedidoDAO::buscarPorId($id);
			}
		}
	}
	// Se nada até até aqui achou um pedido adequado, faremos um
	if($pedido == NULL ){
		$idCliente = array_key_exists('id', $_SESSION) ? $_SESSION['id'] : NULL;
		$pedido = new Pedido(NULL, $idCliente, 0);
		$idPedido = PedidoDAO::inserir($pedido);
		$_SESSION['pedido'] = $idPedido;
		// Se estiver logado, vai ser este o carrinho
		if($_SESSION['id'] != NULL){
			// /__construct($id, $nome, $endereco, $email, $senha, $idCarrinho)
			$cliente = new Cliente($_SESSION['id'], NULL, NULL, NULL, NULL, $idPedido);
			ClienteDAO::updateIdCarrinho($cliente);
		}
		// Se não estiver logado, quando ele logar, vai ter que decidir se vai substituir o carrinho pelo que já tem.
		// se esse aqui tiver mais que um item, ou se o outro estiver null ainda, vai substituir.  senao nao
	}
	$livros = $pedido->getLivros();
?>

<!doctype html>
<html lang="pt-BR">
	<head>
		<meta charset="utf-8">
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
			.container {
				max-width: 960px;
			}
			body {
				padding-top: 3.5rem;
			}

		</style>
	</head>
	<body class="bg-light">
		<?php include('template/header.php'); ?>

		<main>
			<div class="container" style="margin-top: 2rem;">
				<div class="text-center">
					<h2><?=$pedido->getEstado() == 0 ? "Meu Carrinho" : "Pedido Anterior"?></h2>
					<?php
						if(count($pedido->getLivros()) == 0){
							echo '<p class="lead">Adicione primeiro algum<br> produto ao seu carrinho!</p>';
						} else {
							echo '<p class="lead">Veja aqui os produtos que <br>você já separou.</p>';
						}
					?>
				</div>
			</div>
			<?php if(count($pedido->getLivros()) > 0){ ?>
				<div class="row g-3 justify-content-center">
					<div class="col-md-5 col-lg-4 order-md-last">
					<h4 class="d-flex justify-content-between align-items-center mb-3">
						Carrinho
						<span class="badge bg-secondary rounded-pill"><?=count($livros)?></span>
					</h4>
							<ul clsass="list-group mb-3">


							<?php
								for($i = 0; $i < count($livros); ++$i){
									$livro = LivroDAO::buscarPorId($livros[$i]['id_livro']);
							?>
									<li class="list-group-item d-flex justify-content-between lh-sm">
										<div>
											<h6 class="my-0"><?=($livro['nome'])?></h6>
											<!-- <?php print_r($livros[$i])?> -->
											<small class="text-muted">Quantidade: <?=$livros[$i]['qtd']?>; Preço: <?=Util::format_currency($livros[$i]['preco_un'])?>.</small>
										</div>

										<form action='../controller/Pedido.controller.php?a=alterarquantidade' method='post'>Alterar quantidade
											
											<!-- settar o valor conforme o q diz na tabela livro pedido no campo qtd -->
										
											<input type="number" value="<?=$livros[$i]['qtd']?>" name="qtd" class="form-control">
											<input type="submit" class="" value="Salvar nova quantidade">
											
										</form>		
										<span class="text-muted " style="align-self:center">
											<?=Util::format_currency($livros[$i]['preco_un'] * $livros[$i]['qtd'])?>
											<?php $total += $livros[$i]['preco_un'] * $livros[$i]['qtd'];
											if($pedido->getEstado() == 0){ ?>

												<form action="../controller/Pedido.controller.php?a=removeitem&id_pedido=<?=$livros[$i]['id_pedido']?>&id_livro=<?=$livros[$i]['id_livro']?>" method="POST">
													<input type="submit" class="form-control btn  btn-outline-danger btn-sm" value="X">
												</form>
												<!-- <a href="../controller/Pedido.controller.php?a=removeitem&id_pedido=<?=$livros[$i]['id_pedido']?>&id_livro=<?=$livros[$i]['id_livro']?>" class="btn badge bg-danger rounded-pill no-border text-sm-center">X</a> -->
											<?php } ?>
										</span>
									</li>

							<?php
								} // end do for ($i )
								if($pedido->getEstado() == 0){ ?>
									<form class="card p-2" method='post' action="../controller/Pedido.controller.php?a=finalizarpedido&id_pedido=<?=$pedido->getId()?>">
										<span>PREÇO TOTAL

										<?=Util::format_currency($total)?>

										</span>
										<input type="submit" class="btn btn-primary" value="Finalizar Compra!">
									</form>
									<form class="card p-2" method='post' action="../view/index.php">										
										<input type="submit" class="btn btn-secondary" value="Continuar comprando.">
									</form>
							<?php } ?>

					</div>
				</div>
			<?php } ?>
		</main>

		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

		<script type="text/javascript">
			(function () {
			'use strict'

			// Fetch all the forms we want to apply custom Bootstrap validation styles to
			var forms = document.querySelectorAll('.needs-validation')

			// Loop over them and prevent submission
			Array.prototype.slice.call(forms)
			.forEach(function (form) {
			form.addEventListener('submit', function (event) {
			if (!form.checkValidity()) {
			event.preventDefault()
			event.stopPropagation()
			}

			form.classList.add('was-validated')
			}, false)
			})
			})()
		</script>
	</body>
</html>
