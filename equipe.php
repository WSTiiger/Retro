<?php
require_once('configurations.php');

if(!isset($_SESSION['id']))
{
	header('Location: '.$lien.'/connexion');
	exit();
}

$pageid = 5;
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title><?php echo $nom; ?>: Équipe</title>
		<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto">
		<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">
		<link rel="stylesheet" type="text/css" href="<?php echo $lien; ?>/web/theme.css">
		<link rel="shortcut icon" href="<?php echo $lien; ?>/web/favicon.png">
	</head>
	<body>
		<?php require_once('header.php'); ?>
		<div class="content">
			<div class="pare cent">
				<div class="title">Fondateurs</div>
				<?php
				$TU = $bdd->prepare('SELECT * FROM users WHERE rank = ?');
				$TU->execute(array("8"));
				if($TU->rowCount() == 0)
				{
					echo '
						<div style="margin-left: 10px;margin-right: 10px;margin-bottom: 10px;">
							Aucun fondateur pour le moment.
						</div>
					';
				}
				while($DTU = $TU->fetch()) {
				?>
				<div style="margin-left: 10px;margin-right: 10px;margin-bottom: 10px;">
					<div style="float: left;margin-right: 10px;width: 160px;margin-top: 10px;box-shadow: 0px 0px 2px rgb(82, 79, 79);padding: 10px;border-radius: 3px;">
						<center>
							<div style="border-radius: 100%;height: 115px;width: 115px;background: url(<?php echo $lien; ?>/web/equipe.png);overflow: hidden;border: 2px solid rgb(82, 79, 79);margin-bottom: 5px;">
								<div style="background: url('https://avatar-retro.com/habbo-imaging/avatarimage?figure=<?php echo htmlspecialchars($DTU['look']); ?>&gesture=sml&head_direction=3&direction=3&size=l');height: 160px;width: 115px;margin-left: -15px;top: -30px;position: relative;-webkit-filter: drop-shadow(2px 0 0 #ffffff) drop-shadow(-2px 0 0 #ffffff) drop-shadow(0 -2px 0 #ffffff);"></div>
							</div>
							<div style="float: left;padding: 10px;box-shadow: 0px 0px 2px rgb(82, 79, 79);text-align: center;border-radius: 3px;width: calc(100% - 20px);margin-top: 5px"><?php echo htmlspecialchars($DTU['username']); ?></div>
						</center>
					</div>
				</div>
				<?php } ?>
			</div>

			<div class="pare cent">
				<div class="title">Administrateurs</div>
				<?php
				$TU = $bdd->prepare('SELECT * FROM users WHERE rank = ?');
				$TU->execute(array("7"));
				if($TU->rowCount() == 0)
				{
					echo '
						<div style="margin-left: 10px;margin-right: 10px;margin-bottom: 10px;">
							Aucun administrateur pour le moment.
						</div>
					';
				}
				while($DTU = $TU->fetch()) {
				?>
				<div style="margin-left: 10px;margin-right: 10px;margin-bottom: 10px;">
					<div style="float: left;margin-right: 10px;width: 160px;margin-top: 10px;box-shadow: 0px 0px 2px rgb(82, 79, 79);padding: 10px;border-radius: 3px;">
						<center>
							<div style="border-radius: 100%;height: 115px;width: 115px;background: url(<?php echo $lien; ?>/web/equipe.png);overflow: hidden;border: 2px solid rgb(82, 79, 79);margin-bottom: 5px;">
								<div style="background: url('https://avatar-retro.com/habbo-imaging/avatarimage?figure=<?php echo htmlspecialchars($DTU['look']); ?>&gesture=sml&head_direction=3&direction=3&size=l');height: 160px;width: 115px;margin-left: -15px;top: -30px;position: relative;-webkit-filter: drop-shadow(2px 0 0 #ffffff) drop-shadow(-2px 0 0 #ffffff) drop-shadow(0 -2px 0 #ffffff);"></div>
							</div>
							<div style="float: left;padding: 10px;box-shadow: 0px 0px 2px rgb(82, 79, 79);text-align: center;border-radius: 3px;width: calc(100% - 20px);margin-top: 5px"><?php echo htmlspecialchars($DTU['username']); ?></div>
						</center>
					</div>
				</div>
				<?php } ?>
			</div>

			<div class="pare cent">
				<div class="title">Animateurs</div>
				<?php
				$TU = $bdd->prepare('SELECT * FROM users WHERE rank = ?');
				$TU->execute(array("6"));
				if($TU->rowCount() == 0)
				{
					echo '
						<div style="margin-left: 10px;margin-right: 10px;margin-bottom: 10px;">
							Aucun animateur pour le moment.
						</div>
					';
				}
				while($DTU = $TU->fetch()) {
				?>
				<div style="margin-left: 10px;margin-right: 10px;margin-bottom: 10px;">
					<div style="float: left;margin-right: 10px;width: 160px;margin-top: 10px;box-shadow: 0px 0px 2px rgb(82, 79, 79);padding: 10px;border-radius: 3px;">
						<center>
							<div style="border-radius: 100%;height: 115px;width: 115px;background: url(<?php echo $lien; ?>/web/equipe.png);overflow: hidden;border: 2px solid rgb(82, 79, 79);margin-bottom: 5px;">
								<div style="background: url('https://avatar-retro.com/habbo-imaging/avatarimage?figure=<?php echo htmlspecialchars($DTU['look']); ?>&gesture=sml&head_direction=3&direction=3&size=l');height: 160px;width: 115px;margin-left: -15px;top: -30px;position: relative;-webkit-filter: drop-shadow(2px 0 0 #ffffff) drop-shadow(-2px 0 0 #ffffff) drop-shadow(0 -2px 0 #ffffff);"></div>
							</div>
							<div style="float: left;padding: 10px;box-shadow: 0px 0px 2px rgb(82, 79, 79);text-align: center;border-radius: 3px;width: calc(100% - 20px);margin-top: 5px"><?php echo htmlspecialchars($DTU['username']); ?></div>
						</center>
					</div>
				</div>
				<?php } ?>
			</div>

			<div class="pare cent">
				<div class="title">Modérateurs</div>
				<?php
				$TU = $bdd->prepare('SELECT * FROM users WHERE rank = ?');
				$TU->execute(array("5"));
				if($TU->rowCount() == 0)
				{
					echo '
						<div style="margin-left: 10px;margin-right: 10px;margin-bottom: 10px;">
							Aucun modérateur pour le moment.
						</div>
					';
				}
				while($DTU = $TU->fetch()) {
				?>
				<div style="margin-left: 10px;margin-right: 10px;margin-bottom: 10px;">
					<div style="float: left;margin-right: 10px;width: 160px;margin-top: 10px;box-shadow: 0px 0px 2px rgb(82, 79, 79);padding: 10px;border-radius: 3px;">
						<center>
							<div style="border-radius: 100%;height: 115px;width: 115px;background: url(<?php echo $lien; ?>/web/equipe.png);overflow: hidden;border: 2px solid rgb(82, 79, 79);margin-bottom: 5px;">
								<div style="background: url('https://avatar-retro.com/habbo-imaging/avatarimage?figure=<?php echo htmlspecialchars($DTU['look']); ?>&gesture=sml&head_direction=3&direction=3&size=l');height: 160px;width: 115px;margin-left: -15px;top: -30px;position: relative;-webkit-filter: drop-shadow(2px 0 0 #ffffff) drop-shadow(-2px 0 0 #ffffff) drop-shadow(0 -2px 0 #ffffff);"></div>
							</div>
							<div style="float: left;padding: 10px;box-shadow: 0px 0px 2px rgb(82, 79, 79);text-align: center;border-radius: 3px;width: calc(100% - 20px);margin-top: 5px"><?php echo htmlspecialchars($DTU['username']); ?></div>
						</center>
					</div>
				</div>
				<?php } ?>
			</div>
			<br clear="both">
			<?php require_once('footer.php'); ?>
		</div>
	</body>
</html>