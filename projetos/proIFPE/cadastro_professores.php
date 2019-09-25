	<title>Cadastro de Professores</title>

	<?php 
		include 'header.php';

		$dados = file('src/professores.csv'); /*recebendo arquivos da tabela csv*/
      	for ($i=0; $i < sizeof($dados); $i++) { 
        $dados[$i] = explode(',', $dados[$i]);
      }
	 ?>
	 
	 <legend>Informações sobre o professor</legend>
	 <form action="add_prof.php" method="POST" style="text-align: center;">
	 	<fieldset>
	 		<input type="text" name="professor" placeholder="Professor"><br>
	 		<input type="text" name="disciplina" placeholder="Disciplina"><br>
	 		<input type="text" name="email" placeholder="Email"><br>
	 		<input type="submit" value="Adicionar">
	 	</fieldset>
	 </form>

	 <table>
	 	<tr>
	 		<th>Professor</th>
	 		<th>Disciplina</th>
	 		<th>Email</th>
	 		<th>Apagar Professor</th>
	 	</tr>
	 	<?php foreach ($dados as $i => $dado): ?>
	 		<tr>
	 			<?php foreach ($dado as $dados): ?>
	 				<td><?= $dados ?></td>
	 			<?php endforeach ?>
	 				<td>
	 					<a href="del_prof?linha=<?= $i ?>">X</a>
	 				</td>
	 		</tr>
	 	<?php endforeach ?>
	 </table>
</body>
</html>