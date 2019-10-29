<?php 
require 'config.php';

$dados = $_POST['matricula'] ?? false;
$senha = $_POST['senha'] ?? false;

$dados = strtoupper($dados);
var_dump($dados);
$senha = cryptPass($senha);
var_dump($senha);

if (strlen($dados) < 7) {

	echo 'ADMINISTRADOR';	
	
	$PDO = dbConnect();

	$sql = "SELECT * FROM Administradores WHERE login_adm = :login AND password_adm = :password";

	$stmt = $PDO->prepare($sql);

	$stmt->bindParam(':login', $dados);
	$stmt->bindParam(':password', $senha);

	$stmt->execute();

	$linhas = $stmt->fetchAll(PDO::FETCH_ASSOC);
	var_dump($linhas);

	if (count($linhas) <= 0) {
		redirect('login.php');
		echo 'Achei nada!';
		exit();
	}

	$dado = $linhas[0];

	session_start();
	loggedOK();
	$_SESSION['user_id'] = $dado['id_adm'];
	$_SESSION['user_data'] = $dado['login_adm'];
	$_SESSION['user_name'] = $dado['name_adm'];
	$_SESSION['type_id'] = $dado['id_user'];
	$tipo = $_SESSION['type_id'];

	redirect('home.php');
	echo 'Consegui!';
}

if (strlen($dados) == 7) {

	echo 'SIAPE';	
	
	$PDO = dbConnect();

	$sql = "SELECT * FROM Professores WHERE siape_prof = :siape AND password_prof = :password";

	$stmt = $PDO->prepare($sql);

	$stmt->bindParam(':siape', $dados);
	$stmt->bindParam(':password', $senha);

	$stmt->execute();

	$linhas = $stmt->fetchAll(PDO::FETCH_ASSOC);
	var_dump($linhas);

	if (count($linhas) <= 0) {
		redirect('login.php');
		echo 'Achei nada!';
		exit();
	}

	$dado = $linhas[0];

	session_start();
	loggedOK();
	$_SESSION['user_id'] = $dado['id_prof'];
	$_SESSION['user_data'] = $dado['siape_prof'];
	$_SESSION['user_name'] = $dado['name_prof'];
	$_SESSION['type_id'] = $dado['id_user'];
	$tipo = $_SESSION['type_id'];

	redirect('home.php');
	echo 'Consegui!';
}

if (strlen($dados) > 7) {

	echo 'MATRÍCULA';	
	
	$PDO = dbConnect();

	$sql = "SELECT * FROM Alunos WHERE mat_aluno = :matricula AND password_aluno = :password";

	$stmt = $PDO->prepare($sql);

	$stmt->bindParam(':matricula', $dados);
	$stmt->bindParam(':password', $senha);

	$stmt->execute();

	$linhas = $stmt->fetchAll(PDO::FETCH_ASSOC);
	var_dump($linhas);

	if (count($linhas) <= 0) {
		redirect('login.php');
		echo 'Achei nada!';
		exit();
	}

	$dado = $linhas[0];

	session_start();
	loggedOK();
	$_SESSION['user_id'] = $dado['id_aluno'];
	$_SESSION['user_data'] = $dado['mat_aluno'];
	$_SESSION['user_name'] = $dado['name_aluno'];
	$_SESSION['type_id'] = $dado['id_user'];
	$tipo = $_SESSION['type_id'];

	redirect('home.php');
	echo 'Consegui!';
}
?>