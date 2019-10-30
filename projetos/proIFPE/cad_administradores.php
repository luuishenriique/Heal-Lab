<title>proIFPE::Cadastro de Administradores</title>

<?php 
include 'header.php';
include 'config.php';
?>

<?php
session_start();

$PDO = dbConnect();

$sql = "SELECT * FROM Administradores";

$stmt = $PDO->prepare($sql);

$stmt->execute();

$linhas = $stmt->fetchAll(PDO::FETCH_ASSOC);
// var_dump($linhas);

if (count($linhas) <= 0) {
  // redirect('cad_administradores.php');
	echo 'Info::Achei nada!';
	exit();
}
?>
<br>
<h2>Administradores cadastrados</h2>
<br>
<table>
	<thead>
		<tr>
			<th>Código</th>
			<th>Nome do administrador</th>
			<th>Login</th>
			<th>Email de contato</th>
			<th>Nível de acesso</th>
			<th>Ações</th>
		</tr>
	</thead>
	<tbody>
		
	</tbody>
	<?php foreach ($linhas as $id => $linha): ?>
		<tr>
			<td><?= $linhas[$id]['id_adm'] ?></td>
			<td><?= $linhas[$id]['name_adm'] ?></td>
			<td><?= $linhas[$id]['login_adm'] ?></td>
			<?php if (is_null($linhas[$id]['email_adm'])): ?>
				<td style="background-color: yellow; width: 50%; margin: auto;">
					<?= "Aguardando validação de usuário" ?>
				</td>
				<?php else: ?>
					<td>
						<?= $linhas[$id]['email_adm'] ?>
					</td>
				<?php endif ?>
				<td><?= $linhas[$id]['id_user'] ?></td>
				<td>
					<nav>
						<a href="">&#133;</a> |
						<a href="">&times;</a>
					</nav>
				</td>
			</tr>
		<?php endforeach ?>
	</table>
	<br>
	<h3 style="text-align: center;"><a href="form_adm.php">Adicionar novo administrador</a></h3>
	<h4 style="text-align: center;"><a href="home.php">Voltar para home</a></h4>
	<?php include 'footer.php' ?>