<?php
try
{
    $hostname = "localhost"; // Hôte de ta base de donnée.
    $dbname = "haway"; //Nom de ta base de donnée.
    $user = "root"; // Nom d'utilisateur de ta base de donnée.
    $password = ""; // Le mot de passe de ta base de donnée.
    $bdd = new PDO('mysql:host='.$hostname.';dbname='.$dbname.';charset=utf8', ''.$user.'', ''.$password.'', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}

catch(Exception $e)
{
    die('Impossible de ce connecter à la base de donnée !'. $e->getMessage());
}
?>