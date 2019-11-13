<title>proIFPE::Cadastro de Aulas</title>

<?php 
session_start();
include 'header.php';
include 'config.php';

$PDO = dbConnect();

$sql = "SELECT * FROM Aulas WHERE cod_prof = :id";

$stmt = $PDO->prepare($sql);

$stmt->bindParam(':id', $_SESSION['user_id']);

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
<h2>Aulas cadastradas</h2>
<br>
<table>
	<thead>
		<tr>
			<td>Aula</td>
			<td>Data</td>
			<td>Descrição</td>
			<!-- <td></td> -->
		</tr>
	</thead>
	<tbody>
		<?php foreach ($linhas as $id => $linha): ?>
			<tr>
				<td><?= $linhas[$id]['id_aula'] ?></td>
				<td><?= $linhas[$id]['data_aula'] ?></td>
				<td><?= $linhas[$id]['desc_aula'] ?></td>
			</tr>
		<?php endforeach ?>
	</tbody>
</table>
<br>
<h3 style="text-align: center;"><a href="form_aula.php">Adicionar nova aula</a></h3>
<h4 style="text-align: center;"><a href="home.php">Voltar para home</a></h4>
<?php include 'footer.php' ?>