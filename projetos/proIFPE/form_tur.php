<?php 
require 'config.php';
include 'header.php';
session_start();

$PDO = dbConnect();

$sql = "SELECT * FROM Cursos";

$stmt = $PDO->prepare($sql);

$stmt->execute();	

$linhas = $stmt->fetchAll(PDO::FETCH_ASSOC);
// var_dump($linhas);

// if (count($linhas) <= 0) {
// 	redirect('form_tur.php');
// 	// echo 'Achei nada!';
// 	exit();
// }

?>
<title>proIFPE::Adicionando turma</title>
<br>
<h1>Adicionando turma</h1>
<h3><a href="cad_turmas.php">Ver Turmas</a></h3>
<br>
<form class="form_info" action="add_tur.php" method="POST">
	<fieldset>
		<legend>Dados da turma</legend>
		<legend>Nome da turma</legend>
		<input type="text" name="nome" placeholder="Ex: 20172LG0000" required>
		<label>Selecione o Curso:</label>
		<select name="select-curso" required>
			<option selected disabled>Informe o curso</option>
			<?php foreach ($linhas as $id => $linha): ?>
				<option value="<?= $linhas[$id]['id_curso'] ?>"><?= $linhas[$id]['name_curso'] ?></option>
			<?php endforeach ?>
		</select>
		<br>
		<Label>Capacidade de alunos:</Label>
		<input type="number" name="capacidade" min="1" max="50" placeholder="Ex: 40" required>
		<br>
		<Label>Turno:</Label>
		<select name="select-turno" required>
			<option selected disabled>Informe o turno</option>
			<option value="Manhã">Manhã</option>
			<option value="Tarde">Tarde</option>
		</select>
		<input type="submit" value="Adicionar">
	</fieldset>
</form>
<br>
<br>
<!-- <h4 style="text-align: center;"><a href="cad_turmas.php">Voltar para turmas</a></h4> -->
<br>
<?php include 'footer.php'; ?>