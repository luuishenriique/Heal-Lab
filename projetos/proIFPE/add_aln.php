<?php 
include 'config.php';

$nome = $_POST['aluno']. ',' .  $_POST['matricula']. ',' . $_POST['curso']. ',' . $_POST['data']. "\n";
$dados = fopen(ALN_FILE, 'a');
fwrite($dados,$nome);

redicect("cad_alunos.php?msg=Registro inserido com sucesso!");
?>