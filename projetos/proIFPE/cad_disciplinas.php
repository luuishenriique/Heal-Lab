<title>Cadastro de Disciplinas</title>

<?php 
include "header.php";
include "config.php";
?>

<?php
$dados = file(DIS_FILE);
for ($i=0; $i < sizeof($dados); $i++) {
  $dados[$i] = explode(',', $dados[$i]);
}
?>

<?php if (!empty($_GET['msg'])): ?>
  <div class="msg_info">
    <h3><?= $_GET['msg'] ?></h3>
  </div>
<?php endif ?>

<br>
<legend class="leg_form">Cadastro de Disciplinas</legend>
<form class="form_info" action="add_dis.php" method="POST" style="text-align: center;">
  <fieldset>
    <input type="text" name="disciplina" required="" placeholder="Disciplina"><br>
    <input type="text" name="dia" placeholder="Dia"><br>
    <input type="text" name="horario" placeholder="Horário"><br>
    <input type="text" name="turno" placeholder="Turno"><br>
    <input type="text" name="inicio" placeholder="Ínicio"><br>
    <input type="text" name="termino" placeholder="Término"><br>
    <input type="submit" value="Adicionar">
    <input type="reset" value="Limpar">
  </fieldset>
</form>
<br>

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