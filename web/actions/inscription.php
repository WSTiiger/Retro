<?php
require_once('../../configurations.php');

if(isset($_SESSION['id']))
{
	header('Location: '.$lien.'/profil');
	exit();
}

if(isset($_POST['pseudo'],$_POST['email'],$_POST['password'],$_POST['newpassword'],$_POST['captcha'],$_POST['captcha_verif']))
{
	if(!empty($_POST['pseudo']) AND !empty($_POST['email']) AND !empty($_POST['password']) AND !empty($_POST['newpassword']) AND !empty($_POST['captcha']) AND !empty($_POST['captcha_verif']))
	{
		$pseudo = htmlspecialchars($_POST['pseudo']);
		$email = htmlspecialchars($_POST['email']);
		$password = password_hash($_POST['password'], PASSWORD_BCRYPT);
		$captcha = intval($_POST['captcha']);
		$captcha_verif = intval($_POST['captcha_verif']);
		$TU = $bdd->prepare('SELECT * FROM users WHERE username = ?');
		$TU->execute(array($pseudo));
		if($TU->rowCount() == 0)
		{
			if(strlen($pseudo) >= 3 AND strlen($pseudo) <= 30)
			{
				if(ctype_alnum($pseudo))
				{
					$TU = $bdd->prepare('SELECT * FROM users WHERE mail = ?');
					$TU->execute(array($email));
					if($TU->rowCount() == 0)
					{
						if(strlen($email) >= 3)
						{
							if(filter_var($email, FILTER_VALIDATE_EMAIL))
							{
								if($_POST['password'] == $_POST['newpassword'])
								{
									if(strlen($_POST['password']) >= 8 AND strlen($_POST['newpassword']) >= 8)
									{
										if($captcha == $captcha_verif)
										{
											$TU = $bdd->prepare('INSERT INTO users (username, password, mail, look, account_created, last_online, ip_reg, last_offline) VALUES (?, ?, ?, ?, ?, ?, ?, ?)');
											$TU->execute(array($pseudo, $password, $email, "hd-180-1.ch-255-66.lg-280-110.sh-305-62.ha-1012-110.hr-828-61", time(), time(), $_SERVER['REMOTE_ADDR'], time()));
											$TU = $bdd->query('SELECT * FROM users ORDER BY id DESC LIMIT 0,1')->fetch();
											$_SESSION['id'] = $TU['id'];
											$TU = $bdd->prepare('UPDATE users SET ip_last = ?, last_offline = ? WHERE id = ?');
	        								$TU->execute(array($_SERVER['REMOTE_ADDR'], time(), $_SESSION['id']));
											$reponse = 'ok';
										}
										else
										{
											$reponse = 'Le captcha est incorrect.';
										}
									}
									else
									{
										$reponse = 'Le mot de passe doit faire plus de 8 caractères.';
									}
								}
								else
								{
									$reponse = 'Les mots de passe ne correspondent pas.';
								}
							}
							else
							{
								$reponse = 'Votre adresse e-mail n\'est pas valide';
							}
						}
						else
						{
							$reponse = 'Votre adresse e-mail doit faire plus de 3 caractères.';
						}
					}
					else
					{
						$reponse = 'Cette adresse e-mail est déjà utilisée.';
					}
				}
				else
				{
					$reponse = 'Votre pseudo contient des caractères non-autorisés.';
				}
			}
			else
			{
				$reponse = 'Votre pseudo doit faire entre 3 et 30 caractères.';
			}
		}
		else
		{
			$reponse = 'Ce pseudo est déjà utlisé.';
		}
	}
	else
	{
		$reponse = 'Merci de remplir tout les champs.';
	}
	die(json_encode(array('response' => $reponse)));
}
?>