<?php 
require 'config.php';
include 'header.php';
session_start();
?>
<title>proIFPE::Adicionando professor</title>
<br>
<h1>Adicionando professor</h1>
<br>
<form class="form_info" action="add_prof.php" method="POST">
	<fieldset>
		<legend>Dados do professor</legend>
		<legend>SIAPE do professor</legend>
		<input type="text" name="siape" placeholder="Ex: 3356875" required maxlength="07">
		<legend>Nome do professor</legend>
		<input type="text" name="nome_prof" placeholder="Ex: José Maria Lopes" required>
		<input type="submit" value="Adicionar">
	</fieldset>
</form>
<br>
<p style="background-color: yellow; width: 50%; margin: auto;"><strong>ATENÇÃO: Após cadastro, solicitar usuário validar seus dados (email e senha) no primeiro login!</strong></p>
<br>
<h4 style="text-align: center;"><a href="cad_professores.php">Voltar para professores</a></h4>
<br>
<?php include 'footer.php'; ?>