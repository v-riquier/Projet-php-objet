<?php
include "header.php";
?>
<h1>Affichage de la base de donnée</h1>
<form action="" method="post">
    Jeux : <select name="nbJeu" id="nbJeu" required>
        <option value=""> ---Choisir Jeux--- </option>
        <?php $reponse = $MaBase->query("SELECT * FROM Jeux ORDER BY Titre");
        while ($donnees = $reponse->fetch()) {
        ?>
            <option value="<?php echo $donnees['IdJeux']; ?>">
                <?php echo $donnees['Titre']; ?>
            </option>
        <?php } ?>
    </select>
    <input type="submit" name="btnJeux" value="Chercher">
</form>
<?php
if (isset($_POST["btnJeux"])) {
    $reponse = $MaBase->query("SELECT * FROM Jeux WHERE IdJeux = '" . $_POST["nbJeu"] .  "'");
    $donnees = $reponse->fetch();
    echo "<span>Jeu selectionné : " . $donnees["Titre"] . "</span>";
    $Req1 = $MaBase->query("SELECT Astuce.IdAstuce,Astuce.Astuce FROM Astuce,User WHERE Astuce.IdUser = User.IdUser AND Astuce.IdJeux = '" . $_POST["nbJeu"] . "'");
    $compte = $MaBase->query("SELECT COUNT(*) FROM Astuce WHERE Astuce.IdJeux = '" . $_POST["nbJeu"] . "'");
    $qqch = $compte->fetch();
    if ($qqch["COUNT(*)"] > 0) {
        if ($qqch["COUNT(*)"] >= 2) echo "<span>Il y a " . $qqch["COUNT(*)"] . " astuces.</span>";
        else echo "<span>Il y a 1 astuce.</span>"
?>
        <table>
            <tr>
                <th><b>Astuce</b></th>
                <th><b>Commentaire</b></th>
            </tr>
            <?php
            while ($tab1 = $Req1->fetch()) {
                $Req2 = $MaBase->query("SELECT Commentaire FROM Commentaire WHERE Commentaire.IdAstuce = '" . $tab1["IdAstuce"] . "'");
                $compte = $MaBase->query("SELECT COUNT(*) FROM Commentaire WHERE Commentaire.IdAstuce = '" . $tab1["IdAstuce"] . "'");
                $qqch = $compte->fetch();
            ?>
                <tr>
                    <td rowspan="<?php echo $qqch["COUNT(*)"] ?>"><?php echo $tab1["Astuce"]; ?></td>
        <?php
                if ($qqch["COUNT(*)"] == 0) echo "<td><i>Pas de commentaires</i></td>";
                else try {
                    while ($tab2 = $Req2->fetch()) {
                        echo "<td>" . $tab2["Commentaire"] . "</td>";
                        if ($qqch["COUNT(*)"] > 1) echo "</tr><tr>";
                    }
                } catch (Exception $e) {
                    echo "<td><i>Pas de commentaires</i></td>";
                }
                echo "</tr>";
            }
            echo "</table>";
        } else echo "Il n'y a pas d'astuces";
    }
    include "footer.php";
        ?>