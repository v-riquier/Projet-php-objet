<?php
include "header.php";
echo "<h1>Insertion d'astuces</h1>";
if (isset($_POST["btnJeux"])) {
    if (isset($_SESSION["NoUser"])) {
        $Req = $BDD->query("INSERT INTO Astuce(IdJeux,IdUser,Astuce) VALUES ('" . $_POST["nbJeu"] . "','" . $_SESSION["NoUser"] . "','" . $_POST["txtAstuce"] . "')");
        echo "Astuce ajoutée";
    } else echo "Vous n'êtes pas connecté";
    echo '<p><a href="ajoutastuce.php">Ajouter une autre astuce</a></p>';
} else {
?>
    <form action="" method="post">
        <label for="nbJeu">Jeu : </label>
        <select name="nbJeu" id="nbJeu" required>
            <option value=""> ---Choisir Jeu--- </option>
            <?php $reponse = $BDD->query("SELECT * FROM Jeux ORDER BY Titre");
            while ($donnees = $reponse->fetch()) {
            ?>
                <option value="<?php echo $donnees['IdJeux']; ?>">
                    <?php echo $donnees['Titre']; ?>
                </option>
            <?php } ?>
        </select>
        <label for="txtAstuce">Astuce : </label>
        <input type="text" name="txtAstuce" id="txtAstuce" required>
        <input type="submit" name="btnJeux" value="Ajouter une astuce">
    </form>
<?php
}
include "footer.php";
?>