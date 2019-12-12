<?php 
session_start();
require 'config.php';
include 'header.php';
isLoggedIn();
$tipo = $_SESSION['type_id'];
?>
<title>proIFPE::Home</title>
<!-- <h3>Bem vindo, <?= $_SESSION['user_name']?>!</h3> -->
<br>
<?php if ($_SESSION['type_id'] == 1): ?>
	<div class="menu-home">
		<!-- <br> -->
		<div class="card-home">
			<div class="card-img">
				
				<a href="form_tur.php"><img src="img/bn_atualizacaocadastro.png" alt="cadastro" style="width: 100%"></a>
			</div>
			<div class="content-card">
				<h3><a href="form_tur.php">Cadastrar Turmas</a></h3>
			</div>
		</div>
		<!-- <br> -->
		<div class="card-home">
			<div class="card-img">
				
				<img src="img/bn_atualizacaocadastro.png" alt="cadastro" style="width: 100%">
			</div>
			<div class="content-card">
				<h3><a href="form_aln.php">Cadastrar Alunos</a></h3>
			</div>
		</div>
		<!-- <br> -->
		<div class="card-home">
			<div class="card-img">
				
				<img src="img/bn_atualizacaocadastro.png" alt="cadastro" style="width: 100%">
			</div>
			<div class="content-card">
				<h3><a href="form_prof.php">Cadastrar Professores</a></h3>
			</div>
		</div>
		<!-- <br> -->
		<div class="card-home">
			<div class="card-img">
				
				<img src="img/bn_atualizacaocadastro.png" alt="cadastro" style="width: 100%">
			</div>
			<div class="content-card">
				<h3><a href="form_dis.php">Cadastrar Disciplinas</a></h3>
			</div>
		</div>
		<!-- <br> -->
		<div class="card-home">
			<div class="card-img">
				
				<img src="img/bn_atualizacaocadastro.png" alt="cadastro" style="width: 100%">
			</div>
			<div class="content-card">
				<h3><a href="form_adm.php">Cadastrar Administradores</a></h3>
			</div>
		</div>
		<!-- <br> -->
		<!-- <br> -->
		<div class="card-home">
			<div class="card-img">
			<img src="img/perfil.jpg" alt="perfil" style="width: 100%">
				
			</div>
			<div class="content-card">
				<h3><a href="my_data.php">Perfil</a></h3>
			</div>
		</div>
		<br>
	</div>
	<!-- <h2><a href="form_tur.php">Cadastrar turmas</a></h2>
	<h2><a href="form_aln.php">Cadastrar alunos</a></h2>
	<h2><a href="form_prof.php">Cadastrar professores</a></h2>
	<h2><a href="form_dis.php">Cadastrar disciplinas</a></h2>
	<h2><a href="form_adm.php">Cadastrar administradores</a></h2>
	<h2><a href="my_data.php">Perfil</a></h2> -->
	<!-- 	<h3><a href="logout.php">Sair</a></h3> -->
<?php endif ?>
<?php if ($_SESSION['type_id'] == 2): ?>
	<div class="menu-home">
		<div class="card-home">
			<div class="card-img">
			<img src="img/aulas.jpeg" alt="aulas" style="width: 100%">
				
			</div>
			<div class="content-card">
				<h3><a href="my_classes_prof.php">Suas Aulas</a></h3>
			</div>
		</div>
		<br>
		<div class="card-home">
			<div class="card-img">
			<img src="img/perfil.jpg" alt="perfil" style="width: 100%">
				
			</div>
			<div class="content-card">
				<h3><a href="my_data.php">Perfil</a></h3>
			</div>
		</div>
	</div>
	<!-- <h2><a href="">Suas turmas</a></h2>
	<h2><a href="my_classes_prof.php">Suas aulas</a></h2>
	<h2><a href="notificacao.php">Ver notificações</a></h2>
	<h2><a href="my_data.php">Perfil</a></h2>
	<h3><a href="logout.php">Sair</a></h3> -->
<?php endif ?>
<?php if ($_SESSION['type_id'] == 3): ?>
	<div class="menu-home">
		<div class="card-home">
			<div class="card-img">
			<img src="img/aulas.jpeg" alt="aulas" style="width: 100%">
				
			</div>
			<div class="content-card">
				<h3><a href="my_classes_prof.php">Suas Aulas</a></h3>
			</div>
		</div>
		<br>
		<div class="card-home">
			<div class="card-img">
			<img src="img/perfil.jpg" alt="perfil" style="width: 100%">
				
			</div>
			<div class="content-card">
				<h3><a href="my_data.php">Perfil</a></h3>
			</div>
		</div>
	</div>
		<!-- <h2><a href="">Sua turma</a></h2>
		<h2><a href="my_classes_prof.php">Suas aulas</a></h2>
		<h2><a href="">Boletim</a></h2>
		<h2><a href="notificacao.php">Ver notificações</a></h2>
		<h2><a href="my_data.php">Perfil</a></h2>
		<h3><a href="logout.php">Sair</a></h3> -->
	<?php endif ?>
	<br>
	<?php include 'footer.php'; ?>