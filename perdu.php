<?php
/* Script écrit par RVJ-WEB
Créé le 28 MAI 2006
Droits de reproduction autorisés */

session_start();
require_once('config.php');
$titre_page='Mot de passe perdu';
include_once('haut.php');

?>
<form  action="perdu2.php" name="recup" method="POST">
<table width="300" border="0" align="center">
<tr>
<td colspan="2" class="menu">Mot de passe perdu</td>
</tr>
<tr>
<td><label for="email">E-mail :</label></td>
<td><input type="text" name="email" id="email" /></td>
</tr>
<tr>
<td><label for="pseudo">Pseudo :</label></td>
<td><input type="text" name="pseudo" id="pseudo" /></td>
</tr>
<tr>
<td><div align="center"><input type="submit" name="Submit" value="Envoyer"></div></td>
</tr>
</table>
</form>
<div align="center"><a href="index.php">Retour</a>
</div>
<?php
include_once('bas.php');
?>