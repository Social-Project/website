<?php
/* Script écrit par RVJ-WEB
Créé le 27 MAI 2006
Droits de reproduction autorisés */

session_start();
require_once('config.php');
//récupération des variables
$pseudo = formulaires($_POST['pseudo']);
$mdp = formulaires($_POST['mdp']);


$mdp=md5($mdp);	//Codage du mdp

if(!$pseudo)
	{
	header('Location:index.php?erreur=pseudo');
	}
if(!$mdp)
	{
	header('Location:index.php?erreur=passe');
	}
$reponse_cores=mysql_query("SELECT * FROM membres WHERE passe='$mdp' AND pseudo='$pseudo'") or die ('Erreur : '.mysql_error());
$count_cores=mysql_num_rows($reponse_cores);
if($count_cores == 0 )
	{
	header('Location:index.php?erreur=connexion');		//on vérifie la correspondance
	}

else
	{
	for ($ligne=0;$ligne<30;$ligne++)		//Création d'un identifiant aléatoire
		{
		@$session.=substr('0123456789AZERTYUIOPMLKJHGFDSQWXCVBN',(rand()%(strlen('0123456789AZERTYUIOPMLKJHGFDSQWXCVBN'))),1);
		}
	
	mysql_query("UPDATE membres SET session='$session' WHERE passe='$mdp'") or die ('Erreur : '.mysql_error());
	$_SESSION['session'] = "$session";		//création de la session
	header('Location:index.php');			//redirection vers l'index
	}
include_once('bas.php');
?>
