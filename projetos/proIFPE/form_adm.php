<?php 
require 'config.php';
include 'header.php';
session_start();
?>
<title>proIFPE::Adicionando Administrador</title>
<br>
<h1>Adicionando administrador</h1>
<br>
<p style="background-color: yellow; width: 50%; margin: auto;"><strong>ATENÇÃO: Após cadastro, solicitar usuário validar seus dados (email e senha) no primeiro login!</strong></p>
<br>
<form class="form_info" action="add_adm.php" method="POST">
	<fieldset>
		<legend>Dados de administrador</legend>
		<legend>Login do administrador (até 6 caracteres)</legend>
		<input type="text" name="login_adm" placeholder="Ex: Adm123" required maxlength="06">
		<legend>Nome do administrador</legend>
		<input type="text" name="nome_adm" placeholder="Ex: Marcos Paulo da silva" required>
		<input type="submit" value="Adicionar">
	</fieldset>
</form>
<br>
<!-- <h4 style="text-align: center;"><a href="cad_administradores.php">Voltar para administradores</a></h4> -->
<br>
<?php include 'footer.php'; ?>