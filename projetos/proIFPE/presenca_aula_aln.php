<?php 
require 'config.php';
include 'header.php';
session_start();
isLoggedIn();

$id = $_GET['id'];

$PDO = dbConnect();

$sql = "SELECT Aulas.data_aula, Aulas.desc_aula, Chamadas.qtd_aulas_chamada, Chamadas.qtd_faltas_chamada, Chamadas.id_aluno FROM Aulas INNER JOIN Chamadas ON Aulas.id_aula=Chamadas.id_aula AND Chamadas.id_aluno=:idaluno";

$stmt = $PDO->prepare($sql);

$stmt->bindParam(':idaluno', $_SESSION['user_id']);

$stmt->execute();

$linhas = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<title>proIFPE::Presença</title>
<br>
<h1>Registro de aulas</h1>
<br>
<?php if (count($linhas) <= 0): ?>
	<h3 style="background-color: yellow; width: 50%; margin: auto;"><u><strong>Sem aulas registradas!</strong></u></h3>
<?php endif ?>
<br>
<table>
	<thead>
		<tr>
			<th>Data da aula</th>
			<th>Descrição</th>
			<th>Nº de Aulas</th>
			<th>Nº de Faltas</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($linhas as $id => $linha): ?>
			<tr>
				<td><?= $linhas[$id]['data_aula'] ?></td>
				<td><?= $linhas[$id]['desc_aula'] ?></td>
				<td><?= $linhas[$id]['qtd_aulas_chamada'] ?></td>
				<td>
					<?php if ($linhas[$id]['qtd_faltas_chamada'] == 0): ?>
						<?= Presente ?>
						<?php else: ?>
							<?= $linhas[$id]['qtd_faltas_chamada'] . " Faltas" ?>
						<?php endif ?>
					</td>
				</tr>
			<?php endforeach ?>
		</tbody>
	</table>
	<br>
	<?php include 'footer.php'; ?>