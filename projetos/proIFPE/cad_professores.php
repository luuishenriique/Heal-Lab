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
	// exit();
}

$sql2 = "SELECT * FROM Disciplinas";

$stmt = $PDO->prepare($sql2);

$stmt->execute();

$linhas2 = $stmt->fetchAll(PDO::FETCH_ASSOC);
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
			<!-- <th>Disciplina</th> -->
			<th>Ações</th>
		</tr>
	</thead>
	<tbody>
		
	</tbody>
	<?php foreach ($linhas as $id => $linha): ?>
		<tr>
			<td><?= $linhas[$id]['siape_prof'] ?></td>
			<td><?= $linhas[$id]['name_prof'] ?></td>
			<?php if (is_null($linhas[$id]['email_prof'])): ?>
				<td style="background-color: yellow; width: 50%; margin: auto;">
					<?= "Aguardando validação de usuário" ?>
				</td>
				<?php else: ?>
					<td>
						<?= $linhas[$id]['email_prof'] ?>
					</td>
				<?php endif ?>
<!-- 				<?php if (is_null($linhas[$id]['id_disc'])): ?>
					<td style="background-color: yellow; width: 50%; margin: auto;">
						<?= "Sem disciplina" ?>
					</td>
					<?php else: ?>
						<td>
							<?= $linhas2[$id]['name_disc'] ?>
						</td>
					<?php endif ?> -->
					<td>
						<nav style="font-size: 18px;">
							<a href="mod_prof_data.php?id=<?=$linhas[$id]['id_prof']?>"><i class="fas fa-pen-square"></i></a> | 
							<a href="del_prof_data.php?id=<?=$linhas[$id]['id_prof']?>"><i class="fas fa-trash"></a>
						</nav>
					</td>
				</tr>
			<?php endforeach ?>
		</table>
		<br>
		<!-- <h3 style="text-align: center;"><a href="form_prof.php">Adicionar novo professor</a></h3> -->
		<!-- <h4 style="text-align: center;"><a href="home.php">Voltar para home</a></h4> -->
		<?php include 'footer.php' ?>