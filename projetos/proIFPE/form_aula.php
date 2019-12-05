<?php 
require 'config.php';
include 'header.php';
session_start();

$idturma = $_GET['id'];
$hoje = date("Y/m/d");

$PDO = dbConnect();

$sql = "SELECT * FROM Cursos";

$stmt = $PDO->prepare($sql);

$stmt->execute();	

$linhas = $stmt->fetchAll(PDO::FETCH_ASSOC);
// var_dump($linhas);

// if (count($linhas) <= 0) {
// 	redirect('form_tur.php');
// 	// echo 'Achei nada!';
// 	exit();
// }

?>
<title>proIFPE::Adicionando Aula</title>
<br>
<h1>Adicionando aula</h1>
<h3><a href="cad_aulas?id=<?= $idturma ?>.php">Ver Aulas</a></h3>
<br>
<form class="form_info" action="add_aula.php?id=<?= $idturma ?>" method="POST">
	<fieldset>
		<legend>Dados da aula</legend>
		<Label>Data da aula: <?= $hoje ?></Label>
		<!-- <input type="date" name="data" required> -->
		<br>
		<br>
		<Label>Descrição da aula:</Label>
		<!-- <input type="text" name="descricao" placeholder="Ex: Aula 01 - Aprendendo HTML" required> -->
		<textarea name="descricao" placeholder="Informações sobre à aula" required rows="5" cols="33"></textarea>
		<br>
		<input type="submit" value="Adicionar">
	</fieldset>
</form>
<br>
<br>
<!-- <h4 style="text-align: center;"><a href="cad_aula.php">Voltar para aulas</a></h4> -->
<br>
<?php include 'footer.php'; ?>