<?php 
include 'config.php';

$nome = $_POST['disciplina']. ',' .  $_POST['dia']. ',' . $_POST['horario']. ',' . $_POST['turno']. ',' . $_POST['inicio']. ',' . $_POST['termino']. "\n";
$dados = fopen(DIS_FILE, 'a');
fwrite($dados,$nome);

redicect("cad_disciplinas.php?msg=Registro inserido com sucesso!");
?>