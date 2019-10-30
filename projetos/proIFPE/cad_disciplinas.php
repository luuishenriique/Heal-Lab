<title>proIFPE::Cadastro de Disciplinas</title>

<?php 
include "header.php";
include "config.php";
?>

<?php
// $dado = file(TUR_FILE);

// $dados = file(DIS_FILE);

// $disciplina = [];

// for ($i=0; $i < sizeof($dados); $i++) {
//   $dados[$i] = explode(',', $dados[$i]);
// } 

session_start();

$PDO = dbConnect();

$sql = "SELECT * FROM Disciplinas";

$stmt = $PDO->prepare($sql);

$stmt->execute();

$linhas = $stmt->fetchAll(PDO::FETCH_ASSOC);
// var_dump($linhas);

if (count($linhas) <= 0) {
  // redirect('cad_disciplinas.php?msg=Achei nada!'); loop de redirecionamentos
  echo 'Info::Achei nada!';
  // exit();
}
?>
<?php if (!isset($_GET['msg'])): ?>
  <?= $_GET['msg'] ?>
<?php endif ?>
<br>
<h2>Disciplinas cadastradas</h2>
<br>
<table>
  <thead>
    <tr>
      <th>Código</th>
      <th>Disciplina</th>
      <th>Descrição</th>
      <th>Ações</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($linhas as $id => $linha): ?>
      <tr>
        <td><?= $linhas[$id]['id_disc'] ?></td>
        <td><?= $linhas[$id]['name_disc'] ?></td>
        <td><?= $linhas[$id]['desc_disc'] ?></td>
        <td>
          <nav>
            <a href="">&#133;</a> |
            <a href="">&times;</a>
          </nav>
        </td>
      </tr>
    <?php endforeach ?>
  </tbody>
</table>
<br>
<h3 style="text-align: center;"><a href="form_dis.php">Adicionar nova disciplina</a></h3>
<h4 style="text-align: center;"><a href="home.php">Voltar para home</a></h4>
<?php include 'footer.php' ?>