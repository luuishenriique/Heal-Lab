<?php
include 'config.php';
session_start();
// $siape = $_POST['siape'];
// $nome = $_POST['professor'];
// $email = $_POST['email'];
// $disciplina = $_POST['select-disciplina'];
// $disciplina_dt = trim($disciplina);

// if ($siape == false || $nome == false || $email == false || $disciplina == ""){
// 	redicect("cad_professores.php?msg=Os campos precisam ser preenchidos");
// 	exit();
// }

// $dados = join(",",[$siape,$nome,$disciplina, $email]) . "\n";
// $handle = fopen(PRO_FILE, 'a');
// fwrite($handle,$dados);
// fclose($handle);

// redicect("cad_professores.php?msg=Registro inserido com sucesso!");

$siape = $_POST['siape'] ?? false;
$nome = $_POST['nome_prof'] ?? false;
$iduser = 2;
$iddisc = $_POST['select-disc'] ?? false;

$PDO = dbConnect();

$sql = "INSERT INTO Professores(siape_prof,name_prof,id_user,id_disc) values(:siape,:nome,:iduser,:iddisc)";

$stmt = $PDO->prepare($sql);

$stmt->bindParam(':siape', $siape);
$stmt->bindParam(':nome', $nome);
$stmt->bindParam(':iduser', $iduser);
$stmt->bindParam(':iddisc', $iddisc);

$stmt->execute();

redirect('cad_professores.php');
?>