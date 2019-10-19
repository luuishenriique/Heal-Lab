<?php
include 'config.php';

$nturma = $_POST['nturma'];
$curso = $_POST['curso'];
$alunos = $_POST['alunos'];
$email = $_POST['email'];


if ($nturma == false || $curso == false || $alunos == false || $email == false){
	redicect("cad_turmas.php?msg=Os campos precisam ser preenchidos");
	exit();
}

$dados = join(",",[$nturma,$curso,$alunos,$email]) . "\n";
$handle = fopen(TUR_FILE, 'a');
fwrite($handle,$dados);
fclose($handle);

redicect("cad_turmas.php?msg=Registro inserido com sucesso!");
?>