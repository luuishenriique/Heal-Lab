<?php 
require 'config.php';

$dados = $_POST['user_data'] ?? false;
$email = $_POST['email'] ?? false;
$senha = $_POST['senha'] ?? false;
$conf_senha = $_POST['conf_senha'] ?? false;
// $keyword = $_POST['keyword'] ?? false;
// $vkeyword = $_POST['vkeyword'] ?? false;
$findINF = "inf";
$findLOG = "log";
$checkINF = checkString($findINF, $matricula);
$checkLOG = checkString($findLOG, $matricula);

// echo $dados;
// echo $email; 

if ($checkINF === true) {
	$dados = strtoupper($dados);
}

if ($checkLOG === true) {
	$dados = strtoupper($dados);
}

if ($senha !== $conf_senha) {
	redirect('att_nuser.php?msg=Senhas não são iguais!');
	exit();
} else {
	$bau_senha = $senha;
	$senha = cryptPass($senha);
	// echo $senha;
}

// if ($vkeyword !== $keyword) {
// 	redirect('att_nuser.php?msg=Palavra-chave incorreta!');
// 	exit();
// }

if (strlen($dados) < 7) {

	// echo 'ADMNISTRADOR';	

	$PDO = dbConnect();

	$sql = "SELECT login_adm FROM Administradores WHERE login_adm = :login";

	$stmt = $PDO->prepare($sql);

	$stmt->bindParam(':login', $dados);

	$stmt->execute();

	$linhas = $stmt->fetchAll(PDO::FETCH_ASSOC);
	// var_dump($linhas);

	if (count($linhas) <= 0) {
		redirect('auth_nuser.php');
		// echo 'Achei nada!';
		exit();
	}

	$PDO = dbConnect();

	$sql = "UPDATE Administradores SET email_adm = :email, password_adm = :senha WHERE login_adm = :login";

	$stmt = $PDO->prepare($sql);

	$stmt->bindParam(':email', $email);
	$stmt->bindParam(':senha', $senha);
	$stmt->bindParam(':login', $dados);

	$stmt->execute();

	redirect('login.php');
	// echo 'Consegui!';

}

if (strlen($dados) == 7) {

	// echo 'SIAPE';	

	$PDO = dbConnect();

	$sql = "SELECT siape_prof FROM Professores WHERE siape_prof = :siape";

	$stmt = $PDO->prepare($sql);

	$stmt->bindParam(':siape', $dados);

	$stmt->execute();

	$linhas = $stmt->fetchAll(PDO::FETCH_ASSOC);
	// var_dump($linhas);

	if (count($linhas) <= 0) {
		redirect('auth_nuser.php');
		// echo 'Achei nada!';
		exit();
	}

	$PDO = dbConnect();

	$sql = "UPDATE Professores SET email_prof = :email, password_prof = :senha WHERE siape_prof = :siape";

	$stmt = $PDO->prepare($sql);

	$stmt->bindParam(':email', $email);
	$stmt->bindParam(':senha', $senha);
	$stmt->bindParam(':siape', $dados);

	$stmt->execute();

	redirect('login.php');
	// echo 'Consegui!';

}

if (strlen($dados) > 7) {

	// echo 'MATRÍCULA';	
	$dados = strtoupper($dados);

	$PDO = dbConnect();

	$sql = "SELECT mat_aluno FROM Alunos WHERE mat_aluno = :matricula";

	$stmt = $PDO->prepare($sql);

	$stmt->bindParam(':matricula', $dados);

	$stmt->execute();

	$linhas = $stmt->fetchAll(PDO::FETCH_ASSOC);
	// var_dump($linhas);

	if (count($linhas) <= 0) {
		redirect('auth_nuser.php');
		// echo 'Achei nada!';
		exit();
	}

	$PDO = dbConnect();

	$sql = "UPDATE Alunos SET email_aluno = :email, password_aluno = :senha WHERE mat_aluno = :matricula";

	$stmt = $PDO->prepare($sql);

	$stmt->bindParam(':email', $email);
	$stmt->bindParam(':senha', $senha);
	$stmt->bindParam(':matricula', $dados);

	$stmt->execute();

	redirect('login.php');
	// echo 'Consegui!';
	exit();

}
?> 