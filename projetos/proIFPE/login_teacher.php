<title>Login</title>

<?php include "header.php" ?>

<form class="form_info" method="post" action="login-process-teacher.php">
	<fieldset>
		<legend>Informações para login</legend>
		<legend>Siape do Professor</legend>
		<input type="text" name="siape" placeholder="Ex: ABC204432">
		<legend>Senha do Professor</legend>
		<input type="password" name="senha" placeholder="Ex: QG3550-OB">
		<input type="submit" value="login">	
	</fieldset>
</form>