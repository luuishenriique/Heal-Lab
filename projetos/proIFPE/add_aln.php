<?php 
include 'config.php';

$matricula = $_POST['matricula'];
$aluno = $_POST['aluno'];
$email = $_POST['email'];
$curso = $_POST['curso'];
$disciplina = $_POST['disciplina'];

$cont = $_POST['matricula']. ',' .  $_POST['aluno']. ',' . $_POST['email']. ',' . $_POST['curso']. ',' . $_POST['disciplina']. "\n";

if ($matricula == false || $aluno == false || $curso == "" || $disciplina == "") {
	redicect("cad_alunos.php?msg=Preencha todos os campos necessários!");
} else {
	$dados = fopen(ALN_FILE, 'a');
	fwrite($dados,$cont);

	redicect("cad_alunos.php?msg=Registro inserido com sucesso!");	
}
?>