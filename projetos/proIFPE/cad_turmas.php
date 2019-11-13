<title>proIFPE::Cadastro de Turmas</title>

<?php 
session_start();
include 'header.php';
include 'config.php';

// $dado = file(DIS_FILE);

// $dados_cdr = file(CDR_FILE);

// $dados_prof = file(PRO_FILE);

// $dados_curso = file(CUR_FILE);

// $dados = file(TUR_FILE); /*recebendo arquivos da tabela csv*/
// $turma = [];

// for ($i=0; $i < sizeof($dados); $i++) { 
// 	$dados[$i] = explode(',', $dados[$i]);
// }


$PDO = dbConnect();

$sql = "SELECT * FROM Turmas";

$stmt = $PDO->prepare($sql);

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
<h2>Turmas cadastradas</h2>
<br>
<table>
	<thead>
		<tr>
			<th>Nome da turma</th>
			<th>Curso</th>
			<th>Capacidade de alunos</th>
			<th>Turno</th>
			<!-- <th>Ações</th> -->
		</tr>
	</thead>
	<tbody>
		<?php foreach ($linhas as $id => $linha): ?>
			<tr>
				<td><?= $linhas[$id]['nome_turma'] ?></td>
				<td>
					<?php if ($linhas[$id]['id_curso'] == 1): ?>
						<?= "INFORMÁTICA PARA INTERNET" ?>
					<?php endif ?>
					<?php if ($linhas[$id]['id_curso'] == 2): ?>
						<?= "LOGÍSTICA" ?>
					<?php endif ?>					
				</td>
				<td><?= $linhas[$id]['capacidade_turma'] ?></td>
				<td><?= $linhas[$id]['turno_turma'] ?></td>
			</tr>
		<?php endforeach ?>
	</tbody>
</table>
<br>
<h3 style="text-align: center;"><a href="form_tur.php">Adicionar nova turma</a></h3>
<h4 style="text-align: center;"><a href="home.php">Voltar para home</a></h4>
<?php include 'footer.php' ?>