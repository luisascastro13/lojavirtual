<?php
$caixaDeEntrada = 'luisascastro13@gmail.com';

if(isset($_POST)){
	$mensagem = $_POST['mensagem'];
	$cliente = $_POST['nome'];
	$email = $_POST['email'];

	if(mail($caixaDeEntrada, null, $mensagem, "From: $cliente <$email>" )){
		 echo 'E-Mail enviado com sucesso!<br>';
	}
	else {
	    echo 'Erro no envio do e-mail.<br>';
	}
}

?>

<html>
	<form methor='POST'>
		<h1>Fale conosco!</h1>
		<p>Envie sua mensagem</p>
		Seu nome<label for='nome'>
		<input type="text" name="nome" required>

		Seu e-mail<label for="email">
		<input type="email" name="email" required>

		Mensagem<label for="mensagem">
		<input type="text" name="mensagem" required>

		<input type="submit" value="Enviar mensagem">
	</form>
</html>