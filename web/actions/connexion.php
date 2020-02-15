<?php
require_once('../../configurations.php');

if(isset($_SESSION['id']))
{
	header('Location: '.$lien.'/profil');
	exit();
}

if(isset($_POST['pseudo'],$_POST['password']))
{
	if(!empty($_POST['pseudo']) AND !empty($_POST['password']))
	{
		$pseudo = htmlspecialchars($_POST['pseudo']);
		$TU = $bdd->prepare('SELECT * FROM users WHERE username = ?');
		$TU->execute(array($pseudo));
		if($TU->rowCount() == 1)
		{
			$DTU = $TU->fetch();
    		if(password_verify($_POST['password'], $DTU['password']))
    		{
    			$_SESSION['id'] = $DTU['id'];
        		$TU = $bdd->prepare('UPDATE users SET ip_last = ? WHERE id = ?');
        		$TU->execute(array($_SERVER['REMOTE_ADDR'], $_SESSION['id']));
        		$reponse = 'ok';
    		}
    		else
    		{
    			$reponse = "Le mot de passe ne correspond pas avec le pseudo.";
    		}
		}
		else
		{
			$reponse = "Ce pseudo n'existe pas dans notre base de données.";
		}
	}
	else
	{
		$reponse = "Merci de remplir tout les champs.";
	}
	die(json_encode(array('response' => $reponse)));
}
?>