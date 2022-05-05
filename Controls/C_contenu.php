<?php

/*
 * Récupération de la valeur du paramètre action transmis par la méthode
  GET (via l'URL donc)
 */
@$action = $_REQUEST["action"];
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

    case "delete":
        
        if (isset($_POST["confirm"])) {
            /*
             * Appel du contrôleur gérant la suppression
             */
            include("Controls/C_delete_personne.php");
        } else {
            /*
             * Affiche la vue nécessaire pour la confirmation
             */
            $id_personne = $_GET["personne"];
            $lapers = DAO_Personne::LoadOne($id_personne);
            include("View/V_confirm.php");
        }
        break;

    case "add":
        if (isset($_POST["confirm"])) {
            /*
             * Appel du contrôleur gérant l'insertion en fonction des données du
              formulaire
             */
            include("Controls/C_add_personne.php");
        } else {
            /*
             * Appel de la vue du formulaire pour l'insertion
             */
            $lesDivisions = DAO_Division::LoadAll(); //on charge les divisions pour la zone de liste
            $divaselectionner = $_GET["division"];
//on récupère la division qui devra être présélectionné dans la liste
            include("View/V_form_personne.php");
        }
        break;
    case "update":
        
        if (isset($_POST["confirm"])) {
            /*
             * Appel du contrôleur gérant la modification
             */
            include("Controls/C_update_personne.php");
        } else {
            /*
             * Affiche la vue nécessaire pour la confirmation
             */
            $id_personne = $_GET["personne"];
            $lapers = DAO_Personne::LoadOne($id_personne);
            $lesDivisions = DAO_Division::LoadAll();
            $divaselectionner = $lapers->getDivision(); //on récupère la division qui devra être présélectionné
            include("View/V_form_personne.php");
        }
        break;



    default:
// On inclura ici le fichier de Vue contenant la page
}
?>
