<?php 
require 'config.php';
include 'header.php';
session_start();
isLoggedIn();

$typeid = $_SESSION['type_id'];
$id = $_GET['id'];

if ($type_id == 1) {
	dbConnect();

	$sql = "SELECT * FROM Administradores WHERE id_adm = :id";

	$stmt = $PDO->prepare($sql);

	$stmt->bindParam(':id', $id);

	$stmt->execute();

	$linhas = $stmt->fetchAll(PDO::FETCH_ASSOC);
}

if ($type_id == 2) {
	dbConnect();

	$sql = "SELECT * FROM Professores WHERE id_prof = :id";

	$stmt = $PDO->prepare($sql);

	$stmt->bindParam(':id', $id);

	$stmt->execute();

	$linhas = $stmt->fetchAll(PDO::FETCH_ASSOC);
}

if ($type_id == 3) {
	dbConnect();

	$sql = "SELECT * FROM Alunos WHERE id_prof = :id";

	$stmt = $PDO->prepare($sql);

	$stmt->bindParam(':id', $id);

	$stmt->execute();

	$linhas = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>
<title>proIFPE::Seus dados</title>
<br>
<h1>Editando informações</h1>
<br>
<form action="add_mod_data.php" method="POST">
<table>
	<thead>
		<?php if ($_SESSION['type_id'] == 1): ?>
			<th>Login</th>
			<th>Nome completo</th>
			<th>Email de contato</th>
			<th>Tipo de usuário</th>
			<!-- <th>Ações</th> -->
		<?php endif ?>
		<?php if ($_SESSION['type_id'] == 2): ?>
			<th>SIAPE</th>
			<th>Nome completo</th>
			<th>Email de contato</th>
			<th>Tipo de usuário</th>
			<!-- <th>Ações</th> -->
		<?php endif ?>
		<?php if ($_SESSION['type_id'] == 3): ?>
			<th>Matrícula</th>
			<th>Nome completo</th>
			<th>Email de contato</th>
			<th>Tipo de usuário</th>
			<!-- <th>Ações</th> -->
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
				<!-- <td>
					<nav>
						<a href="alt_data.php">Modificar dados</a> 
					</nav>
				</td> -->
			</tr>
			<tr>
				<td><input type="text" name="login" placeholder="Novo login"></td>
				<td><input type="text" name="nome" placeholder="Novo nome"></td>
				<td><input type="text" name="email" placeholder="Novo email"></td>
				<td><?= 'Administrador' ?></td>
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
				<!-- <td>
					<nav>
						<a href="alt_data.php">Modificar dados</a> 
					</nav>
				</td> -->
			</tr>
			<tr>
				<td><?= 'Não alterado' ?></td>
				<td><input type="text" name="nome" placeholder="Novo nome"></td>
				<td><input type="text" name="email" placeholder="Novo email"></td>
				<td><?= 'Professor' ?></td>
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
				<!-- <td>
					<nav>
					<a href="alt_data.php">Modificar dados</a> 
					</nav>
				</td> -->
			</tr>
			<tr>
				<td><?= 'Não alterado' ?></td>
				<td><input type="text" name="nome" placeholder="Novo nome"></td>
				<td><input type="text" name="email" placeholder="Novo email"></td>
				<td><?= 'Aluno' ?></td>
			</tr>
		<?php endforeach ?>	
		<?php endif ?>
	</tbody>
</table>
<br>
<input type="submit" value="Alterar">
</form>
<br>
<!-- <h4 style="text-align: center;"><a href="home.php">Voltar para home</a></h4> -->
<?php include 'footer.php'; ?>