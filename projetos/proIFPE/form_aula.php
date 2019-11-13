<?php 
require 'config.php';
include 'header.php';
session_start();

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
<br>
<form class="form_info" action="add_aula.php" method="POST">
	<fieldset>
		<legend>Dados da aula</legend>
		<Label>Data da aula:</Label>
		<input type="date" name="data" required>
		<br>
		<br>
		<Label>Descrição da aula:</Label>
		<input type="text" name="descricao" placeholder="Ex: Aula 01 - Aprendendo HTML" required>
		<br>
		<input type="submit" value="Adicionar">
	</fieldset>
</form>
<br>
<br>
<h4 style="text-align: center;"><a href="cad_aula.php">Voltar para aulas</a></h4>
<br>
<?php include 'footer.php'; ?>