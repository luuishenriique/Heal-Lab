<?php 
include 'header.php';
session_start();
isLoggedIn();
$tipo = $_SESSION['type_id'] ?? 0;
require 'config.php';
?>
<title>proIFPE::Home</title>
<h3>Bem vindo <?= $_SESSION['user_name']?>!</h3>
<br>
<?php if ($_SESSION['type_id'] == 2): ?>
	<h2><a href="">Suas turmas</a></h2>
	<h2><a href="">Suas aulas</a></h2>
	<h2><a href="my_data.php">Perfil</a></h2>
	<h3><a href="logout.php">Sair</a></h3>
<?php endif ?>
<?php if ($_SESSION['type_id'] == 3): ?>
		<h2><a href="">Sua turma</a></h2>
		<h2><a href="">Suas aulas</a></h2>
		<h2><a href="">Boletim</a></h2>
		<h2><a href="my_data.php">Perfil</a></h2>
		<h3><a href="logout.php">Sair</a></h3>
<?php endif ?>
<br>
<?php include 'footer.php'; ?>