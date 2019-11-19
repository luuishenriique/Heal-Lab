<?php 
require 'config.php';
include 'header.php';

$PDO = dbConnect();

$sql = "SELECT * FROM Cursos";

$stmt = $PDO->prepare($sql);

$stmt->execute();

$linhas = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<title>proIFPE::Adicionando Disciplina</title>
<br>
<h1>Adicionando disciplina</h1>
<br>
<form class="form_info" action="add_dis.php" method="POST">
	<fieldset>
		<legend>Dados de disciplina</legend>
		<legend>Nome da disciplina</legend>
		<input type="text" name="nome_disc" placeholder="Ex: Matemática" required>
		<legend>Descrição da disciplina</legend>
		<input type="text" name="desc_disc" placeholder="Ex: Aprender a calcular" required>
		<br>
		<label>Selecione o curso:</label>
		<select name="select-curso">
			<option selected disabled required>Informe o curso</option>
			<?php foreach ($linhas as $id => $linha): ?>
				<option value="<?= $linhas[$id]['id_curso'] ?>"><?= $linhas[$id]['name_curso'] ?></option>
			<?php endforeach ?>
		</select>
		<input type="submit" value="Adicionar">
	</fieldset>
</form>
<br>
<h4 style="text-align: center;"><a href="cad_disciplinas.php">Voltar para disciplinas</a></h4>
<br>
<?php include 'footer.php'; ?>
