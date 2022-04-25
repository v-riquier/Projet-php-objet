<?php
include "header.php";
echo "<h1>Insertion de jeux</h1>";
if (isset($_POST["btnJeux"])) {
    if (isset($_SESSION["NoUser"])) {
        $Req = $MaBase->query("INSERT INTO Jeux(Titre) VALUES ('" . $_POST["nomJeu"] . "')");
        echo "Jeu ajouté";
    } else echo "Vous n'êtes pas connecté";
    echo '<p><a href="ajoutjeu.php">Ajouter un autre jeu</a></p>';
} else {
?>
    <h2>Formulaire </h2>
    <form action="" method="post">
        Nom Jeu : <input type="text" name="nomJeu" id="nomJeu" required>
        <input type="submit" name="btnJeux" value="Ajouter un jeu">
    </form>
<?php
}
try {
    $Req = $MaBase->query("SELECT * FROM Jeux ORDER BY Titre");
?>
    <table>
        <tr>
            <th>Titre</th>
        </tr>
        <?php while ($tab = $Req->fetch()) { ?>
            <tr>
                <td><?php echo $tab["Titre"]; ?></td>
            </tr>
        <?php } ?>
    </table>
<?php
} catch (Exception $e) {
    echo "La base virale VPS n'a pas été mis à jour." . $e->getMessage();
}
include "footer.php";
?>