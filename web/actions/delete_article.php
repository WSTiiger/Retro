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

if(isset($_POST['id_article']))
{
	if(!empty($_POST['id_article']))
	{
		$id_article = intval($_POST['id_article']);
		$TCA = $bdd->prepare('SELECT * FROM cms_articles WHERE id = ?');
		$TCA->execute(array($id_article));
		if($TCA->rowCount() == 1)
		{
			$DTCA = $TCA->fetch();
			$TCCL = $bdd->prepare('INSERT INTO cms_configs_logs (pseudo, action, date) VALUES (?, ?, ?)');
			$TCCL->execute(array($_SESSION['pseudo'], "Supprimer l'article ".htmlspecialchars($DTCA['titre']).".", time()));
			$TCA = $bdd->prepare('DELETE FROM cms_articles WHERE id = ?');
			$TCA->execute(array($id_article));
	        $reponse = 'ok';
	    }
	    else
	    {
	    	$reponse = 'Cette article n\'existe pas.';
	    }
	}
	else
	{
		$reponse = "Merci de remplir tout les champs.";
	}
	die(json_encode(array('response' => $reponse)));
}
?>