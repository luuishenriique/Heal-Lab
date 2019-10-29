<title>proIFPE::Cadastro de Professores</title>

<?php 
include 'header.php';
include 'config.php';
?>

<?php

// $dado = file(DIS_FILE);

// $dados = file(PRO_FILE);

// $professor = [];

// for ($i=0; $i < sizeof($dados); $i++) { 
// 	$dados[$i] = explode(',', $dados[$i]);
// }

session_start();

$PDO = dbConnect();

$sql = "SELECT * FROM Professores";

$stmt = $PDO->prepare($sql);

$stmt->execute();

$linhas = $stmt->fetchAll(PDO::FETCH_ASSOC);
// var_dump($linhas);

if (count($linhas) <= 0) {
  // redirect('cad_disciplinas.php');
	echo 'Info::Achei nada!';
	exit();
}
?>
<br>
<h2>Professores cadastrados</h2>
<br>
<table>
	<thead>
		<tr>
			<th>SIAPE</th>
			<th>Nome do professor</th>
			<th>Email de contato</th>
			<th>Nível de acesso</th>
			<th>Ações</th>
		</tr>
	</thead>
	<tbody>
		
	</tbody>
	<?php foreach ($linhas as $id => $linha): ?>
		<tr>
			<td><?= $linhas[$id]['siape_prof'] ?></td>
			<td><?= $linhas[$id]['name_prof'] ?></td>
			<td><?= $linhas[$id]['email_prof'] ?></td>
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
<h4 style="text-align: center;"><a href="home.php">Voltar para home</a></h4>
<?php include 'footer.php' ?>