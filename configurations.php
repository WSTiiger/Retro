<?php
// MERCI DE NE PAS TOUCHER AUX CONFIGURATIONS SI VOUS NE SAVEZ PAS COMMENT FAIRE \\
// DEMARRAGE DES SESSIONS \\
session_start();
// DATE FR \\
setlocale(LC_TIME, 'fr_FR.utf8','fra');
// CONNEXION A LA BASE DE DONNEES \\
require_once('pdo/connexion-pdo.php');

// CONFIGURATIONS DU SITE \\
$TCC = $bdd->query('SELECT * FROM cms_configs')->fetch();
$nom = htmlspecialchars($TCC['nom_site']);
$lien = htmlspecialchars($TCC['lien_site']);

// LES SESSIONS DU JOUEUR \\
if(isset($_SESSION['id']))
{
	$TU = $bdd->prepare('SELECT * FROM users WHERE id = ?');
	$TU->execute(array($_SESSION['id']));
	if($TU->rowCount() == 1)
	{
		$DTU = $TU->fetch();
		$_SESSION['id'] = intval($DTU['id']);
		$_SESSION['pseudo'] = htmlspecialchars($DTU['username']);
		$_SESSION['look'] = htmlspecialchars($DTU['look']);
		$_SESSION['credits'] = intval($DTU['credits']);
		$_SESSION['duckets'] = intval($DTU['activity_points']);
		$_SESSION['diamants'] = intval($DTU['vip_points']);
		$_SESSION['rank'] = intval($DTU['rank']);
	}
}

// AFFICHAGE DES MEMBRES CONNECTES \\
$TSS = $bdd->query('SELECT * FROM server_status')->fetch();

// CONFIGURATIONS DU SERVEUR (HÔTEL) \\
$TCCS = $bdd->query('SELECT * FROM cms_configs_swfs')->fetch();

// SELECT LE MEMBRE DANS LA TABLE BANS ET L'ENVOI VERS UNE PAGE GOOGLE (BANNI) \\
$TB = $bdd->prepare("SELECT * FROM bans WHERE value = ?");
$TB->execute(array($_SERVER["REMOTE_ADDR"]));
$DTB = $TB->fetch();
$ban = array($DTB['value']);
$ip = $_SERVER['REMOTE_ADDR'];
$stamp_now = time(date('H:i:s d-m-Y'));
$stamp_expire = $DTB['expire'];
if(in_array($ip, $ban))
{
	if($stamp_now < $stamp_expire)
	{
		header('Location: https://www.google.fr/');
		exit();
	}
}

// SELECT LE MEMBRE DANS LA TABLE BANS ET LE DECONNECTE \\
if(isset($_SESSION['id']))
{
	$TB = $bdd->prepare("SELECT * FROM bans WHERE value = ?");
	$TB->execute(array($_SESSION['pseudo']));
	$DTB = $TB->fetch();
	$stamp_now = time(date('H:i:s d-m-Y'));
	$stamp_expire = $DTB['expire'];
	if($stamp_now < $stamp_expire)
	{
		session_destroy();
		header('Location: '.$lien.'/index');
		exit();
	}
}
?>