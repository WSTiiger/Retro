<?php
require_once('../../configurations.php');

if(!isset($_SESSION['id']))
{
	header('Location: '.$lien.'/connexion');
	exit();
}

if($_SESSION['rank'] <= 4)
{
	header('Location: '.$lien.'/profil');
	exit();
}


if(isset($_POST['titre'],$_POST['description'],$_POST['url_image'],$_POST['contenu']))
{
	if(!empty($_POST['titre']) AND !empty($_POST['description']) AND !empty($_POST['url_image']) AND !empty($_POST['contenu']))
	{
		$titre = htmlspecialchars($_POST['titre']);
		$description = htmlspecialchars($_POST['description']);
		$url_image = htmlspecialchars($_POST['url_image']);
		$contenu = htmlspecialchars($_POST['contenu']);
		if(strlen($titre) >= 3 AND strlen($titre) <= 50)
		{   if(strlen($description) >= 3 AND strlen($description) <= 255)
			{
				if(strlen($url_image) >= 3)
				{
					if(strlen($contenu) >= 3)
					{
						$TCA = $bdd->prepare('INSERT INTO cms_articles (titre, description, url_image, contenu, auteur, date) VALUES (?, ?, ?, ?, ?, ?)');
						$TCA->execute(array($titre, $description, $url_image, $contenu, $_SESSION['pseudo'], time()));
						$TCCL = $bdd->prepare('INSERT INTO cms_configs_logs (pseudo, action, date) VALUES (?, ?, ?)');
						$TCCL->execute(array($_SESSION['pseudo'], "Création d'un article sur le site.", time()));
				        $reponse = 'ok';
				    }
				    else
				    {
				    	$reponse = 'Le contenu de votre article doit faire plus de 3 caractères.';
				    }
				}
				else
				{
					$reponse = 'Le lien de votre image doit faire plus de 3 caractères.';
				}
			}
			else
			{
				$reponse = 'La description de votre article doit faire plus de 3 caractères.';
			}
	    }
	    else
	    {
	    	$reponse = 'Le titre de votre article doit faire plus de 3 caractères.';
	    }
	}
	else
	{
		$reponse = "Merci de remplir tout les champs.";
	}
	die(json_encode(array('response' => $reponse)));
}
?>