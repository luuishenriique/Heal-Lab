<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
  <title>Cadastro de Disciplinas</title>
  <link rel="stylesheet" href="estilo.css">
  <link href="https://fonts.googleapis.com/css?family=Sintony&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">
</head>
<body>
  <?php include "header.php" ?>
    <?php
      $dados = file('dados.csv');
      for ($i=0; $i < sizeof($dados); $i++) {
        $dados[$i] = explode(',', $dados[$i]);
      }
    ?>
        <legend>Cadastro de Disciplinas</legend>
     <form action="add.php" method="POST" style="text-align: center;">
            <fieldset>
              <input type="text" name="disciplina" required="" placeholder="Disciplina"><br>
              <input type="text" name="horario" placeholder="Horário"><br>
              <input type="submit" value="Adicionar">
            </fieldset>
    </form>

    <table>
          <tr>
            <th>Disciplina</th>
            <th>Horário</th>
            <th>Remover</th>
          </tr>

      <?php foreach ($dados as $i => $dado):?>
         <tr>
           <?php foreach ($dado as $dados): ?>
              <td><?= $dados ?></td>
            <?php endforeach?>
              <td>
                <a href="del.php?linha=<?= $i ?>">Remover</a>
              </td>
          </tr>
         <?php endforeach ?>
    </table>
</body>
</html>