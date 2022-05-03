<?php
include "header.php";
echo "<h1>Insertion de jeux</h1>";
if (isset($_POST["btnJeux"])) {
    if (isset($_SESSION["NoUser"])) {
        $Req = $BDD->query("INSERT INTO Jeux(Titre) VALUES ('" . $_POST["nomJeu"] . "')");
        echo "Jeu ajouté";
    } else echo "Vous n'êtes pas connecté";
    echo '<p><a href="ajoutjeu.php">Ajouter un autre jeu</a></p>';
} else {
?>
    <form action="" method="post">
        <label for="nomJeu">Nom Jeu : </label>
        <input type="text" name="nomJeu" id="nomJeu" required>
        <input type="submit" name="btnJeux" value="Ajouter un jeu">
    </form>
<?php
}
include "footer.php";
?>