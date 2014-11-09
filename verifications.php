<?php
/* Script écrit par RVJ-WEB
Créé le 27 MAI 2006
Droits de reproduction autorisés */

$session=formulaires($_SESSION['session']);
if(!@$_SESSION['session'])
	{
	header('Location:index.php?erreur=connexion');
	return false;
	}
	
$verif=mysql_query("SELECT * FROM membres WHERE session='$session'") or die ('Erreur : '.mysql_error());	//on vérifie si il existe une entrée avec cet identifiant
$verif=mysql_num_rows($verif);
if($verif == 0)
	{
	header('Location:index.php?erreur=connexion');
	session_unset();
	session_destroy();
	return false;
	}

$sql=mysql_query("SELECT * FROM membres WHERE session='$session'") or die ('Erreur : '.mysql_error());
while ($resultat = mysql_fetch_array($sql) )
	{
	$admin = $resultat['admin'];
	$email = $resultat['email'];
	$pseudo = $resultat['pseudo'];
	$id = $resultat['id'];
	}
?>