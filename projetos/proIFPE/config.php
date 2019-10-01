<?php 
define('PRO_FILE', 'src/professores.csv');
define('DIS_FILE', 'src/disciplinas.csv');

function redicect($url){
	header('Location: ' . $url);
	exit();
}
?>