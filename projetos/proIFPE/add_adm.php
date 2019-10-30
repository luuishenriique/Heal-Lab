<?php 
include 'config.php';
session_start();

$login = $_POST['login_adm'] ?? false;
$nome = $_POST['nome_adm'] ?? false;
$iduser = 1;

$PDO = dbConnect();

$sql = "INSERT INTO Administradores(login_adm,name_adm,id_user) values(:login,:nome,:iduser)";

$stmt = $PDO->prepare($sql);

$stmt->bindParam(':login', $login);
$stmt->bindParam(':nome', $nome);
$stmt->bindParam(':iduser', $iduser);

$stmt->execute();

redirect('cad_administradores.php');
?>