<script language="javascript">
    function annuler(){
        document.location.href='index.php?action=view&division=<?php echo $lapers->getDivision() ?>';
    }
</script>
<form name="leformulaire" action="index.php" method="POST">
    <h1>Confirmation</h1>
    Etes vous sur de vouloir supprimer la personne
<?php echo $lapers->ToString() ?>
    <br/>
    <input type="hidden" name="action" value="delete" />
    <input type="hidden" name="confirm" value="true"/>
    <input type="hidden" name="personne" value="<?php echo $lapers->getId() ;?>"/>
    <input type="submit" value="Oui" />
    <input type="button" name="cmd_non" value="Non" onclick="annuler()"/>
</form>
