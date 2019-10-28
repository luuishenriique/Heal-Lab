<?php include 'header.php'; ?>
	<title>proIFPE::Login</title>
<br>
<form class="form_info" method="POST" action="auth_user.php">
	<fieldset>
		<legend>Área de Login</legend>
		<legend>Matrícula ou SIAPE</legend>
		<input type="text" name="matricula" required>
		<legend>Senha</legend>
		<input type="password" name="senha" required>
		<input type="submit" value="Login">
		<p>Primeiro login? <br> <a href="att_nuser.php">Habilite seus dados aqui!</a></p>
	</fieldset>
</form>
</div>
<br>
<h3><a href="index.php">Voltar</a></h3>
<?php include 'footer.php'; ?>

