<?php 
session_start();
include 'header.php';
isLoggedIn();
$tipo = $_SESSION['type_id'] ?? 0;
require 'config.php';

$PDO = dbConnect();

if ($_SESSION['type_id'] == 1) {
	$sql = "SELECT * FROM Administradores WHERE id_adm = :id";

	$stmt = $PDO->prepare($sql);

	$stmt->bindParam(':id', $_SESSION['user_id']);

	$stmt->execute();

	$linhas = $stmt->fetchAll(PDO::FETCH_ASSOC);
	// var_dump($linhas);
}

if ($_SESSION['type_id'] == 2) {
	$sql = "SELECT * FROM Professores WHERE id_prof = :id";

	$stmt = $PDO->prepare($sql);

	$stmt->bindParam(':id', $_SESSION['user_id']);

	$stmt->execute();

	$linhas = $stmt->fetchAll(PDO::FETCH_ASSOC);
	// var_dump($linhas);
}

if ($_SESSION['type_id'] == 3) {
	$sql = "SELECT * FROM Alunos WHERE id_aluno = :id";

	$stmt = $PDO->prepare($sql);

	$stmt->bindParam(':id', $_SESSION['user_id']);

	$stmt->execute();

	$linhas = $stmt->fetchAll(PDO::FETCH_ASSOC);
	// var_dump($linhas);
}
?>
<title>proIFPE::Seus dados</title>
<br>
<h1>Suas informações</h1>
<br>
<table>
	<thead>
		<?php if ($_SESSION['type_id'] == 1): ?>
			<th>Login</th>
			<th>Nome completo</th>
			<th>Email de contato</th>
			<th>Tipo de usuário</th>
			<th>Ações</th>
		<?php endif ?>
		<?php if ($_SESSION['type_id'] == 2): ?>
			<th>SIAPE</th>
			<th>Nome completo</th>
			<th>Email de contato</th>
			<th>Tipo de usuário</th>
			<th>Ações</th>
		<?php endif ?>
		<?php if ($_SESSION['type_id'] == 3): ?>
			<th>Matrícula</th>
			<th>Nome completo</th>
			<th>Email de contato</th>
			<th>Tipo de usuário</th>
			<th>Ações</th>
		<?php endif ?>
	</thead>
	<tbody>
		<?php if ($_SESSION['type_id'] == 1): ?>
		<?php foreach ($linhas as $id => $linha): ?>
			<tr>
				<td><?= $linhas[$id]['login_adm'] ?></td>
				<td><?= $linhas[$id]['name_adm'] ?></td>
				<td><?= $linhas[$id]['email_adm'] ?></td>
				<td><?= 'Administrador' ?></td>
				<td>
					<nav>
						<a href="alt_data.php"><i class="fas fa-user-edit"></i></a> 
					</nav>
				</td>
			</tr>
		<?php endforeach ?>	
		<?php endif ?>
		<?php if ($_SESSION['type_id'] == 2): ?>
		<?php foreach ($linhas as $id => $linha): ?>
			<tr>
				<td><?= $linhas[$id]['siape_prof'] ?></td>
				<td><?= $linhas[$id]['name_prof'] ?></td>
				<td><?= $linhas[$id]['email_prof'] ?></td>
				<td><?= 'Professor' ?></td>
				<td>
					<nav>
						<a href="alt_data.php"><i class="fas fa-user-edit"></i></a> 
					</nav>
				</td>
			</tr>
		<?php endforeach ?>	
		<?php endif ?>
		<?php if ($_SESSION['type_id'] == 3): ?>
		<?php foreach ($linhas as $id => $linha): ?>
			<tr>
				<td><?= $linhas[$id]['mat_aluno'] ?></td>
				<td><?= $linhas[$id]['name_aluno'] ?></td>
				<td><?= $linhas[$id]['email_aluno'] ?></td>
				<td><?= 'Aluno' ?></td>
				<td>
					<nav>
					<a href="alt_data.php"><i class="fas fa-user-edit"></i></a> 
					</nav>
				</td>
			</tr>
		<?php endforeach ?>	
		<?php endif ?>
	</tbody>
</table>
<br>
<!-- <h4 style="text-align: center;"><a href="home.php">Voltar para home</a></h4> -->   
<?php include 'footer.php'; ?>