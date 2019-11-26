<?php 
require 'config.php';
session_start();

$idprof = $_SESSION['idprof'];
$iddisc = $_SESSION['iddisc'];

$PDO = dbConnect();

$sql = "UPDATE Turmas SET id_disc = :iddisc WHERE id_prof = :idprof";

$stmt = $PDO->prepare($sql);

$stmt->bindParam(':iddisc', $iddisc);
$stmt->bindParam(':idprof', $idprof);

$stmt->execute();

redirect('cad_professores.php');
?>