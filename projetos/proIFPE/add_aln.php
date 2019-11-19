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
$matricula = strtoupper($matricula); /*convertendo para maiúsculo*/
$nome = $_POST['nome_aln'] ?? false;
$nome = strtoupper($nome); /*convertendo para maiúsculo*/
// $curso = $_POST['select-curso'] ?? false;
$iduser = 3; /*usuário tipo aluno*/
$findINF = "INF";
$findLOG = "LOG";
$checkINF = checkString($findINF, $matricula);
$checkLOG = checkString($findLOG, $matricula);
$idcurso = 0;
// $data = date("d.m.Y");                      

// if ($curso == "INFORMÁTICA PARA INTERNET") {
// 	$idcurso = 1;
// }

// if ($curso == "LOGÍSTICA") {
// 	$idcurso = 2;
// }

if ($checkINF === true) {
	$idcurso = 1;
	// echo 'Informática';
	// exit();
}

if ($checkLOG === true) {
	$idcurso = 2;
	// echo 'Logística';
	// exit();
}

if (checkINF === false && checkLOG === false) {
	redirect('form_aln.php?msg=Matrícula não aceita');
	exit();
}

$PDO = dbConnect();

$sql = "INSERT INTO Alunos(mat_aluno,name_aluno,id_user,id_curso) VALUES(:matricula,:nome,:iduser,:idcurso)";


$stmt = $PDO->prepare($sql);

$stmt->bindParam(':matricula', $matricula);
$stmt->bindParam(':nome', $nome);
$stmt->bindParam(':iduser', $iduser);
$stmt->bindParam(':idcurso', $idcurso);

$stmt->execute();

redirect('cad_alunos.php');
?>