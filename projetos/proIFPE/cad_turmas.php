<title>Cadastro de Turmas</title>

<?php 
include 'header.php';
include 'config.php';

$dado = file(DIS_FILE);

$dados = file(TUR_FILE); /*recebendo arquivos da tabela csv*/
$turma = [];

for ($i=0; $i < sizeof($dados); $i++) { 
	$dados[$i] = explode(',', $dados[$i]);
}

?>

<?php if (!empty($_GET['msg'])): ?>
	<div class="msg_info">
		<h3><?= $_GET['msg'] ?></h3>
	</div>
<?php endif ?>

<br>
<legend class="leg_form">Informações da turma</legend>
<form class="form_info" action="add_tur.php" method="POST" style="text-align: center;">
	<fieldset>
		<input type="text" name="nturma" placeholder="Numero da turma">
		<input type="text" name="curso" placeholder="Curso"><br>
		<input type="text" name="alunos" placeholder="Quantidade de Alunos"><br>
		<input type="text" name="email" placeholder="Email do professor"><br>
		<p>--------------</p>
		<input type="submit" value="Adicionar">
		<input type="reset" value="Limpar">
	</fieldset>
</form>
<br>
<h2>Turmas cadastradas</h2>
<br>
<table>
	<tr>
		<th>Turma</th>
		<th>Curso</th>
		<th>Quantidade de alunos</th>
		<th>Email do Professor</th>
		<th>Apagar Professor</th>
	</tr>
	<?php foreach ($dados as $i => $dado): ?>
		<tr>
			<?php foreach ($dado as $dados): ?>
				<td><?= $dados ?></td>
			<?php endforeach  ?>
			<td>
				<a href="del_tur.php?linha=<?= $i ?>" class="btn"><i class="far fa-trash-alt">
			</td>
		</tr>
	<?php endforeach ?>
</table>
<?php include 'footer.php' ?>