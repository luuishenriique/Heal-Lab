<?php
include 'config.php';

$linha = $_GET['linha']; /*get para receber o valor da linha*/
$info = file(DIS_FILE);
unset($info[$linha]);
$str = ""; /*dados vazios que vão limpar a linha*/
foreach ($info as $dados) {
	$str = $str.$dados;
}
$file = fopen(DIS_FILE, "w");
fwrite($file, $str); /*dados sendo transcitos pela linha vazia*/

redicect("cadastro_disciplinas.php?msg=Registro apagado com sucesso!");
?>