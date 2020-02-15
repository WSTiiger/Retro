<?php
require_once('../../configurations.php');

if(!isset($_SESSION['id']))
{
	header('Location: '.$lien.'/connexion');
	exit();
}

if($_SESSION['rank'] <= 6)
{
	header('Location: '.$lien.'/profil');
	exit();
}

if(isset($_POST['pseudo']))
{
	if(!empty($_POST['pseudo']))
	{
		$pseudo = htmlspecialchars($_POST['pseudo']);
		$TU = $bdd->prepare('SELECT * FROM users WHERE username = ?');
		$TU->execute(array($pseudo));
		if($TU->rowCount() == 1)
		{
			$DTU = $TU->fetch();
			$TCCL = $bdd->prepare('INSERT INTO cms_configs_logs (pseudo, action, date) VALUES (?, ?, ?)');
			$TCCL->execute(array($_SESSION['pseudo'], "Recherche d'informations sur le joueur ".$pseudo."", time()));
	        $reponse = 'ok';
	    }
	    else
	    {
	    	$reponse = 'Ce pseudo n\'existe pas dans notre base de données.';
	    }
	}
	else
	{
		$reponse = "Merci de remplir tout les champs.";
	}
	die(json_encode(array('response' => $reponse)));
}

if(isset($_POST['id'],$_POST['credits'],$_POST['duckets'],$_POST['diamants']))
{
	if(!empty($_POST['id']) AND $_POST['credits'] != "" AND $_POST['duckets'] != "" AND $_POST['diamants'] != "")
	{
		$id = intval($_POST['id']);
		$credits = intval($_POST['credits']);
		$duckets = intval($_POST['duckets']);
		$diamants = intval($_POST['diamants']);
		$TU = $bdd->prepare('SELECT * FROM users WHERE id = ?');
		$TU->execute(array($id));
		if($TU->rowCount() == 1)
		{
			$DTU = $TU->fetch();
			if(is_numeric($credits) AND is_numeric($duckets) AND is_numeric($diamants))
			{
				if(strlen($credits) >= 1 AND strlen($credits) <= 9999999)
				{
					if(strlen($duckets) >= 1 AND strlen($duckets) <= 9999999)
					{
						if(strlen($diamants) >= 1 AND strlen($diamants) <= 9999999)
						{
							$TU = $bdd->prepare('UPDATE users SET credits = ?, activity_points = ?, vip_points = ? WHERE id = ?');
							$TU->execute(array($credits, $duckets, $diamants, $id));
							$TCCL = $bdd->prepare('INSERT INTO cms_configs_logs (pseudo, action, date) VALUES (?, ?, ?)');
							$TCCL->execute(array($_SESSION['pseudo'], "Modifications du joueur ".$DTU['username']."", time()));
					        $reponse = 'ok';
					    }
					    else
					    {
					    	$reponse = 'Le nombre de diamants doit faire entre 1 et 9999999 caractères.';
					    }
					}
					else
					{
						$reponse = 'Le nombre de duckets doit faire entre 1 et 9999999 caractères.';
					}
			    }
			    else
			    {
			    	$reponse = 'Le nombre de crédits doit faire entre 1 et 9999999 caractères.';
			    }
		   	}
		   	else
		   	{
		   		$reponse = 'Le nombre de crédits, duckets, diamants doit être un chiffre.';
		   	}
		}
		else
		{
			$reponse = 'Une erreur est survenue.';
		}
	}
	else
	{
		$reponse = "Merci de remplir tout les champs.";
	}
	die(json_encode(array('response' => $reponse)));
}

if(isset($_POST['pseudo'],$_POST['grade']))
{
	if(!empty($_POST['pseudo']) AND !empty($_POST['grade']))
	{
		$pseudo = htmlspecialchars($_POST['pseudo']);
		$grade = intval($_POST['grade']);
		$TU = $bdd->prepare('SELECT * FROM users WHERE username = ?');
		$TU->execute(array($pseudo));
		if($TU->rowCount() == 1)
		{
			$DTU = $TU->fetch();
			$TR = $bdd->prepare('SELECT * FROM ranks WHERE id = ?');
			$TR->execute(array($grade));
			$DTR = $TR->fetch();
			$TCC = $bdd->prepare('UPDATE users SET rank = ? WHERE id = ?');
			$TCC->execute(array($grade, $DTU['id']));
			$TCCL = $bdd->prepare('INSERT INTO cms_configs_logs (pseudo, action, date) VALUES (?, ?, ?)');
			$TCCL->execute(array($_SESSION['pseudo'], "Grade le joueur ".$pseudo." dans le poste ".htmlspecialchars($DTR['name'])."", time()));
	        $reponse = 'ok';
	    }
	    else
	    {
	    	$reponse = 'Ce pseudo n\'existe pas dans notre base de données.';
	    }
	}
	else
	{
		$reponse = "Merci de remplir tout les champs.";
	}
	die(json_encode(array('response' => $reponse)));
}
?>