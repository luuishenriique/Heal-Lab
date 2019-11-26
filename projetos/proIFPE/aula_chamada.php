<?php 
require 'config.php';
include 'header.php';

$idturma = $_GET['id'];

$PDO = dbConnect();

$sql = "SELECT * FROM Alunos WHERE id_turma = :idturma";

$stmt = $PDO->prepare($sql);

$stmt->bindParam(':idturma', $idturma);

$stmt->execute();

$linhas = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<title>proIFPE::Chamada de aula</title>
<br>
<h1>Chamada de aula</h1>
<br>
<h3 style="background-color: yellow; width: 50%; margin: auto;"><strong>ATENÇÃO: Campo de falta vazio representa presença do aluno na aula!</strong></h3>
<br>
<form action="add_chamada_aula.php" method="POST">
	<fieldset class="form_info">
	<legend>Quantidade de aulas</legend>
	<label>Insira a quantidade: </label><input type="number" name="qtd_aulas" max="5" min="1" value="0">
	</fieldset>
	<br>
	<table>
		<thead>
			<tr>
				<th>Matrícula</th>
				<th>Aluno</th>
				<th>Faltas</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($linhas as $id => $linha): ?>
				<tr>
					<td><?= $linhas[$id]['mat_aluno'] ?></td>
					<td><?= $linhas[$id]['name_aluno'] ?></td>
					<td><input type="number" name="qtd_faltas" value="0" min="0" max="5"></td>
				</tr>
			<?php endforeach ?>
		</tbody>
	</table>
	<br>
	<input class="form_info" type="submit" value="Registrar">
</form>
