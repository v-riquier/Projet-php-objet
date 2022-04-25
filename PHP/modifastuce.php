<?php
include "header.php";
echo "<h1>Modification d'astuces</h1>";
if (isset($_POST["btnAstuce"])) {
    if (isset($_SESSION["NoUser"])) {
        $Req = $MaBase->query("UPDATE Astuce SET Astuce = '" . $_POST["txtAstuce"] . "' WHERE IdAstuce = '" . $_POST["nbastuce"] . "'");
        echo "Astuce modifiée";
    } else echo "Vous n'êtes pas connecté";
    echo '<p><a href="modifastuce.php">Modifier une autre astuce</a></p>';
} else {
?>
    <form action="" method="post">
        Astuce : <select name="nbastuce" id="nbastuce" required>
            <option value="">---Choisir Astuce---</option>
            <?php $reponse = $MaBase->query("SELECT Jeux.Titre,Astuce.IdAstuce,Astuce.Astuce FROM Jeux,Astuce WHERE Astuce.IdJeux=Jeux.IdJeux ORDER BY Jeux.Titre;");
            while ($donnees = $reponse->fetch()) {
            ?>
                <option value="<?php echo $donnees['IdAstuce']; ?>">
                    <?php echo $donnees["Titre"] . " : " . $donnees['Astuce']; ?>
                </option>
            <?php } ?>
        </select>
        Modif : <input type="text" name="txtAstuce" id="txtAstuce" required>
        <input type="submit" name="btnAstuce" value="Modifier">
    </form>
<?php
}
include "footer.php";
?>