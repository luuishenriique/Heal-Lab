<title>Cadastro de Professores</title>

<?php 
include 'header.php';
include 'config.php';

$dado = file(DIS_FILE);

$dados = file(PRO_FILE); /*recebendo arquivos da tabela csv*/
$professor = [];

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
<legend class="leg_form">Informações sobre o professor</legend>
<form class="form_info" action="add_prof.php" method="POST" style="text-align: center;">
	<fieldset>
		<input type="text" name="siape" placeholder="SIAPE">
		<input type="text" name="professor" placeholder="Professor"><br>
		<input type="text" name="email" placeholder="Email"><br>
		<p>Disciplina:</p>
		<select name="disc-prof">
			<option value="" selected>Selecione a disciplina</option>
			<option value="Informática">Informática</option>
			<option value="Matemática">Matemática</option>
		</select>
		<p>--------------</p>
		<input type="submit" value="Adicionar">
		<input type="reset" value="Limpar">
	</fieldset>
</form>
<br>
<h2>Professores cadastrados</h2>
<br>
<table>
	<tr>
		<th>SIAPE</th>
		<th>Professor</th>
		<th>Disciplina</th>
		<th>Email</th>
		<th>Apagar Professor</th>
	</tr>
	<?php foreach ($dados as $i => $dado): ?>
		<tr>
			<?php foreach ($dado as $dados): ?>
				<td><?= $dados ?></td>
			<?php endforeach  ?>
			<td>
				<a href="del_prof.php?linha=<?= $i ?>" class="btn"><i class="far fa-trash-alt">
			</td>
		</tr>
	<?php endforeach ?>
</table>
<?php include 'footer.php' ?>