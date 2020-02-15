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

$pageid = 5;
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title><?php echo $nom; ?>: Supprimer un article</title>
		<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto">
		<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">
		<link rel="stylesheet" type="text/css" href="<?php echo $lien; ?>/web/theme.css">
		<link rel="shortcut icon" href="<?php echo $lien; ?>/web/favicon.png">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
		<script src='<?php echo $lien; ?>/web/form.js'></script>
	</head>
	<body>
		<style>.table{border-collapse:collapse!important}.table td,.table th{background-color:#fff!important}.table{width:100%;max-width:100%;margin-bottom:1rem}.table td,.table th{padding:.75rem;vertical-align:top;}.table thead th{vertical-align:bottom;border-bottom:2px solid #eceeef}.table tbody+tbody{border-top:2px solid #eceeef}.table .table{background-color:#fff}</style>
		<?php require_once('header.php'); ?>

		<div class="content">
			<div class="pare cent">
				<div class="title">LES 30 DERNIERES ARTICLES</div>
				<table class="table table-responsive table-bordered">
				  	<thead>
				    	<tr>
				      		<th>#</th>
				      		<th>Titre</th>
				      		<th>Posté le</th>
				      		<th>Action</th>
				    	</tr>
				  	</thead>
				  	<tbody>
				  		<?php
				  		$TCA = $bdd->query('SELECT * FROM cms_articles ORDER BY id DESC LIMIT 30');
				  		while($DTCA = $TCA->fetch()) {
				  		?>
				    	<tr>
				      		<th scope="row"><?php echo intval($DTCA['id']); ?></th>
				      		<th scope="row"><?php echo htmlspecialchars($DTCA['titre']); ?></th>
				      		<th scope="row"><?php echo strftime("%d %B %Y à %H:%M", $DTCA['date']); ?></th>
				      		<th scope="row">
				      			<form>
				      				<button type="submit" id="id_article" value="<?php echo intval($DTCA['id']); ?>" class="loginbtn">SUPPRIMER</button>
				      			</form>
				      		</th>
				    	</tr>
				    	<?php } ?>
				   	</tbody>
				</table><?php if($TCA->rowCount() == 0) { ?><center>Il n'y a aucun article pour le moment.</center><?php } ?>
			</div>
			<br clear="both">
			<?php require_once('../footer.php'); ?>
		</div>
	</body>
</html>