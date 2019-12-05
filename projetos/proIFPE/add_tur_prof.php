<?php 
require 'config.php';
include 'header.php'; 

$PDO = dbConnect();

$sql = "SELECT * FROM Professores";

$stmt = $PDO->prepare($sql);

$stmt->execute();

$linhas = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<title>proIFPE::Selecionar Professores</title>
<h1>Selecionar professores para turma</h1>
<br>
<table>
	<thead>
		<td>
			<th>Professor</th>
			<th>Ações</th>
		</td>
	</thead>
	<tbody>
		<?php foreach ($linhas as $id => $linha): ?>
			<tr>
				<td><?= $linhas[$id]['name_prof'] ?></td>
				<td></td>
			</tr>
		<?php endforeach ?>
	</tbody>
</table>