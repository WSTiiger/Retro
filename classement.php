<?php
require_once('configurations.php');

if(!isset($_SESSION['id']))
{
	header('Location: '.$lien.'/connexion');
	exit();
}

$pageid = 6;
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title><?php echo $nom; ?>: Classement</title>
		<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto">
		<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">
		<link rel="stylesheet" type="text/css" href="<?php echo $lien; ?>/web/theme.css">
		<link rel="shortcut icon" href="<?php echo $lien; ?>/web/favicon.png">
	</head>
	<body>
		<?php require_once('header.php'); ?>
		<div class="content">
			<div class="pare vingtcinq">
				<div class="title" style="margin-bottom: 0px;">CLASSEMENT CRÉDITS</div>
				<?php
				$TU = $bdd->query('SELECT * FROM users ORDER BY credits LIMIT 25');
				while($DTU = $TU->fetch()) {
				?>
				<div style="float: left;height: 65px;width: 70px;margin-right: -5px;background: url(https://avatar-retro.com/habbo-imaging/avatarimage?figure=<?php echo htmlspecialchars($DTU['look']); ?>&gesture=sml&head_direction=3&size=m);position: relative;top: -10px;margin-left: 5px;""></div>
				<div style="float: left;margin-top: 15px;"><b><?php echo htmlspecialchars($DTU['username']); ?></b><br>
					<div style="margin-top: 3px;"><?php echo intval($DTU['credits']); ?> crédits</div>
				</div>
				<div style="float: right;margin-top: 23px;margin-right: 10px;">
					<?php if($DTU['online'] == 0) { ?><img src="<?php echo $lien; ?>/web/offline.gif"><?php } elseif($DTU['online'] == 1) { ?><img src="<?php echo $lien; ?>/web/online.gif"><?php } ?>
				</div>
				<br clear="both">
				<div style="height: 1px;border-bottom: 1px solid #dedede;margin-left: 10px;margin-right: 10px;"></div>
				<?php } ?>
			</div>

			<div class="pare vingtcinq">
				<div class="title" style="margin-bottom: 0px;">CLASSEMENT DUCKETS</div>
				<?php
				$TU = $bdd->query('SELECT * FROM users ORDER BY activity_points LIMIT 25');
				while($DTU = $TU->fetch()) {
				?>
				<div style="float: left;height: 65px;width: 70px;margin-right: -5px;background: url(https://avatar-retro.com/habbo-imaging/avatarimage?figure=<?php echo htmlspecialchars($DTU['look']); ?>&gesture=sml&head_direction=3&size=m);position: relative;top: -10px;margin-left: 5px;""></div>
				<div style="float: left;margin-top: 15px;"><b><?php echo htmlspecialchars($DTU['username']); ?></b><br>
					<div style="margin-top: 3px;"><?php echo intval($DTU['activity_points']); ?> duckets</div>
				</div>
				<div style="float: right;margin-top: 23px;margin-right: 10px;">
					<?php if($DTU['online'] == 0) { ?><img src="<?php echo $lien; ?>/web/offline.gif"><?php } elseif($DTU['online'] == 1) { ?><img src="<?php echo $lien; ?>/web/online.gif"><?php } ?>
				</div>
				<br clear="both">
				<div style="height: 1px;border-bottom: 1px solid #dedede;margin-left: 10px;margin-right: 10px;"></div>
				<?php } ?>
			</div>

			<div class="pare vingtcinq">
				<div class="title" style="margin-bottom: 0px;">CLASSEMENT DIAMANTS</div>
				<?php
				$TU = $bdd->query('SELECT * FROM users ORDER BY vip_points LIMIT 25');
				while($DTU = $TU->fetch()) {
				?>
				<div style="float: left;height: 65px;width: 70px;margin-right: -5px;background: url(https://avatar-retro.com/habbo-imaging/avatarimage?figure=<?php echo htmlspecialchars($DTU['look']); ?>&gesture=sml&head_direction=3&size=m);position: relative;top: -10px;margin-left: 5px;""></div>
				<div style="float: left;margin-top: 15px;"><b><?php echo htmlspecialchars($DTU['username']); ?></b><br>
					<div style="margin-top: 3px;"><?php echo intval($DTU['vip_points']); ?> diamants</div>
				</div>
				<div style="float: right;margin-top: 23px;margin-right: 10px;">
					<?php if($DTU['online'] == 0) { ?><img src="<?php echo $lien; ?>/web/offline.gif"><?php } elseif($DTU['online'] == 1) { ?><img src="<?php echo $lien; ?>/web/online.gif"><?php } ?>
				</div>
				<br clear="both">
				<div style="height: 1px;border-bottom: 1px solid #dedede;margin-left: 10px;margin-right: 10px;"></div>
				<?php } ?>
			</div>
			<br clear="both">
			<?php require_once('footer.php'); ?>
		</div>
	</body>
</html>