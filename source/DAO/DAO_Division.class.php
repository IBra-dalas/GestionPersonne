<?php


/*
 * DAO_Division donne les différentes méthodes permettant la récupération et la
  sauvegarde des objets dans la base de données
 * Nous n’utiliserons que des méthodes statique
 */

class DAO_Division {
    /*
     * fonction chargée de vérifier si un enregistrement existe déjà dans la base.
     * @param: strcode: chaîne correspondant à la clé primaire
     */

    public static function boolExiste($strcode) {
        $req = "select * from division Where code='$strcode'";
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
        $req = $req . " FROM division";
        echo $req . "<br/>";
// A supprimer après verification
        $jeu = mysql_query($req);
        while ($ligne = mysql_fetch_array($jeu)) {
            $madivision = new Division();
            $madivision->setCode($ligne["code"]);
            $madivision->setLibelle($ligne["libelle"]);
            $col->add($madivision);
        }
        return $col->getAll();
    }

    /*
     * fonction qui
     * La valeur de
     * Retourne une
     */

    public static function LoadOne($lecode) {
        $req = "SELECT *";
        $req = $req . " FROM division";
        $req = $req . " WHERE code='$lecode'";
//echo $req. "<br/>";
        $madivision = new Division();
        $jeu = mysql_query($req);
        $ligne = mysql_fetch_array($jeu);
        $madivision->setCode($ligne["code"]);
        $madivision->setLibelle($ligne["libelle"]);
        return $madivision;
    }

    /*
     * fonction qui sauvegarde une instance de division dans la base
     * Se charge de vérifier s'il faut faire un INSERT ou un UPDATE
     */

    public static function Save($objDivision) {
        $c = $objDivision->getCode();
        $l = $objDivision->getLibelle();
        if (DAO_Division::boolExiste($c)) {
            $req = "UPDATE division SET";
            $req = $req . " code='" . $c . "'";
            $req = $req . ", libelle='" . $l . "'";
            $req = $req . " WHERE code='" . $c . "'";
            echo $req . "<br/>";
            $res = mysql_query($req);
        } else {
            $req = "INSERT INTO division VALUES ('".$c."','".$l."')";
            echo $req . "<br/>";
            $res = mysql_query($req);
        }
    }

}

?>