<?php 
require 'config.php';
session_start();

$nameturma = $_SESSION['turma'];
echo $nameturma;

$PDO = dbConnect();

$slq = "SELECT * FROM Turmas WHERE nome_turma = :nometurma";

$stmt = $PDO->prepare($sql);

$stmt->bindParam(':nometurma', $nameturma);

$stmt->execute();

$linhas = $stmt->fetchAll(PDO::FETCH_ASSOC);
echo $linhas;

// $slq2 = "INSERT INTO Alunos(id_turma) VALUES(:idturma)";

// $stmt = $PDO->prepare($sql2);

// $stmt->bindParam(':idturma', $linhas[0]['id_turma']);
// echo $linhas[0]['id_turma'];

// $stmt->execute();

// redirect('cad_turmas_aln.php');
?>