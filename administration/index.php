<?php
require_once('../configurations.php');

if(!isset($_SESSION['id']))
{
	header('Location: '.$lien.'/connexion');
	exit();
}

if($_SESSION['rank'] <= 4)
{
	header('Location: '.$lien.'/profil');
	exit();
}

$pageid = 1;
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title><?php echo $nom; ?>: Administration</title>
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
				<div class="title">LES 30 DERNIERES ACTIONS EFFECTUES DANS L'ADMINISTRATION</div>
				<table class="table table-responsive table-bordered">
				  	<thead>
				    	<tr>
				      		<th>#</th>
				      		<th>Pseudo</th>
				      		<th>Action</th>
				      		<th>Date</th>
				    	</tr>
				  	</thead>
				  	<tbody>
				  		<?php
				  		$TCCL = $bdd->query('SELECT * FROM cms_configs_logs ORDER BY id DESC LIMIT 30');
				  		while($DTCCL = $TCCL->fetch()) {
				  		?>
				    	<tr>
				      		<th scope="row"><?php echo intval($DTCCL['id']); ?></th>
				      		<th scope="row"><?php echo htmlspecialchars($DTCCL['pseudo']); ?></th>
				      		<th scope="row"><?php echo htmlspecialchars($DTCCL['action']); ?></th>
				      		<th scope="row"><?php echo strftime("%d %B %Y à %H:%M", $DTCCL['date']); ?></th>
				    	</tr>
				    	<?php } ?>
				   	</tbody>
				</table><?php if($TCCL->rowCount() == 0) { ?><center>Il n'y a aucune action récente pour le moment.</center><?php } ?>
			</div>
			<br clear="both">
			<?php require_once('../footer.php'); ?>
		</div>
	</body>
</html>