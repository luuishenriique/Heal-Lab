<?php 
include 'config.php';

$nome = $_POST['disciplina']. ',' .  $_POST['dia']. ',' . $_POST['horario']. ',' . $_POST['inicio']. ',' . $_POST['termino']. "\n";

if($nome == false){
	redicect("cad_disciplinas.php?msg=Os campos precisam ser preenchidos!");
}

$dados = fopen(DIS_FILE, 'a');
fwrite($dados,$nome);
fclose($dados);

redicect("cad_disciplinas.php?msg=Registro inserido com sucesso!");
?>