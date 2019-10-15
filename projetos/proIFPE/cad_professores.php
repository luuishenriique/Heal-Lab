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
		<input type="text" name="professor" placeholder="Professor"><br>
		<select name="select-dis">
			<?php foreach ($dado as $dd): ?>
				<option value="<?= $dd ?>"><?= $dd ?></option>
			<?php endforeach?>
		</select><br>
		<input type="text" name="email" placeholder="Email"><br>
		<input type="submit" value="Adicionar">
		<input type="reset" value="Limpar">
	</fieldset>
</form>
<br>

<table>
	<tr>
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
</body>
</html>