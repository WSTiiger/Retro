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
				<?php if(!isset($_SESSION['id'])) { ?>
				<ul>
					<a href="<?php echo $lien; ?>/connexion"><li <?php if(isset($pageid) AND $pageid == 1) { ?>class="current"<?php } ?>><i class="zmdi zmdi-account"></i> SE CONNECTER</li></a>
					<a href="<?php echo $lien; ?>/inscription"><li <?php if(isset($pageid) AND $pageid == 2) { ?>class="current"<?php } ?>><i class="zmdi zmdi-account-add"></i> INSCRIPTION</li></a>
				</ul>
			</div>
				<?php } else { ?>
				<ul>
					<a href="<?php echo $lien; ?>/profil"><li <?php if(isset($pageid) AND $pageid == 3) { ?>class="current"<?php } ?>><i class="zmdi zmdi-account"></i> MON PROFIL</li></a>
					<a href="<?php echo $lien; ?>/articles"><li <?php if(isset($pageid) AND $pageid == 4) { ?>class="current"<?php } ?>><i class="zmdi zmdi-cloud"></i> ARTICLES</li></a>
					<a href="<?php echo $lien; ?>/equipe"><li <?php if(isset($pageid) AND $pageid == 5) { ?>class="current"<?php } ?>><i class="zmdi zmdi-accounts"></i> ÉQUIPE</li></a>
					<a href="<?php echo $lien; ?>/classement"><li <?php if(isset($pageid) AND $pageid == 6) { ?>class="current"<?php } ?>><i class="zmdi zmdi-info"></i> CLASSEMENT</li></a>
				</ul>
			</div>
			<?php if($_SESSION['rank'] >= 5) { ?><a href="<?php echo $lien; ?>/administration/index"><div class="disconnect"><i class="zmdi zmdi-home"></i></div></a><?php } ?>
			<a href="<?php echo $lien; ?>/deconnexion"><div class="disconnect"><i class="zmdi zmdi-power"></i></div></a>
			<a href="<?php echo $lien; ?>/client" target="_blank"><div class="enter">ENTRER DANS L'HÔTEL</div></a>
			<?php } ?>
		</div>