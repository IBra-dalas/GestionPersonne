<?php
/*
* Chargement des paramètres de l'appli
*/
require_once("DAO/Connexion.php");
/*
* Chargement des classes utilitaires
*/
require_once("Utils/Collection.class.php");
/*
* Chargement des classes
*/
require_once("Classes/Division.class.php");
require_once("Classes/Personne.class.php");
/*
* Chargement des classes DAO
*/
require_once("DAO/DAO_Division.class.php");
require_once("DAO/DAO_Personne.class.php");
/*
* Execution des tests unitaires
*/
//include("TestUnitaires/test_Division.php");
//include("TestUnitaires/test_Personne.php");
/*
* Chargement du gabartit
*/
include("View/V_index.php");
/*
* fermeture de la connexion
*/
require_once("DAO/Disconnect.php");
?>
