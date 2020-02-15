<?php
session_start();
session_destroy();
session_start();
$_SESSION['deconnexion'] = "oui";
header('Location: /connexion.php');
exit();
?>