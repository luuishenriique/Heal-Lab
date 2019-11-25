<?php
include 'config.php';
session_start();

// $data = date();
// echo $date;
// exit();

$descricao = $_POST['descricao'] ?? false;

$PDO = dbConnect();

$sql = "INSERT INTO Aulas(data_aula,desc_aula,id_prof,id_turma) values(:data,:descricao,:idprof,:idturma)";

$stmt = $PDO->prepare($sql);

$stmt->bindParam(':data', $data);
$stmt->bindParam(':descricao', $descricao);
$stmt->bindParam(':idprof', $_SESSION['user_id']);
$stmt->bindParam(':idturma', $_SESSION['idturma']);
// $stmt->bindParam(':iddisc', $_SESSION['iddisc']);
// $stmt->bindParam(':idcurso', $_SESSION['idcurso']);


$stmt->execute();
// echo $_SESSION['user_id'];
// echo $_SESSION['idturma'];
// echo $_SESSION['iddisc'];
// echo $_SESSION['user_id'];
redirect('cad_aula.php');
?>