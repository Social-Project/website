<?php
/* Script écrit par RVJ-WEB
Créé le 27 MAI 2006
Droits de reproduction autorisés */

session_start();
require_once('config.php');
$titre_page='Inscription';
include_once('haut.php');
?><form method='post' action='verification.php' enctype='multipart/form-data'>	
	<table width="400" border="0" align="center">
	<tr>
	<td colspan="2" class="menu">Inscription</td>
	</tr>
	<tr>
	<td><label for="pseudo">Pseudo : </label></td>
	<td><input name="pseudo" type="text" id="pseudo" /></td>
	</tr>
	<tr>
	<td><label for="email">E-mail : </label></td>
	<td><input name="email" type="text" id="email" /></td>
	</tr>
	<tr>
	<td><label for="mdp">Mot de passe : </label></td>
	<td><input name="mdp" type="password" id="mdp" /></td>
	</tr>
	<tr>
	<td><label for="mdp2">Confirmation du mot de passe : </label></td>
	<td><input name="mdp2" type="password" id="mdp2" /></td>
	</tr>
	<tr>
	<td><div align="center"><input type="submit" value="GOOOO" /></div></td>
	</tr>
	</table>
	</form>
	</div>
	<center><a href="index.php">Retour</a></center>
<?php
include_once('bas.php');
?>
