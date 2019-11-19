<?php 
include 'config.php';
session_start();
// $disciplina = $_POST['disciplina'];
// $dia = $_POST['dia'];
// $turno = $_POST['turno'];
// $inicio = $_POST['inicio'];
// $termino = $_POST['termino'];
// $turma = $_POST['select-turma'];
// $turma_dt = trim($turma);

// //$cont = $_POST['disciplina']. ',' .  $_POST['dia']. ',' . $_POST['turno']. ',' . $_POST['inicio']. ',' . $_POST['termino']. "\n";//

// if($disciplina == false || $dia == false || $turno == false || $inicio == false || $termino == false || $turma == false){
// 	redicect("cad_disciplinas.php?msg=Todos os campos precisam ser preenchidos!");
// } 
// 	$dados = join(",", [$disciplina,$dia,$turno,$inicio,$termino,$turma_dt]) . "\n";
// 	$handle = fopen(DIS_FILE, 'a');
// 	fwrite($handle,$dados);
// 	fclose($handle);

// 	redicect("cad_disciplinas.php?msg=Registro inserido com sucesso!");	

$nome = $_POST['nome_disc'] ?? false;
$descricao = $_POST['desc_disc'] ?? false;
$curso = $_POST['select-curso'] ?? false;

$PDO = dbConnect();

$sql = "INSERT INTO Disciplinas(name_disc,desc_disc,id_curso) values(:nome,:descricao,:idcurso)";

$stmt = $PDO->prepare($sql);

$stmt->bindParam(':nome', $nome);
$stmt->bindParam(':descricao', $descricao);
$stmt->bindParam(':idcurso', $curso);

$stmt->execute();

redirect('cad_disciplinas.php');
?>