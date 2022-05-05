<?php

/*
 * Récupération des infos du formulaire
 */
$nom = $_POST["nom"];
$prenom = $_POST["prenom"];
$dte_naiss = $_POST["dte_naiss"];
$division = $_POST["division"];
/*
 * Chargement des objets Date et Division
 * Il est important de noter que la classe DateTime est fournie avec php5
 */
$objDate = new DateTime($dte_naiss);
$objDivision = DAO_Division::LoadOne($division);
/*
 * Comme c'est une tentative d'insertion
 * il faut récupérer un identifiant par rapport aux enregistrement dans la base
 * C'est le rôle de la fonction static getNewId de la classe DAO_Personne
 */
$theid = DAO_Personne::getNewId();
$objPersonne = new Personne(DAO_Personne::getNewId(), $nom, $prenom, $objDate, $objDivision);
DAO_Personne::Save($objPersonne);
//echo $objPersonne->ToString();
header('Location: index.php?action=view&division='.$objPersonne->getDivision()->getCode());
?>
