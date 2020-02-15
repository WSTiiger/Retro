		<noscript>
			<div style="height: 40px;width: 100%;background: #d01f1f;line-height: 40px;text-align: center;color: white;box-shadow: 0px 0px 2px rgba(0,0,0,0.43);font-size: 17px;">Merci d'activer JavaScript afin d'accéder au divers fonctionnalité du site.</div>
		</noscript>
		<div id="reponse"></div>
		<header>
			<div class="content">
				<div class="logo">
					<img src="https://hsource.fr/font/habbo_new/<?php echo $nom; ?>.gif">
				</div>
				<div class="information"><b><?php echo intval($TSS['users_online']); ?></b> <?php echo $nom; ?>'s en-ligne !</div>
			</div>
		</header>

		<div class="nav">
			<div class="content">
				<ul>
					<?php if(isset($_SESSION['id'])) { ?>
					<?php if($_SESSION['rank'] >= 5) { ?><a href="<?php echo $lien; ?>/administration/index"><li <?php if(isset($pageid) AND $pageid == 1) { ?>class="current"<?php } ?>><i class="zmdi zmdi-account"></i> LOGS</li></a><?php } ?>
					<?php if($_SESSION['rank'] == 8) { ?><a href="<?php echo $lien; ?>/administration/configurations"><li <?php if(isset($pageid) AND $pageid == 2) { ?>class="current"<?php } ?>><i class="zmdi zmdi-cloud"></i> CONFIGURATIONS</li></a><?php } ?>
					<?php if($_SESSION['rank'] >= 7) { ?><a href="<?php echo $lien; ?>/administration/modifications_joueur"><li <?php if(isset($pageid) AND $pageid == 3) { ?>class="current"<?php } ?>><i class="zmdi zmdi-accounts"></i> MODIFIER UN JOUEUR</li></a><?php } ?>
					<?php if($_SESSION['rank'] >= 5) { ?><a href="<?php echo $lien; ?>/administration/creation_article"><li <?php if(isset($pageid) AND $pageid == 4) { ?>class="current"<?php } ?>><i class="zmdi zmdi-info"></i> CRÉER UN ARTICLE</li></a><?php } ?>
					<?php if($_SESSION['rank'] >= 7) { ?><a href="<?php echo $lien; ?>/administration/delete_article"><li <?php if(isset($pageid) AND $pageid == 5) { ?>class="current"<?php } ?>><i class="zmdi zmdi-info"></i> SUPPRIMER UN ARTICLE</li></a><?php } ?>
					<?php } ?>
				</ul>
			</div>
			<a href="<?php echo $lien; ?>/deconnexion"><div class="disconnect"><i class="zmdi zmdi-power"></i></div></a>
			<a href="<?php echo $lien; ?>/profil"><div class="enter"><i class="zmdi zmdi-home"></i> RETOUR</div></a>
		</div>