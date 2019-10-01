<?php 
define('PRO_FILE', 'src/professores.csv');
define('DIS_FILE', 'src/disciplinas.csv');
define('ALN_FILE', 'src/alunos.csv');

function redicect($url){
	header('Location: ' . $url);
	exit();
}
?>