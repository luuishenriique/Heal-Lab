<?php 
require 'config.php';
include 'header.php';
session_start();
?>
<title>proIFPE::Adicionando aluno</title>
<br>
<h1>Adicionando aluno</h1>
<br>
<form class="form_info" action="add_aln.php" method="POST">
	<fieldset>
		<legend>Dados do aluno</legend>
		<legend>Matrícula do aluno</legend>
		<input type="text" name="matricula" placeholder="Ex: 20172LG0000" required>
		<legend>Nome do aluno</legend>
		<input type="text" name="nome_aln" placeholder="Ex: Timóteo Cabral de Seráfia" required>
		<input type="submit" value="Adicionar">
	</fieldset>
</form>
<br>
<p style="background-color: yellow; width: 50%; margin: auto;"><strong>ATENÇÃO: Após cadastro, solicitar usuário validar seus dados (email e senha) no primeiro login!</strong></p>
<br>
<h4 style="text-align: center;"><a href="cad_alunos.php">Voltar para alunos</a></h4>
<br>
<?php include 'footer.php'; ?>