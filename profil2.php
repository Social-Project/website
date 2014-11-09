<?php
/* Script écrit par RVJ-WEB
Créé le 27 MAI 2006
Droits de reproduction autorisés */

session_start();
require_once('config.php');
require_once('verifications.php');
$titre_page='Modification du profil';
include_once('haut.php');

//récupération du formulaire
$email=formulaires($_POST['email']);
$passe_enc=formulaires($_POST['passe_enc']);
$nouv_passe=formulaires($_POST['nouv_passe']);
$nouv_passe2=formulaires($_POST['nouv_passe2']);

if(!$email)
   	{
	echo"E-mail inexisant.<br /><a href='profil.php' onClick='history.back()'>Retour</a>";
	include_once('bas.php');
	return FALSE;
   	}

if(isset($passe_enc))
	{
	if(!$nouv_passe || !$nouv_passe2 || strlen($nouv_passe) < 5)
	{
	echo'Votre mot de passe ou sa confirmation est inexisant ou votre mot de passe fait moins de 5 carractères<br /><a href="profil.php" onClick="history.back()">Retour</a>';
	include_once('bas.php');
	return FALSE;
	}
if($nouv_passe!=$nouv_passe2)
	{
	echo'Votre mot de passe n\'est pas le meme que sa confirmation.<br /><a href="profil.php" onClick="history.back()">Retour</a>';
	include_once('bas.php');
	return FALSE;
	}
	$passe_enc=md5($passe_enc);
$reponse_passe=mysql_query("SELECT passe FROM membres WHERE passe='$passe_enc' AND session='$session'") or die ('Erreur : '.mysql_error());	//verification si mdp valide
$count_passe=mysql_num_rows($reponse_passe);
if($count_passe == 0)
	{
	echo'L\'ancien mot de passe n\'est pas correct.<br /><a href="profil.php" onClick="history.back()">Retour</a>';
	include_once('bas.php');
	return FALSE;
	}
	$nouv_passe=md5($nouv_passe);
	mysql_query("UPDATE membres SET passe='$nouv_passe' WHERE session='$session'") or die ('Erreur : '.mysql_error());
	}
mysql_query("UPDATE membres SET email='$email' WHERE session='$session'") or die ('Erreur : '.mysql_error());
echo"<div align=center>Votre profil a bien été modifié<br /><a href='profil.php' onClick='history.back()'>Retour</a></div>";
include_once('bas.php');
?>