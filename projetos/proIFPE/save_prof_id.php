<?php 
require 'config.php';
session_start();

$PDO = dbConnect();

$sql = "SELECT * FROM Professores WHERE siape_prof = :siape";

$stmt = $PDO->prepare($sql);

$stmt->bindParam(':siape', $_SESSION['siape']);

$stmt->execute();

$linhas = $stmt->fetchAll(PDO::FETCH_ASSOC);

$_SESSION['idprof'] = $linhas[0]['id_prof'];
$_SESSION['iddisc'] = $linhas[0]['id_disc'];

redirect('cad_professores_tur.php');
?>