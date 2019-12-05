<?php 
require 'config.php';
session_start();

$id = $_GET['id'];

$PDO = dbConnect();

$sql = "DELETE FROM Alunos WHERE id_aluno = :id";

$stmt = $PDO->prepare($sql);

$stmt->bindParam(':id', $id);

$stmt->execute();

redirect('cad_alunos.php');
?>