


<?php

class Personne {
    /*
      Déclaration des attributs de la classe
      php est faiblement typé donc pas besoin de
      déclarer le type ce qui nous posera de
      nombreux problèmes.
     */

    private $_strcode; //string
    private $_strlibelle; //String

    /*
      Constructeur de la classe
      on ne peut créer qu'un seul constructeur en php
      le =null rend le paramètre optionnel.
      La notion de signature de méthode correspond ici uniquement au nom de la
      méthode, ce qui n'est pas le cas du langage Java ou C#
     */

    //SELECT id, nom, prenom, date_naiss, ladivision
    public function Personne($id = null, $nom = null, $prenom = null, $date_naiss = null, $ladivision = null) {
        /*
          Pour accéder à un attribut ou a une méthode de la classe, on utilise l'instance
          en cours, c'est à dire $this. Le séparateur instance / Méthode ou propriété
          n'est pas le point mais une flèche vers la droite grâce aux caractères tiret ( -
          ) et superieur ( > ) ->
         */
        $this->_id = $id;
        $this->_nom = $nom;
        $this->_prenom = $prenom;
        $this->_date_naiss = $date_naiss;
        $this->_ladivision = $ladivision;
    }

//méthodes getteurs ou assesseurs
    public function getId() {
        return $this->_id;
    }

    public function getNom() {
        return $this->_nom;
    }

    public function getPrenom() {
        return $this->_prenom;
    }

    public function getDateNaissance() {
        
        return $this->_date_naiss;
    }

    public function getAge() {
        $datetime1 = new DateTime($this->_date_naiss);
        $datetime2 = new DateTime();
        $interval = $datetime1->diff($datetime2);
        $ageEnJours = $interval->format('%R%a days');
        return (int) ($ageEnJours / 365);
    }

    public function getDivision() {
        return $this->_ladivision;
    }

//méthodes setteurs ou mutatteurs (Les paramètres n'ont pas de type ce qui peut poser des problèmes)
    public function setCode($id) {
        $this->_id = $id;
    }

    public function setPrenom($prenom) {
        $this->_prenom = $prenom;
    }

    public function setNom($nom) {
        $this->_nom = $nom;
    }

    public function setDateNaissance($dateNaiss) {
        $this->_date_naiss = $dateNaiss;
    }

    public function setDivision($division) {
        $this->_ladivision = $division;
    }

    /*
     * autre méthodes Pour les tests
     */

    public function ToString() {
        $ch = $this->_nom . " " . $this->_prenom;
        return $ch;
    }

    public static function RemoveOne($objPersonne) {
        $id = $objPersonne->getId();
        $req = "DELETE";
        $req = $req . " FROM personne";
        $req = $req . " WHERE id=$id";
//echo $req. "<br/>";
        mysql_query($req);
    }

}
?>