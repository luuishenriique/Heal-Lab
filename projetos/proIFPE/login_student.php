<title>Login</title>

<?php include "header.php" ?>

<form class="form_info" method="post" action="login-process-student.php">
	<fieldset>
		<legend>Informações para login</legend>
		<!-- <input type="text" name="nome" placeholder="Ex: Utilize o login cadastrado"> -->
		<legend>Matrícula do aluno</legend>
		<input type="text" name="matricula" placeholder="Ex: 20191INFIG0001">
		<legend>Senha do aluno</legend>
		<input type="password" name="senha" placeholder="Ex: Log131704">
		<input type="submit" value="Login">
	</fieldset>
</form>