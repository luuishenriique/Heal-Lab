<?php 
require 'config.php';
include 'header.php';
session_start();

$PDO = dbConnect();

$sql = "SELECT * FROM Disciplinas";

$stmt = $PDO->prepare($sql);

$stmt->execute();

$linhas = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<title>proIFPE::Adicionando professor</title>
<br>
<h1>Adicionando professor</h1>
<h3><a href="cad_professores.php">Ver Professores</a></h3>
<br>
<p style="background-color: yellow; width: 50%; margin: auto;"><strong>ATENÇÃO: Após cadastro, solicitar usuário validar seus dados (email e senha) no primeiro login!</strong></p>
<br>
<form class="form_info" action="add_prof.php" method="POST">
	<fieldset>
		<legend>Dados do professor</legend>
		<legend>SIAPE do professor</legend>
		<input type="text" name="siape" placeholder="Ex: 3356875" required maxlength="07">
		<legend>Nome do professor</legend>
		<input type="text" name="nome_prof" placeholder="Ex: José Maria Lopes" required>
		<label>Selecione a disciplina:</label>
		<br>
		<select name="select-disc" required>
			<option selected disabled required>Informe a disciplina</option>
			<?php foreach ($linhas as $id => $linha): ?>
				<option value="<?= $linhas[$id]['id_disc'] ?>"><?= $linhas[$id]['name_disc'] ?></option>
			<?php endforeach ?>
		</select>
		<input type="submit" value="Adicionar">
	</fieldset>
</form>
<br>
<!-- <h4 style="text-align: center;"><a href="cad_professores.php">Voltar para professores</a></h4> -->
<br>
<?php include 'footer.php'; ?>