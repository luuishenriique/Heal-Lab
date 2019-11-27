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

$sql2 = "SELECT * FROM Professores";

$stmt = $PDO->prepare($sql2);

$stmt->execute();

$linhas2 = $stmt->fetchAll(PDO::FETCH_ASSOC);

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
      <th>Disciplina</th>
      <th>Descrição</th>
      <th>Curso</th>
      <th>Professor</th>
      <th>Ações</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($linhas as $id => $linha): ?>
      <tr>
        <td><?= $linhas[$id]['name_disc'] ?></td>
        <td><?= $linhas[$id]['desc_disc'] ?></td>
        <td>
          <?php if ($linhas[$id]['id_curso'] == 1): ?>
            <?= "INFORMÁTICA PARA INTERNET" ?>
          <?php endif ?>
          <?php if ($linhas[$id]['id_curso'] == 2): ?>
            <?= "LOGÍSTICA" ?>
          <?php endif ?>
        </td>
        <?php if (is_null($linhas[$id]['id_prof'])): ?>
          <td style="background-color: yellow; width: 50%; margin: auto;">
            <?= "Professor indefinido" ?>
          </td>
          <?php else: ?>
            <td><?= $linhas2[$id]['name_prof'] ?></td>
          <?php endif ?>
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
  <!-- <h3 style="text-align: center;"><a href="form_dis.php">Adicionar nova disciplina</a></h3> -->
  <!-- <h4 style="text-align: center;"><a href="home.php">Voltar para home</a></h4> -->
  <?php include 'footer.php' ?>