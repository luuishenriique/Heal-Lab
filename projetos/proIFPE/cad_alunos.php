<title>Cadastro de Alunos</title>

<?php 
include 'header.php';
include 'config.php';

$dados = file(ALN_FILE);
for ($i = 0; $i < sizeof($dados); $i++) {
	$dados[$i] = explode(',', $dados[$i]);
}
?>

<?php if (!empty($_GET['msg'])): ?>
	<div class="msg_info">
		<h3><?= $_GET['msg'] ?></h3>
	</div>
<?php endif ?>

<br>
<legend class="leg_form">Informações sobre o aluno</legend>
<form class="form_info" action="add_aln.php" method="POST">
	<fieldset>
		<input type="text" name="aluno" placeholder="Nome do Aluno">
		<input type="text" name="matricula" placeholder="Matrícula">
		<input type="text" name="curso" placeholder="Curso Realizado">
		<input type="text" name="data" placeholder="Data de entrada">
		<input type="submit" value="Adicionar">
		<input type="reset" value="Limpar">
	</fieldset>
</form>
<br>

<table>
	<tr>
		<th>Nome do Aluno</th>
		<th>Matrícula</th>
		<th>Curso Realizado</th>
		<th>Data de entrada</th>
		<th>Apagar Aluno</th>
	</tr>
	<?php foreach ($dados as $i => $dado): ?>
		<tr>
			<?php foreach ($dado as $dados): ?>
				<td><?= $dados ?></td>
			<?php endforeach ?>
			<td>
				<a class="btn" href="del_aln.php?linha=<?= $i ?>"><i class="far fa-trash-alt"></i></a>
			</td>
		</tr>
	<?php endforeach ?>
</table>
</body>
</html>

