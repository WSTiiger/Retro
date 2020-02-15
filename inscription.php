<?php
require_once('configurations.php');

if(isset($_SESSION['id']))
{
	header('Location: '.$lien.'/profil.php');
	exit();
}
$pageid = 2;
$captcha = mt_rand(0,999999);
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title><?php echo $nom; ?>: Inscription</title>
		<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto">
		<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">
		<link rel="stylesheet" type="text/css" href="<?php echo $lien; ?>/web/theme.css">
		<link rel="shortcut icon" href="<?php echo $lien; ?>/web/favicon.png">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
		<script src='<?php echo $lien; ?>/web/form.js'></script>
		<script src='<?php echo $lien; ?>/web/slide.js'></script>
	</head>
	<body>
		<div id="reponse"></div>
		<?php require_once('header.php'); ?>
		<div class="content">
			<div class="pare soixantequinze">
				<div class="title">INSCRIS-TOI SUR <?php echo $nom; ?></div>
				<form>
					<input type="text" id="pseudo" placeholder="Entre ton pseudo" minlength="3" maxlength="30" required style="width: 595px;margin-left: 10px;margin-top: 5px;margin-bottom: 5px;height: 34px;padding: 3px 10px;font-size: 14px;line-height: 1.42857143;color: #555;background-color: #fff;background-image: none;border: 1px solid #ccc;border-radius: 4px;">
					<input type="mail" id="email" placeholder="Entre ton adresse mail" minlength="3" required style="width: 595px;margin-left: 10px;margin-top: 5px;margin-bottom: 5px;height: 34px;padding: 3px 10px;font-size: 14px;line-height: 1.42857143;color: #555;background-color: #fff;background-image: none;border: 1px solid #ccc;border-radius: 4px;">
					<input type="password" id="password" placeholder="Entre ton mot de passe" minlength="8" required style="width: 595px;margin-left: 10px;margin-top: 5px;margin-bottom: 5px;height: 34px;padding: 3px 10px;font-size: 14px;line-height: 1.42857143;color: #555;background-color: #fff;background-image: none;border: 1px solid #ccc;border-radius: 4px;">
					<input type="password" id="newpassword" placeholder="Retape ton mot de passe" minlength="8" required style="width: 595px;margin-left: 10px;margin-top: 5px;margin-bottom: 5px;height: 34px;padding: 3px 10px;font-size: 14px;line-height: 1.42857143;color: #555;background-color: #fff;background-image: none;border: 1px solid #ccc;border-radius: 4px;">
					<b src="captcha.php" style="float: left;margin-left: 10px;margin-top: 10px;font-size:25px;"><?php echo $captcha; ?></b>
					<input type="text" id="captcha" placeholder="Retape les chiffres à gauche" required style="width: 485px;margin-left: 120px;top: -35px;height: 34px;position: relative;padding: 3px 10px;font-size: 14px;line-height: 1.42857143;color: #555;background-color: #fff;background-image: none;border: 1px solid #ccc;border-radius: 4px;margin-bottom: -50px;">
					<input type="hidden" id="captcha_verif" value="<?php echo $captcha; ?>">
					<br clear="both">
					<button type="submit" id="inscription" class="loginbtn" style="width: 302px;margin-top: -15px">CONFIRMER L'INSCRIPTION</button>
				</form>
				<a href="<?php echo $lien; ?>/connexion">
					<button class="regbtn" style="width: 302px;float: right;position: absolute;margin-top: -39px;margin-left: 325px;">RETOURNER EN ARRIÉRE</button>
				</a>
			</div>

			<div class="pare vingtcinq">
				<div class="title">PSEUDO</div>
				<div style="margin-left: 10px;margin-right: 10px;">Vous pouvez choisir un pseudo qui vous permetra de vous identifier en tant que citoyen de <?php echo $nom; ?>.<br><br></div>
				<div class="title">MAIL</div>
				<div style="margin-left: 10px;margin-right: 10px;">Votre e-mail sert à recuperer votre mot de passe, elle permet aussi de rester informer de toutes les nouveautées.<br><br></div>
				<div class="title">MOT DE PASSE</div>
				<div style="margin-left: 10px;margin-right: 10px;">Il sert à vous connecter à votre compte, nous vous conseillons de jamais utiliser le même mot de passe sur tous les sites et d'inclure au moin un caractère spécial.<br></div>
			</div>
			<br clear="both">
			<?php require_once('footer.php'); ?>
		</div>
	</body>
</html>