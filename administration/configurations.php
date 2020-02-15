<?php
require_once('../configurations.php');

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

$pageid = 2;
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title><?php echo $nom; ?>: Configurations</title>
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
			<div class="pare cinquante">
				<div class="title">CONFIGURATIONS DU SITE</div>
				<form>
					<input type="text" id="nom_site" value="<?php echo $nom; ?>" placeholder="Entre le nom du site" required style="width: 430px;margin-left: 10px;margin-top: 5px;margin-bottom: 5px;height: 34px;padding: 3px 10px;font-size: 14px;line-height: 1.42857143;color: #555;background-color: #fff;background-image: none;border: 1px solid #ccc;border-radius: 4px;">
					<input type="text" id="lien_site" value="<?php echo $lien; ?>" placeholder="Entre le lien du site" required style="width: 430px;margin-left: 10px;margin-top: 5px;margin-bottom: 5px;height: 34px;padding: 3px 10px;font-size: 14px;line-height: 1.42857143;color: #555;background-color: #fff;background-image: none;border: 1px solid #ccc;border-radius: 4px;">
					<button type="submit" id="configurations_site" class="loginbtn" style="width:451px;">MODIFIER LES CONFIGURATIONS DU SITE</button>
				</form>
			</div>

			<div class="pare cinquante">
				<div class="title">CONFIGURATIONS DU SERVEUR</div>
				<form>
					<input type="text" id="ip_vps" value="<?php echo htmlspecialchars($TCCS['ip_vps']); ?>" placeholder="Entre l'adresse IP du VPS" required style="width: 430px;margin-left: 10px;margin-top: 5px;margin-bottom: 5px;height: 34px;padding: 3px 10px;font-size: 14px;line-height: 1.42857143;color: #555;background-color: #fff;background-image: none;border: 1px solid #ccc;border-radius: 4px;">
					<input type="text" id="port_emu" value="<?php echo htmlspecialchars($TCCS['port_emu']); ?>" placeholder="Entre le port de l'émulateur" required style="width: 430px;margin-left: 10px;margin-top: 5px;margin-bottom: 5px;height: 34px;padding: 3px 10px;font-size: 14px;line-height: 1.42857143;color: #555;background-color: #fff;background-image: none;border: 1px solid #ccc;border-radius: 4px;">
					<input type="text" id="external_variables" value="<?php echo htmlspecialchars($TCCS['external_variables']); ?>" placeholder="Entre le lien du external_variables" required style="width: 430px;margin-left: 10px;margin-top: 5px;margin-bottom: 5px;height: 34px;padding: 3px 10px;font-size: 14px;line-height: 1.42857143;color: #555;background-color: #fff;background-image: none;border: 1px solid #ccc;border-radius: 4px;">
					<input type="text" id="external_flash_texts" value="<?php echo htmlspecialchars($TCCS['external_flash_texts']); ?>" placeholder="Entre le lien du external_flash_texts" required style="width: 430px;margin-left: 10px;margin-top: 5px;margin-bottom: 5px;height: 34px;padding: 3px 10px;font-size: 14px;line-height: 1.42857143;color: #555;background-color: #fff;background-image: none;border: 1px solid #ccc;border-radius: 4px;">
					<input type="text" id="productdata" value="<?php echo htmlspecialchars($TCCS['productdata']); ?>" placeholder="Entre le lien du productdata" required style="width: 430px;margin-left: 10px;margin-top: 5px;margin-bottom: 5px;height: 34px;padding: 3px 10px;font-size: 14px;line-height: 1.42857143;color: #555;background-color: #fff;background-image: none;border: 1px solid #ccc;border-radius: 4px;">
					<input type="text" id="furnidata" value="<?php echo htmlspecialchars($TCCS['furnidata']); ?>" placeholder="Entre le lien du furnidata" required style="width: 430px;margin-left: 10px;margin-top: 5px;margin-bottom: 5px;height: 34px;padding: 3px 10px;font-size: 14px;line-height: 1.42857143;color: #555;background-color: #fff;background-image: none;border: 1px solid #ccc;border-radius: 4px;">
					<input type="text" id="base_habbo_swf" value="<?php echo htmlspecialchars($TCCS['base_habbo_swf']); ?>" placeholder="Entre le lien de la base swf" required style="width: 430px;margin-left: 10px;margin-top: 5px;margin-bottom: 5px;height: 34px;padding: 3px 10px;font-size: 14px;line-height: 1.42857143;color: #555;background-color: #fff;background-image: none;border: 1px solid #ccc;border-radius: 4px;">
					<input type="text" id="habbo_swf" value="<?php echo htmlspecialchars($TCCS['habbo_swf']); ?>" placeholder="Entre le lien du habbo swf" required style="width: 430px;margin-left: 10px;margin-top: 5px;margin-bottom: 5px;height: 34px;padding: 3px 10px;font-size: 14px;line-height: 1.42857143;color: #555;background-color: #fff;background-image: none;border: 1px solid #ccc;border-radius: 4px;">
					<button type="submit" id="configurations_serveur" class="loginbtn" style="width:451px;">MODIFIER LES CONFIGURATIONS DU SERVEUR</button>
				</form>
			</div>
			<br clear="both">
			<?php require_once('../footer.php'); ?>
		</div>
	</body>
</html>