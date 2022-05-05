<h2>Liste des &eacute;l&egrave;ves de <?php echo $objDivision->getLibelle() ?></h2>
<table>
    <tr>
        <th>nom</th>
        <th>prenom</th>
        <th>age</th>
    </tr>
    <?php
    foreach ($colPersonne as $ObjPersonne) {
        ?>
        <tr>
            <td><?php echo $ObjPersonne->getNom() ?></td>
            <td><?php echo $ObjPersonne->getPrenom() ?></td>
            <td><?php echo $ObjPersonne->getAge() ?></td>
            <td><a href="index.php?action=update&personne=<?php echo
    $ObjPersonne->getId()
        ?>">Modifier</a></td>
            <td><a href="index.php?action=delete&personne=<?php echo
               $ObjPersonne->getId()
               ?>">Supprimer</a></td>

            </td>
            <?php
        }
        ?>
</table>
<h2>
<a href="index.php?action=add&division=<?php echo $objDivision->getCode() ?>">Ajouter un &eacute;l&egrave;ve</a>
</h2>
