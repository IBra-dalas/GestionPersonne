<?php

class Division {
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

    public function Division($strlecode = null, $strlelibelle = null) {
        /*
          Pour accéder à un attribut ou a une méthode de la classe, on utilise l'instance
          en cours, c'est à dire $this. Le séparateur instance / Méthode ou propriété
          n'est pas le point mais une flèche vers la droite grâce aux caractères tiret ( -
          ) et superieur ( > ) ->
         */
        $this->_strcode = $strlecode;
        $this->_strlibelle = $strlelibelle;
    }

//méthodes getteurs ou assesseurs
    public function getCode() {
        return $this->_strcode;
    }

    public function getLibelle() {
        return $this->_strlibelle;
    }

//méthodes setteurs ou mutatteurs (Les paramètres n'ont pas de type ce qui peut poser des problèmes)
    public function setCode($lecode){
    $this->_strcode = $lecode;
}

public function setLibelle($lelibelle) {
    $this->_strlibelle = $lelibelle;
}

/*
 * autre méthodes Pour les tests
 */

public function ToString() {
    $ch = $this->_strcode . " " . $this->_strlibelle;  
    return $ch;
}   

}

?>