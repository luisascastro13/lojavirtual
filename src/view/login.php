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
		<title>Login</title>
	</head>
	<body>
		<!-- CADASTRAR LOGIN -->
		<div>
			<h1>Cadastrar Login</h1>
			<form onsubmit="return validarSenhas(this)" action="../controller/Cliente.controller.php?a=inserirNovo" method="POST">

				<label for="email">E-mail
				<input type="email" name="email">

				<label for="senha">Senha
				<input type="password" name="senha">

				<label for="resenha">Repita a senha
				<input type="password" name="resenha">

				<input type="submit" value="Cadastrar Login">
			</form>
		</div>


		<!-- EFETUAR LOGIN -->
		<div>
			<h1>Efetuar Login</h1>
			<form onsubmit="return validarCadastri(this)" action="../controller/Cliente.controller.php?a=efetuarLogin" method="POST">

				<label for="email">E-mail
				<input type="email" name="email">

				<label for="senha">Senha
				<input type="password" name="senha">

				<input type="submit" value="Efetuar Login">
			</form>
		</div>
	</body>
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
