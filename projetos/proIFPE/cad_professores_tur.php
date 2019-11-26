<?php 
require 'config.php';
include 'header.php';
session_start();

$PDO = dbConnect();

$sql = "SELECT * FROM Turmas";

$stmt = $PDO->prepare($sql);

$stmt->execute();

$linhas = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<title>proIFPE::Adicionando professor</title>
<h1>Selecione turma para professor <?= $_SESSION['nome-prof'] ?></h1>
<form class="form-info" action="add_prof_tur.php" method="POST">
	<fieldset>
		<legend>Inserir turma para professor</legend>
		<label>Selecione uma turma</label>
		<br>
		<select name="select-turma">
			<option selected disabled required>Selecione aqui</option>
			<?php foreach ($linhas as $id => $linha): ?>
				<option value="<?= $linhas[$id]['id_turma'] ?>"><?= $linhas[$id]['nome_turma'] ?></option>
			<?php endforeach ?>
		</select>
		<br>
		<input type="submit" value="Adicionar">
	</fieldset>
</form>
<br>
<h4 style="text-align: center;"><a href="cad_professores.php">Voltar para professores</a></h4>
<br>
<?php include 'footer.php'; ?>