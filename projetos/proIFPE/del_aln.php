<?php 
include 'config.php';

$linha = $_GET['linha']; /*get para receber o valor da linha*/
$info = file(ALN_FILE);
unset($info[$linha]);
$str = ""; /*dados vazios que vão limpar a linha*/
foreach ($info as $dados) {
  $str = $str.$dados;
}
$file = fopen(ALN_FILE, "w");
fwrite($file, $str); /*dados sendo transcitos pela linha vazia*/

redicect("cad_alunos.php?msg=Registro apagado com sucesso!");
?>