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
		<form onsubmit="return validarSenhas(this)" action="../controller/Cliente.controller.php?a=efetuarLogin" method="POST">

			<label for="email">E-mail
			<input type="email" name="email">
			
			<label for="senha">Senha
			<input type="password" name="senha">
			
			<input type="submit" value="Efetuar Login">			
		</form>		
	</div>

</html>

<script type="text/javascript">

//VALIDA SE AS SENHAS SÃO IGUAIS PARA O CADASTRO
function validarSenhas(formulario){
	var senha = formulario.senha.value;
	var resenha = formulario.resenha.value;

	if(senha != resenha){
		alert("Senhas diferentes. Impossível cadastrar login. Por favor, tente novamente.");
		return false;
	}
	return true;
}

</script>