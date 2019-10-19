<?php 
define('PRO_FILE', 'src/professores.csv');
define('DIS_FILE', 'src/disciplinas.csv');
define('ALN_FILE', 'src/alunos.csv');
define('NOT_FILE', 'src/notificacao.csv');
define('TUR_FILE', 'src/turmas.csv');


function redicect($url){
	header('Location: ' . $url);
	exit();
}
?>