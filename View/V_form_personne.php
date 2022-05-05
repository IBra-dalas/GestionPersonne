
<form action="index.php" method="POST">
    <input type="hidden" name="action" value="<?php
if (isset($lapers)) {
    echo
    "update";
} else {
    echo "add";
}
?>" />
    <input type="hidden" name="confirm" value="true"/>
    <input type="hidden" name="id" value="<?php
if (isset($lapers))
    echo
    $lapers->getId()
    ?>"/>
    <label for="nom">nom :</label>
    <input type="text" name="nom" id="nom" value="<?php
if (isset($lapers))
    echo $lapers->getNom()
    ?>"/>
    <br/>
    <label for="prenom">pr&eacute;nom :</label>
    <input type="text" name="prenom" id="prenom" value="<?php
if (isset($lapers))
    echo $lapers->getPrenom()
   ?>"/>
    <br/>
    <label for="dte_naiss">date de naissance (yyyy-mm-dd):</label>
    <input type="text" name="dte_naiss" id="dte_naiss" value="<?php
       if
       (isset($lapers))
           echo $lapers->getDateNaissance()//->format("Y-m-d")
           ?>"/>
    <br/>
    <label for="division">Division :</label>




    <select name="division">
        <?php
        foreach ($lesDivisions as $ObjDivision) {
            ?>
            <option value="<?php echo $ObjDivision->getCode() ?>" <?php
                    if
                    ($divaselectionner == $ObjDivision->getCode())
                        echo "selected=\"selected\""
                ?>>
    <?php echo $ObjDivision->getLibelle() ?>
            </option>
    <?php
}
?>
    </select>
    <br/>
    <input type="reset" value="Annuler" />
    <input type="submit" value="Sauvegarder" />
</form>
