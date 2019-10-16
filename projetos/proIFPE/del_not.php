<?php
include 'config.php';

$linha = $_GET['linha'];
$info = file(NOT_FILE);
unset($info[$linha]);
$str = "";
foreach ($info as $dados) {
	$str = $str.$dados;
}
$file = fopen(NOT_FILE, "w");
fwrite($file, $str);

redicect("notificacao.php?msg=Notificação apagada com sucesso");
?>