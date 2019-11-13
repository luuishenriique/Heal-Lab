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

if (count($linhas) <= 0) {
	redirect('my_data.php');
	echo 'Achei nada!';
	exit();
}

?>
<title>proIFPE::Adicionando aluno</title>
<br>
<h1>Adicionando aluno</h1>
<br>
<form class="form_info" action="add_aln.php" method="POST">
	<fieldset>
		<legend>Dados do aluno</legend>
		<legend>Matrícula do aluno</legend>
		<input type="text" name="matricula" placeholder="Ex: 20172LG0000" required>
		<legend>Nome do aluno</legend>
		<input type="text" name="nome_aln" placeholder="Ex: Timóteo Cabral de Seráfia" required>
		<br>
		<label>Selecione o Curso:</label>
		<select name="select-curso" required>
			<option selected disabled>Informe o curso</option>
			<?php foreach ($linhas as $id => $linha): ?>
				<option value="<?= $linhas[$id]['id_curso'] ?>"><?= $linhas[$id]['name_curso'] ?></option>
			<?php endforeach ?>
		</select>
		<input type="submit" value="Adicionar">
	</fieldset>
</form>
<br>
<p style="background-color: yellow; width: 50%; margin: auto;"><strong>ATENÇÃO: Após cadastro, solicitar usuário validar seus dados (email e senha) no primeiro login!</strong></p>
<br>
<h4 style="text-align: center;"><a href="cad_alunos.php">Voltar para alunos</a></h4>
<br>
<?php include 'footer.php'; ?>