<?php
include 'config.php';

$nome = $_POST['professor']. ',' .  $_POST['disciplina']. ',' . $_POST['email']. "\n";
$dados = fopen(PRO_FILE, 'a');
fwrite($dados,$nome);

redicect("cad_professores.php?msg=Registro inserido com sucesso!");
?>