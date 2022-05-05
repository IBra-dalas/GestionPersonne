<?php
$db='mvc';
$host='127.0.0.1';
$user='root';
$mdp='toor';
$con=mysql_connect($host,$user,$mdp) or die("erreur de connexion à mysql");
$database=mysql_select_db($db,$con) or die("erreur de connexion à la base $db");
?>
