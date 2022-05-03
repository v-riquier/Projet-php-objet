<?php
include "header.php";
echo "<h1>Modification de commentaire</h1>";
if (isset($_POST["btnComm"])) {
    if (isset($_SESSION["NoUser"])) {
        $Req = $BDD->query("UPDATE Commentaire SET Commentaire = '" . $_POST["txtComm"] . "' WHERE IdComm = '" . $_POST["nbComm"] . "'");
        echo "Commentaire modifié";
    } else echo "Vous n'êtes pas connecté";
    echo '<p><a href="modifcomm.php">Modifier un autre commentaire</a></p>';
} else {
?>
    <form action="" method="post">
        <label for="nbComm">Commentaire : </label>
        <select name="nbComm" id="nbComm" required>
            <option value="">---Choisir Commentaire---</option>
            <?php $reponse = $BDD->query("SELECT Jeux.Titre,Commentaire.IdComm,Astuce.Astuce,Commentaire.Commentaire FROM Jeux,Astuce,Commentaire WHERE Astuce.IdJeux=Jeux.IdJeux AND Commentaire.IdAstuce = Astuce.IdAstuce ORDER BY Jeux.Titre");
            while ($donnees = $reponse->fetch()) {
            ?>
                <option value="<?php echo $donnees['IdComm']; ?>">
                    <?php echo $donnees["Titre"] . " : " . $donnees["Astuce"] . " : " . $donnees["Commentaire"]; ?>
                </option>
            <?php } ?>
        </select>
        <label for="txtComm">Modif : </label>
        <input type="text" name="txtComm" id="txtComm" required>
        <input type="submit" name="btnComm" value="Modification">
    </form>
<?php
}
include "footer.php";
?>