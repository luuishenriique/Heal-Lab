<?php
include 'config.php';

// $nturma = $_POST['nturma'] ?? false;
// $curso = $_POST['curso'] ?? false;
// $alunos = $_POST['alunos'] ?? false;
// $cadeira = $_POST['select-cadeira'] ?? "";
// $prof = $_POST['select-professor'] ?? "";


// if ($nturma == false || $curso == false || $alunos == false || $cadeira == "" || $prof == ""){
// 	redicect("cad_turmas.php?msg=Os campos precisam ser preenchidos");
// 	exit();
// }

// $dados = join(",",[$nturma,$curso,$alunos,$cadeira/*,$prof*/]) . "\n";
// $handle = fopen(TUR_FILE, 'a');
// fwrite($handle,$dados);
// fclose($handle);

// redicect("cad_turmas.php?msg=Registro inserido com sucesso!");

$nome = $_POST['nome'] ?? false;
$curso = $_POST['select-curso'] ?? false;
$capacidade = $_POST['capacidade'] ?? false;
$turno = $_POST['select-turno'] ?? false;

$PDO = dbConnect();

$sql = "INSERT INTO Turmas(nome_turma,id_curso,capacidade_turma,turno_turma) values(:nome,:curso,:capacidade,:turno)";

$stmt = $PDO->prepare($sql);

$stmt->bindParam(':nome', $nome);
$stmt->bindParam(':curso', $curso);
$stmt->bindParam(':capacidade', $capacidade);
$stmt->bindParam(':turno', $turno);

$stmt->execute();

session_start();
$_SESSION['turma'] = $nome;
$_SESSION['curso-turma'] = $curso;
$_SESSION['capacidade-turma'] = $capacidade;

redirect('cad_turmas.php');
?>