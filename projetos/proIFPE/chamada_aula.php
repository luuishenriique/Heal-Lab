<?php 
require 'config.php';
include 'header.php';
session_start();

$idturma = $_SESSION['idturma'];

$PDO = dbConnect();

$sql = "SELECT * Alunos WHERE id_turma = :idturma";

$stmt = $PDO->prepare($sql);

$stmt->bindParam(':idturma', $idturma);

$stmt->execute();

$linhas = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<title>proIFPE::Chamada</title>
<br>
<h1>Chamada de Alunos</h1>
<br>
<table>
	<thead>
		<tr>
			<th>Aluno</th>
			<th>Matrícula</th>
			<th>Falta</th>
		</tr>
	</thead>
</table>
