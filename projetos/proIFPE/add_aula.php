<?php
include 'config.php';
session_start();

$data = $_POST['data'] ?? false;
$descricao = $_POST['descricao'] ?? false;

$PDO = dbConnect();

$sql = "INSERT INTO Aulas(data_aula,desc_aula,cod_prof) values(:data,:descricao,:cod_prof)";

$stmt = $PDO->prepare($sql);

$stmt->bindParam(':data', $data);
$stmt->bindParam(':descricao', $descricao);
$stmt->bindParam(':cod_prof', $_SESSION['user_id']);

$stmt->execute();

redirect('cad_aula.php');
?>