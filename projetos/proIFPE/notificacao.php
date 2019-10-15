<title>Notificações</title>

<?php
include 'header.php';
include 'config.php';

$dados = file(NOT_FILE);
for($i=0; $i <sizeof($dados); $i++){
	$dados[$i] = explode(',', $dados[$i]);
}
?>

<?php if (!empty($_GET['msg'])): ?>
	<div class="msg_info">
		<h3><?= $_GET['msg'] ?></h3>
	</div>
<?php endif ?>

<br>
<legend class="leg_form">Notificação</legend>
<form class="form_info" action="add_not.php" method="POST" style="text-align: center;">
	<fieldset>
		<input type="text" name="nome" placeholder="Notificação"><br>
		<input type="submit" value="Adicionar">
		<input type="reset" value="Limpar">
	</fieldset>
</form>
<br>

<table>
	<tr>
		<th>Notificação</th>
		<th>Apagar Notificação</th>
	</tr>
	<?php foreach ($dados as $i => $dado): ?>
		<tr>
			<?php foreach ($dado as $dados): ?>
				<td><?= $dados ?></td>
			<?php endforeach ?>
			<td>
				<a href="del_not.php?linha=<?= $i ?>" class="btn"><i class="far fa-trash-alt">
			</td>
		</tr>
	<?php endforeach ?>
</table>
</body>
</html> 