<?php 
include 'config.php';

session_start();

// $matricula = $_POST['matricula'] ?? false;
// $aluno = $_POST['aluno'] ?? false;
// $email = $_POST['email'] ?? false;
// $curso = $_POST['curso'] ?? "";
// $disciplina = $_POST['disciplina'] ?? "";
// $turma = $_POST['turma'] ?? "";

// $cont = $_POST['matricula']. ',' .  $_POST['aluno']. ',' . $_POST['email']. ',' . $_POST['curso']. ',' . $_POST['disciplina'] . /*$_POST['turma'] . */"\n";

// if ($matricula == false || $aluno == false || $curso == "" || $disciplina == "") {
// 	redicect("cad_alunos.php?msg=Preencha todos os campos necessários!");
// } else {
// 	$dados = fopen(ALN_FILE, 'a');
// 	fwrite($dados,$cont);

// 	redicect("cad_alunos.php?msg=Registro inserido com sucesso!");	
// }

$matricula = $_POST['matricula'] ?? false;
$nome = $_POST['nome_aln'] ?? false;
$curso = $_POST['select-curso'] ?? false;
$idcurso = 0;
$iduser = 3;

if ($curso == "INFORMÁTICA PARA INTERNET") {
	$idcurso = 1;
}

if ($curso == "LOGÍSTICA") {
	$idcurso = 2;
}

$PDO = dbConnect();

$sql = "INSERT INTO Alunos(mat_aluno,name_aluno,id_user) values(:matricula,:nome,:iduser)";


$stmt = $PDO->prepare($sql);

$matricula = strtoupper($matricula);
$stmt->bindParam(':matricula', $matricula);
$stmt->bindParam(':nome', $nome);
$stmt->bindParam(':iduser', $iduser);

$stmt->execute();

redirect('cad_alunos.php');
?>