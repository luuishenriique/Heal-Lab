<title>Cadastro de Aulas</title>

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
<legend class="leg_form">Cadastro de Aula</legend>
<form class="form_info" action="add_dis.php" method="POST" style="text-align: center;">
  <fieldset>
    <legend>Dados da aula</legend>
    <!-- <input type="text" name="disciplina" required="" placeholder="Disciplina"><br>
    <input type="text" name="dia" placeholder="Dia"><br>
    <input type="text" name="horario" placeholder="Horário"><br> -->
    <p>Infome a disciplina:</p>
    <select name="disciplina">
      <option value="" selected disabled>Selecione a disciplina</option>
      <option value="Informática">Informática</option>
      <option value="Matemática">Matemática</option>
    </select>
    <p>Informe o dia:</p>
    <select name="dia">
      <option value="" selected disabled>Selecione o dia da semana</option>
      <option value="Segunda">Segunda</option>
      <option value="Terça">Terça</option>
      <option value="Quarta">Quarta</option>
      <option value="Quinta">Quinta</option>
      <option value="Sexta">Sexta</option>
    </select>
    <p>informe o turno:</p>
    <select name="turno">
      <option value="" selected disabled>Selecione o turno</option>
      <option value="Manhã">Manhã</option>
      <option value="Tarde">Tarde</option>
    </select>
    <p>-----------------</p>
    <div>
    <legend>Horário de início</legend>
    <input type="time" name="inicio">
    <br>
    <br>
    <legend>Horário de término</legend>
    <input type="time" name="termino">
    </div>
    <p>-----------------</p>
    <input type="submit" value="Adicionar">
    <!-- <input type="reset" value="Limpar"> -->
  </fieldset>
</form>
<br>
<h2>Aulas cadastradas</h2>
<br>
<table>
  <tr>
    <th>Disciplina</th>
    <th>Dia</th>
    <th>Turno</th>
    <th>Hora início</th>
    <th>Hora término</th>
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
<?php include 'footer.php' ?>