<div class="connect-error">
	<?php echo $error; ?>
</div>
<form class="form-signin" action="index" method="POST">
	<input type="email" id="inputEmail" name="email" class="email" placeholder="Adresse Mail" required autofocus>
	<input type="password" id="inputPassword" name="pass" class="password" placeholder="Mot de passe" required>
	<br />
	<button class="button success" type="submit">Connexion</button>
</form>
