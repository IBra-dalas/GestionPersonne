<h2>Les Divisions</h2>
<ul>
    <?php
    foreach ($mesdivisions as $ObjDivision) {
        ?>
        <li>
            <a href="index.php?action=personne_consult&code=<?php echo $ObjDivision->getCode() ?>">
                <?php echo $ObjDivision->getLibelle() ?> </a>
        </li>
        <?php
    }
    ?>

</ul>
