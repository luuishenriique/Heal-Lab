<?php 
	$nome = $_POST['professor']. ',' .  $_POST['disciplina']. ',' . $_POST['email']. "\n";
	$dados = fopen('src/professores.csv', 'a');
	fwrite($dados,$nome);

	header('Location: index.php');
 ?>