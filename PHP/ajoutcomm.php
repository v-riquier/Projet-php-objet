<?php
include "header.php";
echo "<h1>Insertion de commentaires</h1>";
if (isset($_POST["btnJeux"])) {
    if (isset($_SESSION["NoUser"])) {
        $Req = $MaBase->query("INSERT INTO Commentaire(IdAstuce,IdUser,Commentaire) VALUES ('" . $_POST["nbAstuce"] . "','" . $_SESSION["NoUser"] . "','" . $_POST["txtComm"] . "')");
        echo "Commentaire ajouté";
    } else echo "Vous n'êtes pas connecté";
    echo '<p><a href="ajoutcomm.php">Ajouter un autre commentaire</a></p>';
} else {
?>
    <h2>Formulaire </h2>
    <form action="" method="post">
        Astuce : <select name="nbAstuce" id="nbAstuce" required>
            <option value=""> ---Choisir Astuce--- </option>
            <?php $reponse = $MaBase->query("SELECT Jeux.Titre,Astuce.IdAstuce,Astuce.Astuce FROM Jeux,Astuce WHERE Astuce.IdJeux=Jeux.IdJeux ORDER BY Jeux.Titre;");
            while ($donnees = $reponse->fetch()) {
            ?>
                <option value="<?php echo $donnees['IdAstuce']; ?>">
                    <?php echo $donnees["Titre"] . " : " . $donnees['Astuce']; ?>
                </option>
            <?php } ?>
        </select>
        Commentaire : <input type="text" name="txtComm" id="txtComm" required>
        <input type="submit" name="btnJeux" value="Ajouter un commentaire">
    </form>
<?php
}
include "footer.php";
?>