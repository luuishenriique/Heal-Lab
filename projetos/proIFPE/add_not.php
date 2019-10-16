<?php
include 'config.php';

$nome = $_POST['nome'];

if($nome == false){
	redicect("notificacao.php?msg=O campo precisa ser preenchido");
}

$dados = join(",", [$nome]) . "\n";
$handle = fopen(NOT_FILE, 'a');
fwrite($handle, $dados);
fclose($handle);

redicect("notificacao.php?msg= Notificação adicionda!");

  ?>