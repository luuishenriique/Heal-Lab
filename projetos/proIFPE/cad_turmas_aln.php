<?php 
require 'config.php';
include 'header.php';
session_start();
$curso = $_SESSION['curso-turma'];
// echo $curso;

$PDO = dbConnect();

$sql = 'SELECT * FROM Alunos WHERE id_curso = :idcurso AND id_turma is NULL';

$stmt = $PDO->prepare($sql);

$stmt->bindParam(':idcurso', $curso);

$stmt->execute();

$linhas = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<title>proIFPE::Adicionando Turmas</title>
<br>
<h1>Adicionando alunos em turma <?= $_SESSION['turma'] ?></h1>
<br>
<form action="add_aln.php" method="POST">
	<table>
		<thead>
			<tr>
				<th>Matrícula</th>
				<th>Aluno</th>
				<th>Ação</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($linhas as $id => $linha): ?>
				<tr>
					<td><?= $linhas[$id]['mat_aluno'] ?></td>
					<td><?= $linhas[$id]['name_aluno'] ?></td>
					<td><a href="add_aln_tur.php">Adicionar aluno</a></td>
				</tr>
			<?php endforeach ?>
		</tbody>
	</table>
</form>
<br>
<!-- <h4 style="text-align: center;"><a href="cad_turmas.php">Voltar para turmas</a></h4> -->
<br>
<?php include 'footer.php'; ?>