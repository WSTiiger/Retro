<?php
require_once('../../configurations.php');

if(!isset($_SESSION['id']))
{
	header('Location: '.$lien.'/connexion');
	exit();
}

if($_SESSION['rank'] <= 7)
{
	header('Location: '.$lien.'/profil');
	exit();
}

if(isset($_POST['nom_site'],$_POST['lien_site']))
{
	if(!empty($_POST['nom_site']) AND !empty($_POST['lien_site']))
	{
		$nom_site = htmlspecialchars($_POST['nom_site']);
		$lien_site = htmlspecialchars($_POST['lien_site']);
		$TCC = $bdd->prepare('UPDATE cms_configs SET nom_site = ?, lien_site = ?');
		$TCC->execute(array($nom_site, $lien_site));
		$TCCL = $bdd->prepare('INSERT INTO cms_configs_logs (pseudo, action, date) VALUES (?, ?, ?)');
		$TCCL->execute(array($_SESSION['pseudo'], "Modifications des configurations du site", time()));
        $reponse = 'ok';
	}
	else
	{
		$reponse = "Merci de remplir tout les champs.";
	}
	die(json_encode(array('response' => $reponse)));
}

if(isset($_POST['ip_vps'],$_POST['port_emu'],$_POST['external_variables'],$_POST['external_flash_texts'],$_POST['productdata'],$_POST['furnidata'],$_POST['base_habbo_swf'],$_POST['habbo_swf']))
{
	if(!empty($_POST['ip_vps']) AND $_POST['port_emu'] != "" AND !empty($_POST['external_variables']) AND !empty($_POST['external_flash_texts']) AND !empty($_POST['productdata']) AND !empty($_POST['furnidata']) AND !empty($_POST['base_habbo_swf']) AND !empty($_POST['habbo_swf']))
	{
		$ip_vps = htmlspecialchars($_POST['ip_vps']);
		$port_emu = htmlspecialchars($_POST['port_emu']);
		$external_variables = htmlspecialchars($_POST['external_variables']);
		$external_flash_texts = htmlspecialchars($_POST['external_flash_texts']);
		$productdata = htmlspecialchars($_POST['productdata']);
		$furnidata = htmlspecialchars($_POST['furnidata']);
		$base_habbo_swf = htmlspecialchars($_POST['base_habbo_swf']);
		$habbo_swf = htmlspecialchars($_POST['habbo_swf']);
		$TCCS = $bdd->prepare('UPDATE cms_configs_swfs SET ip_vps = ?, port_emu = ?, external_variables = ?, external_flash_texts = ?, productdata = ?, furnidata = ?, base_habbo_swf = ?, habbo_swf = ?');
		$TCCS->execute(array($ip_vps, $port_emu, $external_variables, $external_flash_texts, $productdata, $furnidata, $base_habbo_swf, $habbo_swf));
		$TCCL = $bdd->prepare('INSERT INTO cms_configs_logs (pseudo, action, date) VALUES (?, ?, ?)');
		$TCCL->execute(array($_SESSION['pseudo'], "Modifications des configurations du serveur", time()));
        $reponse = 'ok';
	}
	else
	{
		$reponse = "Merci de remplir tout les champs.";
	}
	die(json_encode(array('response' => $reponse)));
}
?>