<?php 
include 'config.php';

$disciplina = $_POST['disciplina'];
$dia = $_POST['dia'];
$turno = $_POST['turno'];
$inicio = $_POST['inicio'];
$termino = $_POST['termino'];


$cont = $_POST['disciplina']. ',' .  $_POST['dia']. ',' . $_POST['turno']. ',' . $_POST['inicio']. ',' . $_POST['termino']. "\n";

if($disciplina == "" || $dia == "" || $turno == "" || $inicio == false || $termino == false){
	redicect("cad_disciplinas.php?msg=Todos os campos precisam ser preenchidos!");
} else {
	$dados = fopen(DIS_FILE, 'a');
	fwrite($dados,$cont);
	fclose($dados);

	redicect("cad_disciplinas.php?msg=Registro inserido com sucesso!");	
}
?>