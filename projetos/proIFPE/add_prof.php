<?php
include 'config.php';

$siape = $_POST['siape'];
$nome = $_POST['professor'];
$disciplina = $_POST['disc-prof']; 
$email = $_POST['email'];

if ($siape == false || $nome == false || $email == false || $disciplina == ""){
	redicect("cad_professores.php?msg=Os campos precisam ser preenchidos");
	exit();
}

$dados = join(",",[$siape,$nome,$disciplina, $email]) . "\n";
$handle = fopen(PRO_FILE, 'a');
fwrite($handle,$dados);
fclose($handle);

redicect("cad_professores.php?msg=Registro inserido com sucesso!");
?>