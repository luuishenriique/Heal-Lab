<?php 
include 'config.php';

$disciplina = $_POST['disciplina'];
$dia = $_POST['dia'];
$turno = $_POST['turno'];
$inicio = $_POST['inicio'];
$termino = $_POST['termino'];
$turma = $_POST['select-turma'];
$turma_dt = trim($turma);

//$cont = $_POST['disciplina']. ',' .  $_POST['dia']. ',' . $_POST['turno']. ',' . $_POST['inicio']. ',' . $_POST['termino']. "\n";//

if($disciplina == false || $dia == false || $turno == false || $inicio == false || $termino == false || $turma == false){
	redicect("cad_disciplinas.php?msg=Todos os campos precisam ser preenchidos!");
} 
$dados = join(",",[$disciplina,$dia,$turno,$inicio,$termino,$turma_dt])
	$handle = fopen(DIS_FILE, 'a');
	fwrite($handle,$dados);
	fclose($handle);

	redicect("cad_disciplinas.php?msg=Registro inserido com sucesso!");	
}
?>