<?php
require_once('../../configurations.php');

if(!isset($_SESSION['id']))
{
	header('Location: '.$lien.'/connexion');
	exit();
}

if(isset($_POST['mypassword'],$_POST['newpassword'],$_POST['renewpassword']))
{
	if(!empty($_POST['mypassword']) AND !empty($_POST['newpassword']) AND !empty($_POST['renewpassword']))
	{
		$newpassword = password_hash($_POST['newpassword'], PASSWORD_BCRYPT);
		$TU = $bdd->prepare('SELECT * FROM users WHERE id = ?');
		$TU->execute(array($_SESSION['id']));
		$DTU = $TU->fetch();
		if(password_verify($_POST['mypassword'], $DTU['password']))
    	{
    		if($_POST['newpassword'] == $_POST['renewpassword'])
			{
				if(strlen($_POST['newpassword']) >= 8 AND strlen($_POST['renewpassword']) >= 8)
				{
					$TU = $bdd->prepare('UPDATE users SET password = ? WHERE id = ?');
					$TU->execute(array($newpassword, $_SESSION['id']));
					$reponse = 'ok';
				}
				else
				{
					$reponse = 'Le nouveau mot de passe doit faire plus de 8 caractères.';
				}
			}
			else
			{
				$reponse = 'Les mots de passe ne correspondent pas.';
			}
    	}
    	else
    	{
    		$reponse = 'Le mot de passe actuel ne correspond pas avec le vôtre.';
    	}
	}
	else
	{
		$reponse = 'Merci de remplir tout les champs.';
	}
	die(json_encode(array('response' => $reponse)));
}
?>