<?php 
require 'config.php';
session_start();

$idprof = $_SESSION['idprof'];
$iddisc = $_SESSION['iddisc'];
$idturma = $_POST['select-turma'] ?? false;

$PDO = dbConnect();

$sql = "UPDATE Turmas SET id_prof = :idprof WHERE id_turma = :idturma";

$stmt = $PDO->prepare($sql);

$stmt->bindParam(':idprof', $idprof);
$stmt->bindParam(':idturma', $idturma);

$stmt->execute();

redirect('save_disc_id.php');
?>