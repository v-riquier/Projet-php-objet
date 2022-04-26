<?php
include "header.php";
echo "<h1>Modification de commentaire</h1>";
/*if (isset($_POST["btnComm"])) {
        if (isset($_SESSION["NoUser"])) {
            $Req = $MaBase->query("UPDATE Commentaire SET Commentaire = '" . $_POST["txtComm"] . "' WHERE IdAstuce = '" . $_POST["nbastuce"] . "'");
        } else echo "Vous n'êtes pas connecté";
        echo '<p><a href="modifastuce.php">Modifier un autre commentaire</a></p>';
    } else {*/
?>
<form action="" method="post">
    Commentaire : <select name="nbastuce" id="nbastuce" required>
        <option value="">---Choisir Commentaire---</option>
        <?php $reponse = $MaBase->query("SELECT Jeux.Titre,Astuce.IdAstuce,Astuce.Astuce FROM Jeux,Astuce WHERE Astuce.IdJeux=Jeux.IdJeux ORDER BY Jeux.Titre;");
        while ($donnees = $reponse->fetch()) {
        ?>
            <option value="<?php echo $donnees['IdAstuce']; ?>">
                <?php echo $donnees["Titre"] . " : " . $donnees['Astuce']; ?>
            </option>
        <?php } ?>
    </select>
    Modif : <input type="text" name="txtComm" id="txtComm" required>
    <input type="submit" name="btnComm" value="Modifier">
</form>
<span>Le bouton ne marche pas</span>
<?php
//}
include "footer.php";
?>