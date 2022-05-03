<?php
include "header.php";
echo "<h1>Suppression d'astuces</h1>";
if (isset($_POST["btnSupp"])) {
    if (isset($_SESSION["NoUser"])) {
        $Req = $BDD->query("DELETE FROM Astuce WHERE IdAstuce = '" . $_POST["nbAstuce"] . "'");
        $Req = $BDD->query("DELETE FROM Commentaire WHERE IdAstuce = '" . $_POST["nbAstuce"] . "'");
        echo "Astuce et commentaires liés supprimés";
    } else echo "Vous n'êtes pas connecté";
} else {
?>
    <form action="" method="post">
        <label for="nbAstuce">Astuce : </label>
        <select name="nbAstuce" id="nbAstuce" required>
            <option value=""> ---Choisir Astuce--- </option>
            <?php $reponse = $BDD->query("SELECT Jeux.Titre,Astuce.IdAstuce,Astuce.Astuce FROM Jeux,Astuce WHERE Astuce.IdJeux=Jeux.IdJeux ORDER BY Jeux.Titre;");
            while ($donnees = $reponse->fetch()) {
            ?>
                <option value="<?php echo $donnees['IdAstuce']; ?>">
                    <?php echo $donnees["Titre"] . " : " . $donnees['Astuce']; ?>
                </option>
            <?php } ?>
        </select>
        <input type="submit" name="btnSupp" value="Suppression">
    </form>
<?php
}
include "footer.php";
?>