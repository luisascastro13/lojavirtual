<?php session_start(); ?>

<html>
	
	<!-- CADASTRAR LOGIN -->
	<div>
		<h1>Cadastrar Login</h1>
		<form onsubmit="return validarSenhas(this)" action="../controller/Cliente.controller.php?a=inserirNovo" method="POST">

			<label for="email">E-mail
			<input type="text" name="email">
			
			<label for="senha">Senha
			<input type="password" name="senha">
			
			<label for="resenha">Repita a senha
			<input type="password" name="resenha">

			<input type="submit">			
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