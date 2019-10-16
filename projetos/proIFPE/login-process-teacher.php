<?php

require 'config.php';

$nome = trim($_POST['nome']);
$email = trim($_POST['email']);

if (!strlen($nome) || !strlen($email)) {
    die('Preencha os campos');
}

$success = false;

$handle = fopen("src/professores.csv", "r");

while (($data = fgetcsv($handle)) == TRUE) {

    if ($data[0] == $nome && $data[2] == $email) {
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