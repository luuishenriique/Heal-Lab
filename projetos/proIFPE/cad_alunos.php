<title>Cadastro de Alunos</title>

<?php 
include 'header.php';
include 'config.php';

$dados_turma = file(TUR_FILE);
$dados_cadeira = file(CDR_FILE);
$dados_curso = file(CUR_FILE);

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
		<legend>Informações sobre o aluno</legend>
		<legend>Matrícula do aluno</legend>
		<input type="text" name="matricula" placeholder="Ex: 20172LOG3322" required>
		<legend>Nome do aluno</legend>
		<input type="text" name="aluno" placeholder="Ex: João da Silva" required>
		<legend>Email do aluno</legend>
		<input type="text" name="email" placeholder="Ex: joao.silva@outlook.com" required>
		<label>Informe o curso:</label>
		<select name="curso">
			<option value="" selected disabled>Selecione o curso</option>
			<?php foreach ($dados_curso as $cur): ?>
				<option value="<?= $cur ?>"><?= $cur ?></option>
			<?php endforeach ?>
		</select>
		<br>
		<br>
		<label>Informe a disciplina:</label>
		<select name="disciplina">
			<option value="" selected disabled>Selecione a disciplina</option>
			<?php foreach ($dados_cadeira as $cdr): ?>
				<option value="<?= $cdr ?>"><?= $cdr ?></option>
			<?php endforeach ?>
		</select>
		<br>
		<br>
		<label>Informe a turma:</label>
		<select name="turma">
			<option value="" selected disabled>Selecione a turma</option>
			<?php foreach ($dados_turma as $tur): ?>
				<option value="<?= $tur ?>"><?= $tur ?></option>
			<?php endforeach ?>
		</select>
		<p>---------------------</p>
		<!-- <input type="date" name="data" placeholder="Data de entrada"> -->
		<input type="submit" value="Adicionar">
		<!-- <input type="reset" value="Limpar"> -->
	</fieldset>
</form>
<br>
<h2>Alunos cadastrados</h2>
<br>
<table>
	<tr>
		<th>Matrícula</th>
		<th>Nome do Aluno</th>
		<th>Email</th>
		<th>Curso</th>
		<th>Disciplina</th>
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
<?php include 'footer.php' ?>

