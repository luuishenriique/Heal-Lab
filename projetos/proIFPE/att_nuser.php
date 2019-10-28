<?php 
require 'config.php';
include 'header.php';
?>
<title>Liberar usuário</title>
</div>
<br>
<form class="form_info" method="POST" action="auth_nuser.php">
	<fieldset>
		<legend>Área de cadastro</legend>
		<legend>Matrícula ou SIAPE</legend>
		<input type="text" name="user_data" placeholder="Ex: 20191INFIG7151" required>
		<legend>Email</legend>
		<input type="text" name="email" placeholder="Ex: jsilva@gmail.com" required>
		<legend>Senha</legend>
		<input type="password" name="senha" required>
		<legend>Confirme a Senha</legend>
		<input type="password" name="conf_senha" required>
		<legend>Senha do Administrador</legend>
		<input type="password" name="adm_senha" required>
		<input type="submit" value="Atualizar dados">
	</fieldset>
</form>
<h3><a href="login.php">Voltar para login</a></h3>
</div>