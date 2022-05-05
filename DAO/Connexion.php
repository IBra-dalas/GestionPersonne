<?php
$db='helpdesk';
$host='localhost';
$user='root';
$mdp="";
$con=mysql_connect($host,$user,$mdp) or die("erreur de connexion à mysql");
$database=mysql_select_db($db,$con) or die("erreur de connexion à la base $db");
?>
