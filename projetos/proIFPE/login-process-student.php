<?php

require 'config.php';

$matricula = trim($_POST['matricula']);
$senha = trim($_POST['senha']);

if (!strlen($senha) || !strlen($matricula)) {
    die('Preencha os campos');
}

$success = false;

$handle = fopen("src/alunos.csv", "r");

while (($data = fgetcsv($handle)) == TRUE) {

    if ($data[1] == $senha && $data[0] == $matricula) { /*inserir senha para aluno!*/
        $success = true;
        break;
    }
}

fclose($handle);

if ($success) {
    header('location:cad_alunos.php');
} else {
    header('location:login_student.php');
}