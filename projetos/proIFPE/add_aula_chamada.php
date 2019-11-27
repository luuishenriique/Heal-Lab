<?php 
require 'config.php';

$qtd_aulas = $_POST['qtd_aulas'];
// $qtd_faltas = $_POST['qtd_faltas'];
$idturma = $_GET['id'];

$PDO = dbConnect();

$sql = "SELECT MAX(id_aula) FROM Aulas";

$stmt = $PDO->prepare($sql);

$stmt->execute();

$linha = $stmt->fetchAll(PDO::FETCH_ASSOC);

$idaula = $linha[0]['MAX(id_aula)'];

echo $idaula;
echo $qtd_aulas;

$PDO = dbConnect();

$sql1 = "SELECT * FROM Alunos WHERE id_turma = :idturma";

$stmt = $PDO->prepare($sql1);

$stmt->bindParam(':idturma', $idturma);

$stmt->execute();

$linhas = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($linhas as $id => $linha) {
	echo $linhas[$id]['id_aluno'];

	$PDO = dbConnect();

	$query = "INSERT INTO Chamadas(qtd_faltas_chamada,id_aula,id_aluno,qtd_aulas_chamada) VALUES(:qtdfalta,:idaula,:idaluno,:qtdaulas)";  

	$stmt = $PDO->prepare($query);

	$stmt->bindParam(':qtdfalta', $_POST['qtd_faltas_' . $linhas[$id]['id_aluno']]);
	$stmt->bindParam(':qtdaulas', $qtd_aulas);
	$stmt->bindParam(':idaluno', $linhas[$id]['id_aluno']);
	$stmt->bindParam(':idaula', $idaula);

	$stmt->execute();

}

redirect('cad_aula.php?id=' . $id_turma);

?>

