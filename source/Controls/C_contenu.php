<?php

/*
 * Récupération de la valeur du paramètre action transmis par la méthode
  GET (via l'URL donc)
 */
@$action = $_GET["action"];
/*
 * Redirection en fonction de l'action choisie par l'utilisateur (ou il
  clique)
 */
switch ($action) {
    case "personne_consult":
        include("Controls/C_personne_consult.php");
        break;
    case "personne_add":
        include("Controls/C_personne_add.php");
        break;
// etc...
    default:
// On inclura ici le fichier de Vue contenant la page
}
?>
