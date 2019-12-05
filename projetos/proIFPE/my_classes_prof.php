<?php 
require 'config.php';
include 'header.php';
session_start();

$userid = $_SESSION['user_id'];
$typeid = $_SESSION['type_id'];

if ($typeid == 2) {
	
	$PDO = dbConnect();

	$sql = "SELECT * FROM Turmas WHERE id_prof = :idprof";

	$stmt = $PDO->prepare($sql);

	$stmt->bindParam(':idprof', $userid);

	$stmt->execute();

	$linhas = $stmt->fetchAll(PDO::FETCH_ASSOC);

	// $_SESSION['idcurso'] = $linhas[0]['id_curso'];
	// $_SESSION['idturma'] = $linhas[0]['id_turma'];

}

if ($typeid == 3) {
	
	$PDO = dbConnect();

	$sql = "SELECT Turmas.id_turma,Turmas.nome_turma,Alunos.id_aluno FROM Turmas INNER JOIN Alunos ON Turmas.id_turma=Alunos.id_turma AND Alunos.id_aluno=:idaluno;";

	$stmt = $PDO->prepare($sql);

	$stmt->bindParam(':idaluno', $userid);

	$stmt->execute();

	$linhas = $stmt->fetchAll(PDO::FETCH_ASSOC);

	// $_SESSION['idcurso'] = $linhas[0]['id_curso'];
	// $_SESSION['idturma'] = $linhas[0]['id_turma'];

}

?>
<title>proIFPE::Selecionar Turma</title>
<br>
<h1>Turmas Disponíveis</h1>
<br>
<!-- <?php if (count($linhas <= 0)): ?>
	<h3 style="background-color: yellow; max-width: 50%; margin: auto;"><u><strong>Sem turmas disponíveis, entrar em contato com os administradores!</strong></u></h3>
	<br>
	<h3><a href="home.php">Voltar para home </a></h3>
	<?php endif ?> -->
	<?php if ($typeid == 2): ?>
		<?php foreach ($linhas as $id => $linha): ?>
			<h2><a href="cad_aula.php?id=<?= $linhas[$id]['id_turma'] ?>"><?= $linhas[$id]['nome_turma'] ?></a></h2>
		<?php endforeach ?>	
	<?php endif ?>
	<?php if ($typeid == 3): ?>
		<?php foreach ($linhas as $id => $linha): ?>
			<h2><a href="presenca_aula_aln.php?id=<?= $linhas[$id]['id_turma'] ?>"><?= $linhas[$id]['nome_turma'] ?></a></h2>
		<?php endforeach ?>		
	<?php endif ?>
	<?php include 'footer.php'; ?>


