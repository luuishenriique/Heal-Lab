<?php 
session_start();
include 'header.php';
isLoggedIn();
$tipo = $_SESSION['type_id'] ?? 0;
require 'config.php';

$login = $_POST['login'] ?? false;
$nome = $_POST['nome'] ?? false;
$email = $_POST['email'] ?? false;

$PDO = dbConnect();

if ($_SESSION['type_id'] == 1) {
	$sql = "UPDATE Administradores SET login_adm = :login WHERE id_adm = :id";
	$sql2 = "UPDATE Administradores SET name_adm = :nome WHERE id_adm = :id";
	$sql3 = "UPDATE Administradores SET email_adm = :email WHERE id_adm = :id";

	$stmt = $PDO->prepare($sql);

	$stmt->bindParam(':login', $login);
	$stmt->bindParam(':id', $_SESSION['user_id']);

	$stmt->execute();

	$stmt = $PDO->prepare($sql2);

	$stmt->bindParam(':nome', $nome);
	$stmt->bindParam(':id', $_SESSION['user_id']);
	
	$stmt->execute();

	$stmt = $PDO->prepare($sql3);

	$stmt->bindParam(':email', $email);
	$stmt->bindParam(':id', $_SESSION['user_id']);

	$stmt->execute();

}

if ($_SESSION['type_id'] == 2) {
	$sql2 = "UPDATE Professores SET name_adm = :nome WHERE id_adm = :id";
	$sql3 = "UPDATE Professores SET email_adm = :email WHERE id_adm = :id";
	$stmt = $PDO->prepare($sql2);

	$stmt->bindParam(':nome', $nome);
	$stmt->bindParam(':id', $_SESSION['user_id']);
	
	$stmt->execute();

	$stmt = $PDO->prepare($sql3);

	$stmt->bindParam(':email', $email);
	$stmt->bindParam(':id', $_SESSION['user_id']);

	$stmt->execute();

}

if ($_SESSION['type_id'] == 3) {
	$sql = "SELECT * FROM Alunos WHERE id_aluno = :id";

	$stmt = $PDO->prepare($sql);

	$stmt->bindParam(':id', $_SESSION['user_id']);

	$stmt->execute();

	$linhas = $stmt->fetchAll(PDO::FETCH_ASSOC);
	// var_dump($linhas);

	if (count($linhas) <= 0) {
		redirect('my_data.php');
		echo 'Achei nada!';
		exit();
	}
}
?>