<title>Cadastro de Professores</title>

<?php 
include 'header.php';
include 'config.php';
?>

<?php

$dado = file(DIS_FILE);

$dados = file(PRO_FILE);

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
<form class="form_info" action="add_prof.php" method="POST" style="text-align: center;">
	<fieldset>
		<legend class="leg_form">Informações sobre o professor</legend>
		<legend>SIAPE do professor</legend>
		<input type="text" name="siape" placeholder="Ex: ABC123CB">
		<legend>Nome do professor</legend>
		<input type="text" name="professor" placeholder="Ex: Marcos Paulo"><br>
		<legend>Email do professor</legend>
		<input type="text" name="email" placeholder="Ex: paulo.marcos@gmail.com"><br>

     	<div>
    	<legend>Disciplina</legend>
    	<select type="text" name="select-disciplina">
        <?php foreach($dado as $dd): ?>
            <option value="<? $dd ?>"><?= trim($dd) ?></option>
        <?php endforeach ?>
      	</select>
    	</div>

		<p>--------------</p>
		<input type="submit" value="Adicionar">
		<!-- <input type="reset" value="Limpar"> -->
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
		<th>Editar</th>
	</tr>
	<?php foreach ($dados as $i => $dado): ?>
		<tr>
			<?php foreach ($dado as $dados): ?>
				<td><?= $dados ?></td>
			<?php endforeach  ?>
    <td>
      <a href="del_prof.php?linha=<?= $i ?>" class="btn"><i class="far fa-trash-alt"></i>
      </td>
      <td>
        <a href="edi_prof.php?linha=<?= $id ?>" class="btn"><i class="far fa-edit"></i></a>
      </td>
    </tr>
		<?php endforeach ?>
	</table>
	<?php include 'footer.php' ?>