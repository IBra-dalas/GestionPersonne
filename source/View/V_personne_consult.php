<h2>Liste des eleves de <?php echo $objDivision->getLibelle() ?></h2>
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
            </td>
    <?php
}
?>
</table>
