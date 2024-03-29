<title>proIFPE::Cadastro de Aulas</title>
<?php 
session_start();
include 'header.php';
include 'config.php';

$idprof = $_SESSION['user_id'];
$idturma = $_GET['id'];

$PDO = dbConnect();

$sql = "SELECT * FROM Aulas WHERE id_prof = :idprof AND id_turma = :idturma";

$stmt = $PDO->prepare($sql);

$stmt->bindParam(':idprof', $idprof);
$stmt->bindParam(':idturma', $idturma);

$stmt->execute();

$linhas = $stmt->fetchAll(PDO::FETCH_ASSOC);
// var_dump($linhas);

if (count($linhas) <= 0) {
  // redirect('cad_disciplinas.php');
	// echo 'Info::Achei nada!';
	// exit();
}

?>
<?php if (!empty($_GET['msg'])): ?>
	<div class="msg_info">
		<h3><?= $_GET['msg'] ?></h3>
	</div>
<?php endif ?>
<br>
<h3 style="text-align: center;"><a href="form_aula.php?id=<?= $idturma ?>">Adicionar nova aula</a></h3>
<br>
<h2>Aulas cadastradas para turma</h2>
<br>
<table>
	<thead>
		<tr>
			<!-- <th>Aula</th> -->
			<th>Data</th>
			<th>Descrição</th>
			<th>Ações</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($linhas as $id => $linha): ?>
			<tr>
				<!-- <td><?= $linhas[$id]['id_aula'] ?></td> -->
				<td><?= $linhas[$id]['data_aula'] ?></td>
				<td><?= $linhas[$id]['desc_aula'] ?></td>
				<td>
					<nav style="font-size: 18px;">
						<a href="mod_chamada.php?id=<?= $linhas[$id]['id_aula'] ?>"><i class="fas fa-tasks"></i></a> |
						<a href="mod_aula.php?id=<?= $linhas[$id]['id_aula'] ?>"><i class="fas fa-pen-square"></i></a> | 
						<a href="del_aula.php?id=<?= $linhas[$id]['id_aula'] ?>"><i class="fas fa-trash"></i></a>
					</nav>
				</td>
			</tr>
		<?php endforeach ?>
	</tbody>
</table>
<br>
<!-- <h3 style="text-align: center;"><a href="alunos_aula.php?id=<?= $idturma ?>">Ver alunos</a></h3> -->
<!-- <h4 style="text-align: center;"><a href="home.php">Voltar para home</a></h4> -->
<?php include 'footer.php' ?>