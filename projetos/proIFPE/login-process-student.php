<?php

require 'config.php';

$nome = trim($_POST['nome']);
$matricula = trim($_POST['matricula']);

if (!strlen($nome) || !strlen($matricula)) {
    die('Preencha os campos');
}

$success = false;

$handle = fopen("src/alunos.csv", "r");

while (($data = fgetcsv($handle)) == TRUE) {

    if ($data[0] == $nome && $data[1] == $matricula) {
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