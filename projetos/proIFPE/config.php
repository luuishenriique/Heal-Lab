<?php 
define('PRO_FILE', 'src/professores.csv');
define('DIS_FILE', 'src/disciplinas.csv');
define('ALN_FILE', 'src/alunos.csv');
define('NOT_FILE', 'src/notificacao.csv');
define('TUR_FILE', 'src/turmas.csv');
define('CDR_FILE', 'src/cadeiras.csv');
define('CUR_FILE', 'src/cursos.csv');


function redicect($url){
	header('Location: ' . $url);
	exit();
}
?>