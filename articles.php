<?php
require_once('configurations.php');

if(!isset($_SESSION['id']))
{
	header('Location: '.$lien.'/connexion');
	exit();
}

$pageid = 4;
$article = "false";

if(isset($_GET['article']) AND !empty($_GET['article']))
{
	$article = intval($_GET['article']);
	$CA = $bdd->prepare('SELECT * FROM cms_articles WHERE id = ?');
	$CA->execute(array($article));
	if($CA->rowCount() == 1)
	{
		$DCA_2 = $CA->fetch();
		$article = "true";
	}
	else
	{
		$article = "false";
	}
}
else
{
	$article = "false";
}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title><?php echo $nom; ?>: Articles</title>
		<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto">
		<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">
		<link rel="stylesheet" type="text/css" href="<?php echo $lien; ?>/web/theme.css">
		<link rel="shortcut icon" href="<?php echo $lien; ?>/web/favicon.png">
	</head>
	<body>
		<?php require_once('header.php'); ?>
		<div class="content">
			<div class="pare vingtcinq">
				<div class="title">LES 20 DÈRNIERS ARTICLES</div>
				<div style="margin-left: 10px;margin-right: 10px;margin-top: 10px;">
					<?php
					$CA = $bdd->query('SELECT * FROM cms_articles ORDER BY id DESC LIMIT 20');
					if($CA->rowCount() == 0)
					{
						echo '<center>Il n\'y a pas d\'article pour le moment.</center>';
					}
					while($DCA = $CA->fetch()) {
					?>
					<a href="<?php echo $lien; ?>/articles/<?php echo intval($DCA['id']); ?>" style="color: #fc6204;text-decoration: none;font-size: 15px;margin-bottom: 3px;width:200px;word-break: break-all;">
						<?php echo htmlspecialchars($DCA['titre']); ?>
					</a>
					<div style="margin-bottom: 5px"></div>
					<?php } ?>
				</div>
			</div>

			<?php if(isset($article) AND $article == "false") { ?>
			<div class="pare soixantequinze">
				<div style="margin-left: 10px;margin-right: 10px;margin-top: 10px;font-size: 15px;">
					<center>
						<img src="http://hsource.fr/font/habbo/articles%20<?php echo $nom; ?>.gif">
					</center><br/>
					<?php
					$CA = $bdd->query('SELECT * FROM cms_articles ORDER BY id DESC LIMIT 50');
					if($CA->rowCount() == 0)
					{
						echo '<center>Il n\'y a pas d\'article pour le moment.</center>';
					}
					while($DCA = $CA->fetch()) {
					?>
					NEWS [~] : <a href="<?php echo $lien; ?>/articles/<?php echo intval($DCA['id']); ?>" style="color: #fc6204;text-decoration: none;font-size: 15px;margin-bottom: 3px;"><?php echo htmlspecialchars($DCA['titre']); ?></a><br/>
					<?php } ?>
				</div>
			</div>
			<?php } else { ?>
			<div class="pare soixantequinze">
				<div class="title"><?php echo htmlspecialchars($DCA_2['titre']); ?></div>
				<div style="margin-left: 10px;margin-right: 10px;">
					<div style="background: url('<?php echo htmlspecialchars($DCA_2['url_image']); ?>');width: 100%;height: 130px;"></div>
					<p><?php echo htmlspecialchars_decode($DCA_2['contenu']); ?></p>
					<p>
						Cette article a été redigé par <strong><?php echo htmlspecialchars($DCA_2['auteur']); ?></strong>, le <strong><?php echo strftime("%d %B %Y à %H:%M", $DCA_2['date']); ?></strong>.
					</p>
				</div>
			</div>
			<?php } ?>
			<br clear="both">
			<?php require_once('footer.php'); ?>
		</div>
	</body>
</html>