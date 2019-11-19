<?php 
require 'config.php';
include 'header.php';
$words = array("irrepairable","relata","superextreme","bordarius","likin","bicornate","acleistous","moistly","arthropterous","spealbone","heroify","web","variative","sphingine","magnifiable","syntagma","analytic","subcultural","bereason","prophesy","millinery","waveringness","chalaze","pyramidize","antefix","splenium","inconvertibility","rodenticidal","supersensuousness","kitthoge");
$n = rand(0,sizeof($words));
$word = $words[$n];
?>
<title>Liberar usuário</title>
<br>
<form class="form_info" method="POST" action="auth_nuser.php">
	<fieldset>
		<legend>Área de cadastro</legend>
		<legend>Matrícula ou SIAPE</legend>
		<input type="text" name="user_data" placeholder="Ex: 20191INFIG7151" required>
		<legend>Email</legend>
		<input type="text" name="email" placeholder="Ex: jsilva@gmail.com" required>
		<legend>Senha</legend>
		<input type="password" name="senha" required>
		<legend>Confirme a Senha</legend>
		<input type="password" name="conf_senha" required>
		<input type="text" hidden name="keyword" value="<?= $word ?>">
		<label>Palavra-Chave: <?= $word ?></label>
		<br>
		<label></label>
		<br>
		<legend>Confirme a palavra-chave:</legend>
		<input type="text" name="vkeyword" required>
		<input type="submit" value="Atualizar dados">
	</fieldset>
</form>
<h3><a href="login.php">Voltar para login</a></h3>
</div>