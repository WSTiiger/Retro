<?php
require_once('../configurations.php');

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

$pageid = 3;

if(isset($_GET['pseudo']) AND !empty($_GET['pseudo']))
{
	$pseudo = htmlspecialchars($_GET['pseudo']);
	$TU = $bdd->prepare('SELECT * FROM users WHERE username = ?');
	$TU->execute(array($pseudo));
	if($TU->rowCount() == 1)
	{
		$DTU = $TU->fetch();
		$joueur = "true";
	}
	else
	{
		$joueur = "false";
	}
}
else
{
	$joueur = "false";
}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title><?php echo $nom; ?>: Modifications d'un joueur</title>
		<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto">
		<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">
		<link rel="stylesheet" type="text/css" href="<?php echo $lien; ?>/web/theme.css">
		<link rel="shortcut icon" href="<?php echo $lien; ?>/web/favicon.png">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
		<script src='<?php echo $lien; ?>/web/form.js'></script>
	</head>
	<body>
		<div id="reponse"></div>
		<?php require_once('header.php'); ?>

		<div class="content">
			<?php if($joueur == "false") { ?>
			<div class="pare cinquante">
				<div class="title">RECHERCHER UN JOUEUR</div>
				<form>
					<input type="text" id="pseudo" placeholder="Entre le pseudo du joueur a rechercher" style="width: 430px;margin-left: 10px;margin-top: 5px;margin-bottom: 5px;height: 34px;padding: 3px 10px;font-size: 14px;line-height: 1.42857143;color: #555;background-color: #fff;background-image: none;border: 1px solid #ccc;border-radius: 4px;">
					<button type="submit" id="recherche_joueur" class="loginbtn" style="width:451px;">RECHERCHER DES INFORMATIONS SUR CE JOUEUR</button>
				</form>
			</div>

			<div class="pare cinquante">
				<div class="title">GRADER UN JOUEUR</div>
				<form>
					<input type="text" id="pseudo" placeholder="Entre le pseudo du joueur a grader" style="width: 430px;margin-left: 10px;margin-top: 5px;margin-bottom: 5px;height: 34px;padding: 3px 10px;font-size: 14px;line-height: 1.42857143;color: #555;background-color: #fff;background-image: none;border: 1px solid #ccc;border-radius: 4px;">
					<select id="grade" style="width: 450px;margin-left: 10px;margin-top: 5px;margin-bottom: 5px;height: 34px;padding: 3px 10px;font-size: 14px;line-height: 1.42857143;color: #555;background-color: #fff;background-image: none;border: 1px solid #ccc;border-radius: 4px;">
						<?php
                        $TR = $bdd->query('SELECT * FROM ranks');
                        while($DTR = $TR->fetch()) {
                        ?>
						<option value="<?php echo intval($DTR['id']); ?>"><?php echo htmlspecialchars($DTR['name']); ?></option>
						<?php } ?>
					</select>
					<button type="submit" id="grade_joueur" class="loginbtn" style="width:451px;">GRADER CETTE PERSONNE DANS L'EQUIPE</button>
				</form>
			</div>
			<?php } else { ?>
			<div class="pare cent">
				<div class="title">MODIFICATIONS DU JOUEUR <?php echo $pseudo; ?></div>
				<form>
					<input type="text" value="ID : <?php echo intval($DTU['id']); ?>" disabled style="width: 447px;margin-left: 10px;margin-top: 5px;margin-bottom: 5px;height: 34px;padding: 3px 10px;font-size: 14px;line-height: 1.42857143;color: #555;background-color: #fff;background-image: none;border: 1px solid #ccc;border-radius: 4px;">
					<input type="hidden" id="id" value="<?php echo intval($DTU['id']); ?>">
					<input type="text" value="<?php echo htmlspecialchars($DTU['username']); ?>" disabled style="width: 447px;margin-left: 10px;margin-top: 5px;margin-bottom: 5px;height: 34px;padding: 3px 10px;font-size: 14px;line-height: 1.42857143;color: #555;background-color: #fff;background-image: none;border: 1px solid #ccc;border-radius: 4px;">
					<input type="number" id="credits" value="<?php echo intval($DTU['credits']); ?>" minlength="1" maxlength="9999999" required placeholder="Entre le nombre de crédits du joueur" style="width: 447px;margin-left: 10px;margin-top: 5px;margin-bottom: 5px;height: 34px;padding: 3px 10px;font-size: 14px;line-height: 1.42857143;color: #555;background-color: #fff;background-image: none;border: 1px solid #ccc;border-radius: 4px;">
					<input type="number" id="duckets" value="<?php echo intval($DTU['activity_points']); ?>" minlength="1" maxlength="9999999" required placeholder="Entre le nombre de duckets du joueur" style="width: 447px;margin-left: 10px;margin-top: 5px;margin-bottom: 5px;height: 34px;padding: 3px 10px;font-size: 14px;line-height: 1.42857143;color: #555;background-color: #fff;background-image: none;border: 1px solid #ccc;border-radius: 4px;">
					<input type="number" id="diamants" value="<?php echo intval($DTU['vip_points']); ?>" minlength="1" maxlength="9999999" required placeholder="Entre le nombre de diamants du joueur" style="width: 447px;margin-left: 10px;margin-top: 5px;margin-bottom: 5px;height: 34px;padding: 3px 10px;font-size: 14px;line-height: 1.42857143;color: #555;background-color: #fff;background-image: none;border: 1px solid #ccc;border-radius: 4px;">
					<input type="text" value="DERNIERE CONNEXION : <?php echo strftime("%d %B %Y à %H:%M", $DTU['last_offline']); ?>" disabled style="width: 447px;margin-left: 10px;margin-top: 5px;margin-bottom: 5px;height: 34px;padding: 3px 10px;font-size: 14px;line-height: 1.42857143;color: #555;background-color: #fff;background-image: none;border: 1px solid #ccc;border-radius: 4px;">
					<input type="text" value="IP CONNEXION : <?php echo htmlspecialchars($DTU['ip_last']); ?>" disabled style="width: 447px;margin-left: 10px;margin-top: 5px;margin-bottom: 5px;height: 34px;padding: 3px 10px;font-size: 14px;line-height: 1.42857143;color: #555;background-color: #fff;background-image: none;border: 1px solid #ccc;border-radius: 4px;">
					<input type="text" value="IP INSCRIPTION : <?php echo htmlspecialchars($DTU['ip_reg']); ?>" disabled style="width: 447px;margin-left: 10px;margin-top: 5px;margin-bottom: 5px;height: 34px;padding: 3px 10px;font-size: 14px;line-height: 1.42857143;color: #555;background-color: #fff;background-image: none;border: 1px solid #ccc;border-radius: 4px;">
					<button type="submit" id="modifications_joueur" class="loginbtn" style="width:951px;">MODIFIER LES INFORMATIONS DE CE JOUEUR</button>
				</form>
			</div>
			<?php } ?>
			<br clear="both">
			<?php require_once('../footer.php'); ?>
		</div>
	</body>
</html>