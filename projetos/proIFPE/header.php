<?php 
require 'config.php';
$tipo = $_SESSION['type_id'] ?? 1;
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="css/estilo.css">
	<link href="https://fonts.googleapis.com/css?family=Sintony&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">
	<link rel="shortcut icon" type="image/x-icon" href="img/5235fav.ico">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
</head>
<body>
	<div class="header">
		<span id="nome">IFPE</span>
		<h1 class="logo">Instituto Federal de Pernambuco</h1>
		<span id="nome-1">ProIFPE - Campus Igarassu</span>
	</div>
	<div id="sobre">
	</label>
	<ul class="menu">
		<?php if ($_SESSION['type_id'] == 1): ?>
			<strong><?= 'ADMINISTRADOR' ?></strong>
			<a href="logout.php">Sair</a>
			<a href="disciplinas.php">Apresentação</a>
			<a href="horario.php">Horário</a>
			<a href="cadastro.php">Cadastro</a>
			<a href="cad_turmas.php">Turmas</a>
			<a href="notificacao.php">Notificação</a>
			<a href="sobre.php">Sobre</a>
		<?php endif ?>
		<?php if ($_SESSION['type_id'] == 2): ?>
			<strong><?= 'PROFESSOR' ?></strong>
			<a href="logout.php">Sair</a>
			<a href="disciplinas.php">Apresentação</a>
			<a href="horario.php">Horários</a>
			<a href="cadastro.php" hidden>Cadastro</a>
			<a href="cad_turmas.php">Turmas</a>
			<a href="notificacao.php">Notificação</a>
			<a href="sobre.php">Sobre</a>
		<?php endif ?>
		<?php if ($_SESSION['type_id'] == 3): ?>
			<strong><?= 'ALUNO' ?></strong>
			<a href="logout.php">Sair</a>
			<a href="disciplinas.php">Apresentação</a>
			<a href="horario.php">Horários</a>
			<a href="cadastro.php" hidden>Cadastro</a>
			<a href="cad_turmas.php" hidden>Turmas</a>
			<a href="notificacao.php">Notificação</a>
			<a href="sobre.php">Sobre</a>
		<?php endif ?>
		<?php if (is_null($_SESSION['type_id'])): ?>
			<strong>| <?= 'VISITANTE' ?> |</strong>
			<a href="index.php">Início</a> | 
			<a href="disciplinas.php">Apresentação</a> |
			<a href="horario.php">Horários</a> |
			<a href="cadastro.php" hidden>Cadastro</a>
			<a href="cad_turmas.php" hidden>Turmas</a>
			<a href="notificacao.php" hidden>Notificação</a>
			<a href="sobre.php">Sobre</a> |	
		<?php endif ?>	
	</ul>
</label>
</div>


