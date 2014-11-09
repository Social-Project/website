<?php
/* Script écrit par RVJ-WEB
Créé le 27 MAI 2006
Droits de reproduction autorisés */

session_start();
require_once('config.php');
require_once('verifications.php');
$titre_page='Modification du profil';
include_once('haut.php');
echo"<form action='profil2.php' method='post' enctype='multipart/form-data' name='form1'>
	<table width='400' border='0' align='center'>
	<tr>
	<td colspan='2'class='menu'><div align=center>Modification de profil</div></td>
	</tr>
	<tr>
	<td><label for='email'>Modification de l'e-mail</label></td>
	<td><input name='email' type='text' id='email' value='". $email ."'></td>";?>
	</tr>
	<tr>
	<td><label for="mdp">Ancien mot de passe (pour pas changer, ne pas remplir)</label></td>
	<td><input name="passe_enc" type="password" id="mdp"></td>
	</tr>
	<tr>
	<td><label for="mdp2">Nouveau mot de passe</label></td>
	<td><input name="nouv_passe" type="password" id="mdp2"></td>
	</tr>
	<tr>
	<td><label for="mdp3">confirmation du nouveau mot de passe</label></td>
	<td><input name="nouv_passe2" type="password" id="mdp3"></td>
	</tr>
	<tr>
	<td><input type="submit" name="Submit" value="Modifier"></td>
	</tr>
	</table>
	</form>
	<div align=center><a href="index.php" onClick="history.back()">Retour</a></div>
<?php
include_once('bas.php');
?>