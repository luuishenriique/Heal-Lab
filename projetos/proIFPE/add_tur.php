<?php
include 'config.php';

$nturma = $_POST['nturma'] ?? false;
$curso = $_POST['curso'] ?? false;
$alunos = $_POST['alunos'] ?? false;
$cadeira = $_POST['select-cadeira'] ?? "";
$prof = $_POST['select-professor'] ?? "";


if ($nturma == false || $curso == false || $alunos == false || $cadeira == "" || $prof == ""){
	redicect("cad_turmas.php?msg=Os campos precisam ser preenchidos");
	exit();
}

$dados = join(",",[$nturma,$curso,$alunos,$cadeira/*,$prof*/]) . "\n";
$handle = fopen(TUR_FILE, 'a');
fwrite($handle,$dados);
fclose($handle);

redicect("cad_turmas.php?msg=Registro inserido com sucesso!");
?>