<?php

/*
 * Récupération des infos du formulaire
 */
var_dump($_REQUEST);
$id = $_POST["id"];
$nom = $_POST["nom"];
$prenom = $_POST["prenom"];
$dte_naiss = $_POST["dte_naiss"];
$division = $_POST["division"];
/*
 * Chargement des objets Date et Division
 */
$objDate = new DateTime($dte_naiss);
var_dump($objDate);

$newDivision = DAO_Division::LoadOne($division);
//echo $newDivision->ToString();
/*
 * Comme c'est une tentative de modification
 * il faut charger l'objet en question
 */
$objPersonne = DAO_Personne::LoadOne($id);
$objPersonne->setNom($nom);
$objPersonne->setPrenom($prenom);
$objPersonne->setDateNaissance($objDate);
$objPersonne->setDivision($newDivision);
var_dump($objPersonne);
DAO_Personne::Save($objPersonne);
//echo $objPersonne->ToString();
//header('Location: index.php?action=view&division='.$objPersonne->getDivision()->getCode());
?>
