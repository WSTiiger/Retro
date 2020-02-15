<?php
require_once('configurations.php');

if(!isset($_SESSION['id']))
{
	header('Location: '.$lien.'/connexion');
	exit();
}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title><?php echo $nom; ?>: Hôtel</title>
		<link rel="shortcut icon" href="<?php echo $lien; ?>/web/favicon.png">
		<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto">
		<script src="<?php echo $lien; ?>/web/client_flash.js"></script>
		<script src="<?php echo $lien; ?>/web/flashclient.js" type="text/javascript"></script>
	</head>
	<body style="background: black;">
		<center>
			<div id="client-ui">
				<div id="client" style='position:absolute; left:0; right:0; top:0; bottom:0; overflow:hidden; height:100%; width:100%;color: white;font-family: Roboto;'>
					<div style="position: absolute;left:0; right:0; top:30%; bottom:0;">
						<img src="https://hsource.fr/font/habbo_new/<?php echo $nom; ?>.gif"><br><br>
						Pour pouvoir jouer à <?php echo $nom; ?> suivez ces étapes :<br/><br><br>
						<b>*WINDOWS / LINUX / MAC*<br/></b>
						Merci de mettre la dernière version d'Adobe Flash Player en cliquant <a href="//get.adobe.com/flashplayer/?loc=fr/" style="text-decoration: none;color: white;font-weight: bold;">ici</a><br/><br><br>
						<b>*TABLETTE / TÉLÉPHONE*<br/></b>
						- Installer l'application <b>Puffin</b> disponible sur le <b>Apple Store</b>, ou encore sur le <b>Play Store</b>
					</div>
				</div>

				<script>
					var Client = new SWFObject("<?php echo htmlspecialchars($TCCS['habbo_swf']); ?>", "client", "100%", "100%", "10.0.0");
					Client.addVariable("client.allow.cross.domain", "0"); 
					Client.addVariable("client.notify.cross.domain", "1");
					Client.addVariable("connection.info.host", "<?php echo htmlspecialchars($TCCS['ip_vps']); ?>");
					Client.addVariable("connection.info.port", "<?php echo htmlspecialchars($TCCS['port_emu']); ?>");
					Client.addVariable("site.url", "<?php echo $lien; ?>/client");
					Client.addVariable("url.prefix", "<?php echo $lien; ?>/client"); 
					Client.addVariable("client.reload.url", "<?php echo $lien; ?>/client");
					Client.addVariable("client.fatal.error.url", "<?php echo $lien; ?>/client");
					Client.addVariable("client.connection.failed.url", "<?php echo $lien; ?>/client");
					Client.addVariable("external.variables.txt", "<?php echo htmlspecialchars($TCCS['external_variables']); ?>");
					Client.addVariable("external.texts.txt", "<?php echo htmlspecialchars($TCCS['external_flash_texts']); ?>");  
					Client.addVariable("external.override.variables.txt", "http://localhost/game/gamedata/external_override_variables.txt");
					Client.addVariable("productdata.load.url", "<?php echo htmlspecialchars($TCCS['productdata']); ?>"); 
					Client.addVariable("furnidata.load.url", "<?php echo htmlspecialchars($TCCS['furnidata']); ?>");
					Client.addVariable("use.sso.ticket", "1"); 
					Client.addVariable("sso.ticket", "<?php if($_SESSION['id'] > 0) { $base = ""; for($i = 1; $i <= 3; $i++): { $base = $base . rand(0,99); $base = uniqid($base); } endfor; $base = $base . ""; $TU = $bdd->prepare('UPDATE users SET auth_ticket = ? WHERE id = ?'); $TU->execute(array($base, $_SESSION['id'])); echo $base; } ?>");
					Client.addVariable("processlog.enabled", "0");
					Client.addVariable("client.starting", "Chargement de <?php echo $nom; ?>...");
					Client.addVariable("flash.client.url", "<?php echo htmlspecialchars($TCCS['base_habbo_swf']); ?>"); 
					Client.addVariable("user.hash", ""); 
					Client.addVariable("flash.client.origin", "popup");
					Client.addVariable("nux.lobbies.enabled", "true");
					Client.addVariable("country_code", "FR");
					Client.addParam('base', '<?php echo htmlspecialchars($TCCS['base_habbo_swf']); ?>');
					Client.addParam('allowScriptAccess', 'always');
					Client.addParam('menu', false);
					Client.addParam('wmode', "opaque");
					Client.write('client');
					FlashExternalInterface.signoutUrl = "<?php echo $lien; ?>/client";
				</script>
			</div>
		</center>
	</body>
</html>