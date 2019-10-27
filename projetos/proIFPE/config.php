<?php 
require 'db_init.php';

if (!defined('DB_HOST')) define('DB_HOST', $db_localhost);
if (!defined('DB_USER')) define('DB_USER', $db_user);
if (!defined('DB_PASS')) define('DB_PASS', $db_password);
if (!defined('DB_NAME')) define('DB_NAME', $db_name);
if (!defined('DB_PORT')) define('DB_PORT', $db_port);
if (!defined('ADM_SENHA')) define('ADM_SENHA', $senha_adm);

if(!defined('PRO_FILE')) define('PRO_FILE', 'src/professores.csv');
if(!defined('DIS_FILE')) define('DIS_FILE', 'src/disciplinas.csv');
if(!defined('ALN_FILE')) define('ALN_FILE', 'src/alunos.csv');
if(!defined('NOT_FILE')) define('NOT_FILE', 'src/notificacao.csv');
if(!defined('TUR_FILE')) define('TUR_FILE', 'src/turmas.csv');
if(!defined('CDR_FILE')) define('CDR_FILE', 'src/cadeiras.csv');
if(!defined('CUR_FILE')) define('CUR_FILE', 'src/cursos.csv');


require_once 'functions.php';
?>