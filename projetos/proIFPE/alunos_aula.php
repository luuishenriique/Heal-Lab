<?php 
require 'config.php';
include 'header.php';
session_start();

$idturma = $_GET['id'];
$hoje = date("d/m/Y");

$PDO = dbConnect();

$sql = "SELECT * FROM Alunos WHERE id_turma = :idturma";

$stmt = $PDO->prepare($sql);

$stmt->bindParam(':idturma', $idturma);

$stmt->execute();	

$linhas = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<title>proIFPE::Alunos</title>
<br>
<h1>Alunos da Turma</h1>
<br>
<table>
	<thead>
		<tr>
			<th>Matrícula</th>
			<th>Aluno</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($linhas as $id => $linha): ?>
			<tr>
				<td><?= $linhas[$id]['mat_aluno'] ?></td>
				<td><?= $linhas[$id]['name_aluno'] ?></td>
			</tr>
		<?php endforeach ?>
	</tbody>
</table>
<h4 style="text-align: center;"><a href="my_classes_prof.php">Voltar para aulas</a></h4>
<?php include 'footer.php' ?>