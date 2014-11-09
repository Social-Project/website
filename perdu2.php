<?php
/* Script écrit par RVJ-WEB
Créé le 28 MAI 2006
Droits de reproduction autorisés */

session_start();
require_once('config.php');
$titre_page='Mot de passe perdu';
include_once('haut.php');

//récupération du formulaire
$email=formulaires($_POST['email']);
$pseudo=formulaires($_POST['pseudo']);
if(!$email)
	{
	echo"E-mail inexisant.<br /><a href='#' onClick='history.back()'>Retour</a></center>";
	include_once('bas.php');
	return FALSE;
	}
if(!$pseudo)
	{
	echo"Pseudo inexisant.<br /><a href='#' onClick='history.back()'>Retour</a></center>";
	include_once('bas.php');
	return FALSE;
	}

$reponse_pseudo=mysql_query("SELECT pseudo FROM membres WHERE pseudo='$pseudo'") or die ('Erreur : '.mysql_error());	
$count_pseudo=mysql_num_rows($reponse_pseudo);
if($count_pseudo == 0)
	{
	echo"Pseudo non valide.<br /><a href='#' onClick='history.back()'>Retour</a>";
	include_once('bas.php');
	return FALSE;
	}

$reponse_email=mysql_query("SELECT email FROM membres WHERE email='$email'") or die ('Erreur : '.mysql_error());	
$count_email=mysql_num_rows($reponse_email);
if($count_email == 0)
	{
	echo"E-mail non valide.<br /><a href='#' onClick='history.back()'>Retour</a>";
	include_once('bas.php');
	return FALSE;
	}

$existe=mysql_query("SELECT email FROM membres WHERE email='$email' AND pseudo='$pseudo'") or die ('Erreur : '.mysql_error());	
$test=mysql_num_rows($existe);
if($test == 0)
	{
	echo"L'E-mail et le pseudo ne correspondent pas.<br /><a href='#' onClick='history.back()'>Retour</a>";
	include_once('bas.php');
	return FALSE;
	}
	
for ($ligne=0;$ligne<10;$ligne++)		//Création d'un mot de passe aléatoire
	{
	@$mdp.=substr('0123456789AZERTYUIOPMLKJHGFDSQWXCVBN',(rand()%(strlen('0123456789AZERTYUIOPMLKJHGFDSQWXCVBN'))),1);
	}
	
mail("$email", "".$nom_du_site." - Oublie de mot de passe" , "Bonjour, Voici votre nouveau mot de passe : ".$mdp."", "From: ".$votre_email."");
$mdp=md5($mdp);
mysql_query("UPDATE membres SET passe='$mdp' WHERE email='$email'") or die ('Erreur : '.mysql_error());	
echo 'Un E-mail vous a été envoyé avec un nouveau mot de passe';
?>