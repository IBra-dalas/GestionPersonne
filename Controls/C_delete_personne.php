<?php

$id_personne = $_POST["personne"];
$lapers = DAO_Personne::LoadOne($id_personne);
//echo $lapers->ToString();
DAO_Personne::RemoveOne($lapers);
/*
 * Redirection sur la page d'accueil
 * en transmettant les informations nécessaires (action et division)
 * A noter, l'objet étant encore en mémoire il est possible d'y faire référence
 * même si l'enregistrement concerné dans la base a été supprimé.
 */
header('Location: index.php?action=view&division='.$lapers->getDivision());
?>
