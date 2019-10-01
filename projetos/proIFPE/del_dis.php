<?php
	$linha = $_GET['linha']; /*get para receber o valor da linha*/
	$info = file('src/disciplinas.csv');
	unset($info[$linha]);
	$str = ""; /*dados vazios que vão limpar a linha*/
	foreach ($info as $dados) {
		$str = $str.$dados;
	}
	$file = fopen('src/disciplinas.csv', "w");
	fwrite($file, $str); /*dados sendo transcitos pela linha vazia*/

	header('location:cadastro_disciplinas.php');
?>