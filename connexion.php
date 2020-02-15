<?php
require_once('configurations.php');

if(isset($_SESSION['id']))
{
	header('Location: '.$lien.'/profil.php');
	exit();
}

$pageid = 1;
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title><?php echo $nom; ?>: Connexion</title>
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
		<?php if(isset($_SESSION['deconnexion']) AND $_SESSION['deconnexion'] == "oui") { ?>
		<div style="height: 40px;width: 100%;background: #019201;line-height: 40px;text-align: center;color: white;box-shadow: 0px 0px 2px rgba(0,0,0,0.43);font-size: 17px;">Tu as bien été déconnecté, à bientôt !</div>
		<?php unset($_SESSION['deconnexion']); ?>
		<?php } ?>
		<?php require_once('header.php'); ?>
		<div class="content">
			<div class="pare vingtcinq">
				<div class="title">CONNEXION À <?php echo $nom; ?></div>
				<form>
					<input type="text" id="pseudo" placeholder="Entre ton pseudo" required style="width: 260px;margin-left: 10px;margin-top: 5px;margin-bottom: 5px;height: 34px;padding: 3px 10px;font-size: 14px;line-height: 1.42857143;color: #555;background-color: #fff;background-image: none;border: 1px solid #ccc;border-radius: 4px;">
					<input type="password" id="password" placeholder="Entre ton mot de passe" required style="width: 260px;margin-left: 10px;margin-top: 5px;margin-bottom: 5px;height: 34px;padding: 3px 10px;font-size: 14px;line-height: 1.42857143;color: #555;background-color: #fff;background-image: none;border: 1px solid #ccc;border-radius: 4px;">
					<button type="submit" id="connexion" class="loginbtn">SE CONNECTER</button>
				</form>
				<a href="<?php echo $lien; ?>/inscription"><button class="regbtn">INSCRIPTION</button></a>
				<br clear="both">
			</div>

			<div class="pare soixantequinze" style="background: none;box-shadow: none;padding: 0;width: 656.7px;">
				<div id="slides" style="margin-bottom: -39px;">
					<?php
					$CA = $bdd->query('SELECT * FROM cms_articles ORDER BY id DESC LIMIT 5');
					while($DCA = $CA->fetch()) {
					?>
					<div style="position: relative;width: 100%;">
						<img src="<?php echo htmlspecialchars($DCA['url_image']); ?>" style="border-radius: 3px;">
						<div style="position: relative;float: left;top: -255px;left: 25px;color: white;width: 535px;text-shadow: 0 1px 3px #000;font-size: 30px;word-break: break-all;"><?php echo htmlspecialchars($DCA['titre']); ?><br/>
							<div style="font-size:13px;margin-top: 5px;width: auto;word-break: break-all;"><?php echo htmlspecialchars($DCA['description']); ?></div>
						</div>
						<div style="position: absolute;float: right;right: 10px;top: 215px;">
							<a href="<?php echo $lien; ?>/articles/<?php echo intval($DCA['id']); ?>" style="text-decoration: none;">
								<div style="padding: 10px;width: 100px;text-align: center;background: #019201;border: 2px solid #148a14;color: white;border-radius: 3px;">Lire la suite</div>
							</a>
						</div>
					</div>
					<?php } ?>
	
					<a href="#" class="slidesjs-previous slidesjs-navigation">
						<i class="icon-chevron-left"></i>
					</a>
					<a href="#" class="slidesjs-next slidesjs-navigation">
						<i class="icon-chevron-right"></i>
					</a>
				</div>

				<script>
					$(function() {
						$('#slides').slidesjs({
							width: 940,
							height: 380,
							navigation: true
						});
					});
				</script>
			</div>
			<br clear="both">
			<?php require_once('footer.php'); ?>
		</div>
	</body>
</html>