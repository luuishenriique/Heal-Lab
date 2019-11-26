<?php 
require 'config.php';
include 'header.php';
session_start();

$userid = $_SESSION['user_id'];

$PDO = dbConnect();

$sql = "SELECT * FROM Turmas WHERE id_prof = :idprof";

$stmt = $PDO->prepare($sql);

$stmt->bindParam(':idprof', $userid);

$stmt->execute();

$linhas = $stmt->fetchAll(PDO::FETCH_ASSOC);

$_SESSION['idcurso'] = $linhas[0]['id_curso'];
$_SESSION['idturma'] = $linhas[0]['id_turma'];
?>
<title>proIFPE::Selecionar Turma</title>
<br>
<h1>Turmas Disponíveis</h1>
<br>
<?php foreach ($linhas as $id => $linha): ?>
	<h2><a href="cad_aula.php?id=<?= $linhas[$id]['id_turma'] ?>"><?= $linhas[$id]['nome_turma'] ?></a></h2>
<?php endforeach ?>
<?php include 'footer.php'; ?>


