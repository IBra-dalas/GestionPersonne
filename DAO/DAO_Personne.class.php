<?php

/*
 * DAO_Division donne les différentes méthodes permettant la récupération et la
  sauvegarde des objets dans la base de données
 * Nous n’utiliserons que des méthodes statique
 */

class DAO_Personne {
    /*
     * Fonction chargée de retourner le prochain ID disponible quand la table n'est
      pas en autoInrement
     */

    public static function getNewId() {
        $req = "select MAX(id) as nb from personne";
//echo $req;
        $res = mysql_query($req);
        $ligne = mysql_fetch_array($res);
        $newid = $ligne["nb"] + 1;
        return $newid;
    }

    /*
     * fonction chargée de vérifier si un enregistrement existe déjà dans la base.
     * @param: strcode: chaîne correspondant à la clé primaire
     */

    public static function boolExiste($id) {
        $req = "select * from personne Where id='$id'";
        $res = mysql_query($req);
        if (mysql_num_rows($res) == 1) {
            return true;
        } else {
            return false;
        }
    }

    /*
     * fonction qui charge tous les enregistrements
     * Retourne un tableau associatif (getAll de la méthode Collection (décrite plus
      loin dans ce document)) que l'on peut manipuler avec un foreach
     */

    public static function LoadAll() {
        $col = new Collection();
        $req = "SELECT *";
        $req = $req . " FROM personne";
        echo $req . "<br/>";
// A supprimer après verification
        $jeu = mysql_query($req);
        while ($ligne = mysql_fetch_array($jeu)) {
            $mapersonne = new Division();
            $mapersonne->setCode($ligne["id"]);
            $mapersonne->setNom($ligne["nom"]);
            $mapersonne->setPrenom($ligne["prenom"]);
            $mapersonne->setDateNaiss($ligne["date_naiss"]);
            $mapersonne->setDivision($ligne["ladivision"]);
            $col->add($mapersonne);
        }
        return $col->getAll();
    }

    public static function LoadAllByDivision($objDivision) {
        $col = new Collection();
        $req = "SELECT *";
        $req = $req . " FROM personne";
        $req = $req . " where ladivision = '" . $objDivision->getCode() . "'";
        echo $req . "<br/>";
// A supprimer après verification

        $jeu = mysql_query($req) or die(mysql_error());
        while ($ligne = mysql_fetch_array($jeu)) {
            $mapersonne = new Personne();
            $mapersonne->setCode($ligne["id"]);
            $mapersonne->setNom($ligne["nom"]);
            $mapersonne->setPrenom($ligne["prenom"]);
            $mapersonne->setDateNaissance($ligne["date_naiss"]);
            $mapersonne->setDivision($ligne["ladivision"]);
            $col->add($mapersonne);
        }
        return $col->getAll();
    }

    public static function RemoveOne($objPersonne) {
        $id = $objPersonne->getId();
        $req = "DELETE";
        $req = $req . " FROM personne";
        $req = $req . " WHERE id=$id";
        mysql_query($req);
    }

    /*
     * fonction qui
     * La valeur de
     * Retourne une
     */

    public static function LoadOne($id) {
        $req = "SELECT *";
        $req = $req . " FROM personne";
        $req = $req . " WHERE id='$id'";
        
//echo $req. "<br/>";
        $mapersonne = new Personne();
        $jeu = mysql_query($req);
        $ligne = mysql_fetch_array($jeu);
        $mapersonne->setCode($ligne["id"]);
        $mapersonne->setNom($ligne["nom"]);
        $mapersonne->setPrenom($ligne["prenom"]);
        $mapersonne->setDateNaissance($ligne["date_naiss"]);
        $mapersonne->setDivision($ligne["ladivision"]);
        return $mapersonne;
        
    }

    /*
     * fonction qui sauvegarde une instance de division dans la base
     * Se charge de vérifier s'il faut faire un INSERT ou un UPDATE
     */

    public static function Save($objPersonne) {
        $id = $objPersonne->getid();
        $nom = $objPersonne->getNom();
        $prenom = $objPersonne->getPrenom();
        $dateNaiss = $objPersonne->getDateNaissance()->format('Y-m-d');
        
        $division = $objPersonne->getDivision();
        if (DAO_Personne::boolExiste($id)) {
            $req = "UPDATE personne SET";
            $req = $req . " ladivision='" . $division->getCode() . "'";
            $req = $req . ", nom='" . $nom . "'";
            $req = $req . ", prenom='" . $prenom . "'";
            $req = $req . ", date_naiss='" . $nom . "'";
            $req = $req . " WHERE id='" . $id . "'";
            var_dump($req);
            echo $req . "<br/>";
            $res = mysql_query($req);
        } else {
            $req = "INSERT INTO personne VALUES ('" . $id . "','" . $nom . "','" . $prenom . "','" . $dateNaiss . "','" . $division->getCode() . "')";
            echo $req . "<br/>";
            $res = mysql_query($req);
        }
    }

}

?>