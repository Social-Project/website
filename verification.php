<?php
/* Script écrit par RVJ-WEB
Créé le 27 MAI 2006
Droits de reproduction autorisés */

session_start();
require_once('config.php');
$titre_page='Inscription';
include_once('haut.php');
$email=formulaires($_POST['email']);
$pseudo=formulaires($_POST['pseudo']);
$mdp=formulaires($_POST['mdp']);
$mdp2=formulaires($_POST['mdp2']);

//// VERIFICATIONS BANALES ////
if(!$mdp || !$mdp2 || strlen($mdp) < 5)
	{
	echo'Votre mot de passe ou sa confirmation est inexisant ou votre mot de passe fait moins de 5 carractères<br /><a href="inscription.php" onClick="history.back()">Retour</a>';
	include_once('bas.php');
return FALSE;
	}
if($mdp!=$mdp2)
	{
	echo'Votre mot de passe n\'est pas le meme que sa confirmation<br /><a href="inscription.php" onClick="history.back()">Retour</a>';
	include_once('bas.php');
return FALSE;
	}
if(!$pseudo || strlen($pseudo) > 15)
	{
	echo'Votre pseudo est inexisant ou fait plus de 15 carractères<br /><a href="inscription.php" onClick="history.back()">Retour</a>';
	include_once('bas.php');
return FALSE;
	}
if(!$email)
   	{
	echo'Votre e-mail est innexistant.<br /><a href="inscription.php" onClick="history.back()">Retour</a>';
	include_once('bas.php');
return FALSE;
   	}
	
//// VERIFICATIONS DES EXISTANCES ////
$reponse_mail=mysql_query("SELECT email FROM membres WHERE email='$email'") or die ('Erreur : '.mysql_error());	//verification si e-mail existe déjà
$count_mail=mysql_num_rows($reponse_mail);
if($count_mail == 1)
	{
	echo'Cet e-mail existe déjà.<br /><a href="inscription.php" onClick="history.back()">Retour</a>';
	include_once('bas.php');
return FALSE;
	}
$reponse_pseudo=mysql_query("SELECT pseudo FROM membres WHERE pseudo='$pseudo'") or die ('Erreur : '.mysql_error());	//verification si pseudo existe déjà
$count_pseudo=mysql_num_rows($reponse_pseudo);
if($count_pseudo == 1)
	{
	echo 'Ce pseudo existe déjà.<br /><a href="inscription.php" onClick="history.back()">Retour</a>';
	include_once('bas.php');
return FALSE;
	}
		
	for ($ligne=0;$ligne<30;$ligne++)		//Création d'un identifiant aléatoire
		{
		@$session.=substr('0123456789AZERTYUIOPMLKJHGFDSQWXCVBN',(rand()%(strlen('0123456789AZERTYUIOPMLKJHGFDSQWXCVBN'))),1);
		}

		$mdp=md5($mdp);		//Codage du mot de passe
		mysql_query("INSERT INTO membres VALUES ('', '$session', '$pseudo', '$mdp', '$email')") or die ('Erreur : '.mysql_error());	//insertion dans la bdd
echo'Merci de vous vous etre inscrit à '.$nom_du_site.'<br /><a href="index.php">Identifiez vous !</a>';
include_once('bas.php');
?>