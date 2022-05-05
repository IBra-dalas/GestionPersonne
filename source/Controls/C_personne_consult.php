<?php

//Récupération du code transmis via la méthode GET (voir la vue du

$code_div = $_GET["code"];
//On instancie la division correspondante
$objDivision = DAO_Division::LoadOne($code_div);
//On appelle la méthode LoadAllByDivision qui prend en paramètre un

$colPersonne = DAO_Personne::LoadAllByDivision($objDivision);

include("View/V_personne_consult.php");
?>
