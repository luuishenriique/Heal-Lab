<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
  <title>Cadastro de Disciplinas</title>
  <link rel="stylesheet" href="css/estilo.css">
  <link href="https://fonts.googleapis.com/css?family=Sintony&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
</head>
<body>
  <?php include "header.php" ?>
    <?php
      $dados = file('src/disciplinas.csv');
      for ($i=0; $i < sizeof($dados); $i++) {
        $dados[$i] = explode(',', $dados[$i]);
      }
    ?>
        <legend>Cadastro de Disciplinas</legend>
     <form action="add_dis.php" method="POST" style="text-align: center;">
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
            <th>Turno</th>
            <th>Ínicio</th>
            <th>Término</th>
            <th>Remover Disciplina</th>
            <th>Editar</th>
          </tr>

      <?php foreach ($dados as $i => $dado):?>
         <tr>
           <?php foreach ($dado as $dados): ?>
              <td><?= $dados ?></td>
            <?php endforeach?>
              <td>
                <a href="del_dis.php?linha=<?= $i ?>" class="btn"><i class="far fa-trash-alt"></i>
              </td>
              <td>
                <a href="edi_dis.php?linha=<?= $id ?>" class="btn"><i class="far fa-edit"></i></a>
              </td>
          </tr>
         <?php endforeach ?>
    </table>
</body>
</html>