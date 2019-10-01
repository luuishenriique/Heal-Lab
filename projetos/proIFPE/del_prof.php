<?php
include 'config.php';

$linha = $_GET['linha']; /*get para receber o valor da linha*/
$info = file(PRO_FILE);
unset($info[$linha]);
$str = ""; /*dados vazios que vão limpar a linha*/
foreach ($info as $dados) {
  $str = $str.$dados;
}
$file = fopen(PRO_FILE, "w");
fwrite($file, $str); /*dados sendo transcitos pela linha vazia*/

redicect("cadastro_professores.php?msg=Registro apagado com sucesso!");
?>