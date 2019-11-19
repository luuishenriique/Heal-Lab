<title>proIFPE::Cadastro de Alunos</title>

<?php 
include 'header.php';
include 'config.php';
session_start();

$PDO = dbConnect();

$sql = "SELECT * FROM Alunos";

$stmt = $PDO->prepare($sql);

$stmt->execute();

$linhas = $stmt->fetchAll(PDO::FETCH_ASSOC);
// var_dump($linhas);

// if (count($linhas) <= 0) {
// 	redirect('login.php');
// 	echo 'Achei nada!';
// 	exit();
// }
?>

<?php if (!empty($_GET['msg'])): ?>
	<div class="msg_info">
		<h3><?= $_GET['msg'] ?></h3>
	</div>
<?php endif ?>

<br>
<h2>Alunos cadastrados</h2>
<br>
<table>
	<thead>
		<tr>
			<th>Matrícula</th>
			<th>Nome do Aluno</th>
			<th>Curso</th>
			<th>Email de contato</th>
<!-- 			<th>Curso</th>
			<th>Turma</th> -->
			<th>Ãções</th>
		</tr>	
	</thead>
	<tbody>
		<?php foreach ($linhas as $id => $linha): ?>
			<tr>
				<td><?= $linhas[$id]['mat_aluno'] ?></td>
				<td><?= $linhas[$id]['name_aluno'] ?></td>
				<td>
					<?php if ($linhas[$id]['id_curso'] == 1): ?>
						<?= "INFORMÁTICA PARA INTERNET" ?>
					<?php endif ?>
					<?php if ($linhas[$id]['id_curso'] == 2): ?>
						<?= "LOGÍSTICA" ?>
					<?php endif ?>
				</td>
				<?php if (is_null($linhas[$id]['email_aluno'])): ?>
					<td style="background-color: yellow; width: 50%; margin: auto;">
					<?= "Aguardando validação de usuário" ?>
					</td>
					<?php else: ?>
						<td>
						<?= $linhas[$id]['email_aluno'] ?>
						</td>
					<?php endif ?>
					<td>
						<nav>
							<a href="">&#133;</a> |
							<a href="">&times;</a>
						</nav>
					</td>
				</tr>
			<?php endforeach ?>
		</tbody>
	</table>
	<br>
	<h3 style="text-align: center;"><a href="form_aln.php">Adicionar novo aluno</a></h3>
	<h4 style="text-align: center;"><a href="home.php">Voltar para home</a></h4>
	<?php include 'footer.php' ?>

