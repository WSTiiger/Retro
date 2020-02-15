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

$pageid = 4;
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title><?php echo $nom; ?>: Création d'un article</title>
		<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto">
		<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">
		<link rel="stylesheet" type="text/css" href="<?php echo $lien; ?>/web/theme.css">
		<link rel="shortcut icon" href="<?php echo $lien; ?>/web/favicon.png">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
		<script src="https://cdn.ckeditor.com/4.5.10/full/ckeditor.js"></script>
		<script src='<?php echo $lien; ?>/web/form.js'></script>
	</head>
	<body>
		<div id="reponse"></div>
		<?php require_once('header.php'); ?>

		<div class="content">
			<div class="pare cent">
				<div class="title">CREATION D'UN ARTICLE</div>
				<form>
					<input type="text" id="titre" placeholder="Entre le titre de l'article" minlength="3" maxlength="50" required style="width: 447px;margin-left: 10px;margin-top: 5px;margin-bottom: 5px;height: 34px;padding: 3px 10px;font-size: 14px;line-height: 1.42857143;color: #555;background-color: #fff;background-image: none;border: 1px solid #ccc;border-radius: 4px;">
					<input type="text" id="description" placeholder="Entre la description de l'article" minlength="3" maxlength="255" required style="width: 447px;margin-left: 10px;margin-top: 5px;margin-bottom: 5px;height: 34px;padding: 3px 10px;font-size: 14px;line-height: 1.42857143;color: #555;background-color: #fff;background-image: none;border: 1px solid #ccc;border-radius: 4px;">
					<input type="text" id="url_image" placeholder="Entre le lien de l'image pour l'article" minlength="3" required style="width: 930px;margin-left: 10px;margin-top: 5px;margin-bottom: 5px;height: 34px;padding: 3px 10px;font-size: 14px;line-height: 1.42857143;color: #555;background-color: #fff;background-image: none;border: 1px solid #ccc;border-radius: 4px;">
					<div style="width: 950px;margin-left: 10px;margin-top: 5px;">
						<textarea id="contenu" minlength="3" required></textarea>
                    </div>
                    <script type="text/javascript">
                        CKEDITOR.replace('contenu');
                    </script>
                    <br/>
					<button type="submit" id="creation_article" class="loginbtn" style="width:951px;">CREER UN ARTICLE</button>
				</form>
			</div>
			<br clear="both">
			<?php require_once('../footer.php'); ?>
		</div>
	</body>
</html>