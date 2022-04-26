<?php
include "header.php";
echo "<h1>Suppression de Commentaire</h1>";
if (isset($_POST["btnSupp"])) {
    if (isset($_SESSION["NoUser"])) {
        $Req = $MaBase->query("DELETE FROM Commentaire WHERE IdComm = '" . $_POST["nbComm"] . "'");
        echo "Commentaire supprimé";
    } else echo "Vous n'êtes pas connecté";
} else {
?>
    <form action="" method="post">
        Commentaire : <select name="nbComm" id="nbComm" required>
            <option value=""> ---Choisir Commentaire--- </option>
            <?php $reponse = $MaBase->query("SELECT Jeux.Titre,Commentaire.IdComm,Astuce.Astuce,Commentaire.Commentaire FROM Jeux,Astuce,Commentaire WHERE Astuce.IdJeux=Jeux.IdJeux AND Commentaire.IdAstuce = Astuce.IdAstuce ORDER BY Jeux.Titre");
            while ($donnees = $reponse->fetch()) {
            ?>
                <option value="<?php echo $donnees['IdComm']; ?>">
                    <?php echo $donnees["Titre"] . " : " . $donnees["Astuce"] . ":" . $donnees["Commentaire"]; ?>
                </option>
            <?php } ?>
        </select>
        <input type="submit" name="btnSupp" value="Suppression">
    </form>
<?php
}
include "footer.php";
?>