<?php
include 'config.php';

$nome = $_POST['professor'];
$disciplina = $_POST['select-dis']; 
$email = $_POST['email'];

if ($nome == false || $email == false){
	redicect("cad_professores.php?msg=Os campos precisam ser preenchidos");
}

$dados = join(",",[$nome,$disciplina,$email]) . "\n";
$handle = fopen(PRO_FILE, 'a');
fwrite($handle,$dados);
fclose($handle);

redicect("cad_professores.php?msg=Registro inserido com sucesso!");
?>