<?php 
require 'config.php';
session_start();

$id = $_GET['id'];

$PDO = dbConnect();

$sql = "DELETE FROM Professores WHERE id_prof = :id";

$stmt = $PDO->prepare($sql);

$stmt->bindParam(':id', $id);

$stmt->execute();

redirect('cad_professores.php');
?>