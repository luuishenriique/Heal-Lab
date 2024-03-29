<?php 
session_start();
include 'header.php';
isLoggedIn();
$tipo = $_SESSION['type_id'] ?? 0;
require 'config.php';

$login = $_POST['login'] ?? false;
$nome = $_POST['nome'] ?? false;
$email = $_POST['email'] ?? false;

if ($_SESSION['type_id'] == 1) {
	$PDO = dbConnect();

	$sql = "UPDATE Administradores SET login_adm = :login WHERE id_adm = :id";

	$stmt = $PDO->prepare($sql);

	$stmt->bindParam(':login', $login);
	$stmt->bindParam(':id', $_SESSION['user_id']);

	$stmt->execute();

	$PDO = dbConnect();

	$sql2 = "UPDATE Administradores SET name_adm = :nome WHERE id_adm = :id";

	$stmt = $PDO->prepare($sql2);

	$stmt->bindParam(':nome', $nome);
	$stmt->bindParam(':id', $_SESSION['user_id']);
	
	$stmt->execute();

	$PDO = dbConnect();

	$sql3 = "UPDATE Administradores SET email_adm = :email WHERE id_adm = :id";

	$stmt = $PDO->prepare($sql3);

	$stmt->bindParam(':email', $email);
	$stmt->bindParam(':id', $_SESSION['user_id']);

	$stmt->execute();

}

if ($_SESSION['type_id'] == 2) {
	$PDO = dbConnect();

	$sql2 = "UPDATE Professores SET name_prof = :nome WHERE id_prof = :id";
	$stmt = $PDO->prepare($sql2);

	$stmt->bindParam(':nome', $nome);
	$stmt->bindParam(':id', $_SESSION['user_id']);
	
	$stmt->execute();

	$PDO = dbConnect();

	$sql3 = "UPDATE Professores SET email_prof = :email WHERE id_prof = :id";

	$stmt = $PDO->prepare($sql3);

	$stmt->bindParam(':email', $email);
	$stmt->bindParam(':id', $_SESSION['user_id']);

	$stmt->execute();

}

if ($_SESSION['type_id'] == 3) {
	$PDO = dbConnect();

	$sql = "UPDATE Alunos SET name_aluno = :nome WHERE id_aluno = :id";

	$stmt = $PDO->prepare($sql);

	$stmt->bindParam(':nome', $nome);
	$stmt->bindParam(':id', $_SESSION['user_id']);

	$stmt->execute();

	$PDO = dbConnect();

	$sql3 = "UPDATE Alunos SET email_aluno = :email WHERE id_aluno = :id";

	$stmt = $PDO->prepare($sql3);

	$stmt->bindParam(':email', $email);
	$stmt->bindParam(':id', $_SESSION['user_id']);

	$stmt->execute(); 
}

redirect('my_data.php');
?>