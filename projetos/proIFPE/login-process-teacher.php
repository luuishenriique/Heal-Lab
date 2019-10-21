<?php

require 'config.php';

$siape = trim($_POST['siape']);
$senha = trim($_POST['senha']);

if (!strlen($siape) || !strlen($senha)) {
    die('Preencha os campos');
}

$success = false;

$handle = fopen("src/professores.csv", "r");

while (($data = fgetcsv($handle)) == TRUE) {

    if ($data[0] == $siape && $data[2] == $senha) {
        $success = true;
        break;
    }
}

fclose($handle);

if ($success) {
    header('location:cad_disciplinas.php');
} else {
    header('location:login_teacher.php');
}