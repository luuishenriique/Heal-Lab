<?php 
include 'config.php';

$matricula = $_POST['matricula'] ?? false;
$aluno = $_POST['aluno'] ?? false;
$email = $_POST['email'] ?? false;
$curso = $_POST['curso'] ?? "";
$disciplina = $_POST['disciplina'] ?? "";
$turma = $_POST['turma'] ?? "";

$cont = $_POST['matricula']. ',' .  $_POST['aluno']. ',' . $_POST['email']. ',' . $_POST['curso']. ',' . $_POST['disciplina'] . /*$_POST['turma'] . */"\n";

if ($matricula == false || $aluno == false || $curso == "" || $disciplina == "") {
	redicect("cad_alunos.php?msg=Preencha todos os campos necessários!");
} else {
	$dados = fopen(ALN_FILE, 'a');
	fwrite($dados,$cont);

	redicect("cad_alunos.php?msg=Registro inserido com sucesso!");	
}
?>