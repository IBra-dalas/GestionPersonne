<?php

/*
 * Test DAO
 * PS: Pour appeler une méthode statique, nous n'avons pas besoin d'instancier
  sa classe.
 * Il suffit d'utiliser le nom de la classe suivi de :: et de la méthode.
 */
//Utilisation de la méthode statique pour charger les divisions
$macollectionDeDivision = DAO_Division::LoadAll();
//Parcours de la collection (enfin le tableau) renvoyé par la méthode statique LoadAll()
foreach ($macollectionDeDivision as $ObjDivision) {
    echo "<br/>";
    echo $ObjDivision->ToString();
}
echo "<br/>";
//Test de la méthode LoadOne()
$unobjDiv = DAO_Division::LoadOne('IG1');
//Affichage de l'instance venant d'être chargé
echo $unobjDiv->ToString();
//Modification d'un de ces attribut
$unobjDiv->setLibelle('toto');
//Sauvegarde de l'instance via la méthode statique Save de la classe DAO_Division
DAO_Division::Save($unobjDiv);
echo "sauvegarde effectué";
?>
