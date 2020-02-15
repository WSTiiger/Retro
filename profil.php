<?php
require_once('configurations.php');

if(!isset($_SESSION['id']))
{
	header('Location: '.$lien.'/connexion');
	exit();
}

$pageid = 3;
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title><?php echo $nom; ?>: Profil</title>
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
			<div class="pare vingtcinq">
				<div class="title">LA RADIO</div>
				<div style="margin-left: 10px;margin-right: 10px;">
					<script type="text/javascript" src="https://hosted.muses.org/mrp.js"></script>
					<center><script type="text/javascript">MRP.insert({'url':'http://listen.radionomy.com/vibratoradio','lang':'fr','codec':'mp3','volume':15,'autoplay':true,'forceHTML5':true,'jsevents':true,'buffering':0,'title':'VibratoRadio','welcome':'Bienvenue !','wmode':'transparent','skin':'faredirfare','width':269,'height':52});</script><i><small>Rejoins VibratoRadio en cliquant <a href="https://www.radionomy.com/fr/radio/vibratoradio/index" target="_blank">ici</a> !</small></i></center>
				</div>
			</div>

			<div class="pare soixantequinze" style="background: none;box-shadow: none;padding: 0;width: 656.7px;">
				<div style="height: 145px;background: url(<?php echo $lien; ?>/web/equipe.png);background-position: 65% 22%;">
					<a href="client" target="_blank">
						<div style="float: left;padding: 10px;width: 170px;text-align: center;background: #019201;font-size: 19px;border: 2px solid #148a14;color: white;border-radius: 3px;margin-top: 25px;margin-left: 50px;text-transform: uppercase;">ENTRER SUR <?php echo $nom; ?> !</div>
					</a>
					<div style="position: relative;float: right;background: url('https://avatar-retro.com/habbo-imaging/avatarimage?figure=<?php echo $_SESSION['look']; ?>&gesture=sml&head_direction=4&direction=4&size=l');width: 100px;height: 175px;margin-top: -30px;margin-right: 20px;-webkit-filter: drop-shadow(2px 0 0 #ffffff) drop-shadow(-2px 0 0 #ffffff) drop-shadow(0 -2px 0 #ffffff);"></div>
				</div>
				<div style="padding: 10px;text-align: center;background: #CCA923;color: white;width: 198.8px;float: left;border-bottom-left-radius: 3px;"><?php echo $_SESSION['credits']; ?> crédits</div>
				<div style="padding: 10px;text-align: center;background: #D686D6;color: white;width: 198.8px;float: left;"><?php echo $_SESSION['duckets']; ?> duckets</div>
				<div style="padding: 10px;text-align: center;background: #36C3E3;color: white;width: 198.8px;float: left;border-bottom-right-radius: 3px;"><?php echo $_SESSION['diamants']; ?> diamants</div>
			</div>

			<br clear="both">
			<div class="pare vingtcinq" style="position: relative;top: -55px;">
				<div class="title">CHANGER SON MOT DE PASSE</div>
				<form>
					<input type="password" id="mypassword" placeholder="Entre ton mot de passe" minlength="8" required style="width: 260px;margin-left: 10px;margin-top: 5px;margin-bottom: 5px;height: 34px;padding: 3px 10px;font-size: 14px;line-height: 1.42857143;color: #555;background-color: #fff;background-image: none;border: 1px solid #ccc;border-radius: 4px;">
					<input type="password" id="newpassword" placeholder="Entre ton nouveau mot de passe" minlength="8" required style="width: 260px;margin-left: 10px;margin-top: 5px;margin-bottom: 5px;height: 34px;padding: 3px 10px;font-size: 14px;line-height: 1.42857143;color: #555;background-color: #fff;background-image: none;border: 1px solid #ccc;border-radius: 4px;">
					<input type="password" id="renewpassword" placeholder="Retape ton nouveau mot de passe" minlength="8" required style="width: 260px;margin-left: 10px;margin-top: 5px;margin-bottom: 5px;height: 34px;padding: 3px 10px;font-size: 14px;line-height: 1.42857143;color: #555;background-color: #fff;background-image: none;border: 1px solid #ccc;border-radius: 4px;">
					<button type="submit" id="change_password" class="loginbtn">MODIFIER MON MOT DE PASSE</button>
				</form>
			</div>

			<div class="pare soixantequinze" style="background: none;box-shadow: none;padding: 0;width: 656.7px;">
				<div id="slides" style="margin-bottom: -39px;">
					<?php
					$CA = $bdd->query('SELECT * FROM cms_articles ORDER BY id DESC LIMIT 5');
					while($DCA = $CA->fetch()) { ?>
					<div style="position: relative;width: 100%;">
						<img src="<?php echo htmlspecialchars($DCA['url_image']); ?>" style="border-radius: 3px;">
						<div style="position: relative;float: left;top: -255px;left: 25px;color: white;width: 525px;text-shadow: 0 1px 3px #000;font-size: 30px;word-break: break-all;"><?php echo htmlspecialchars($DCA['titre']); ?><br/>
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