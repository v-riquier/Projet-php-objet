<?php
session_start();
try {
    $MaBase = new PDO('mysql:host=mysql-ogez-riquier.alwaysdata.net;dbname=ogez-riquier_astucesjeux', '257075_test', 'pokemonprovidence');
} catch (Exception $e) {
    header("Location: https://www.youtube.com/watch?v=dQw4w9WgXcQ");
    exit();
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercice BDD</title>
    <link rel="icon" type="image/png" sizes="16x16" href="../Image/icone.png">
    <link rel='stylesheet' href='../CSS/fichier.css'>
</head>

<body class="blur" background="../Image/1204408.jpg">
    <h1>Insertion de jeux</h1>
    <?php
    if (isset($_POST["btnJeux"])) {
                $Req = $MaBase->query("INSERT INTO Jeux(Titre) VALUES ('" . $_POST["nomJeu"] . "')");
                echo "Jeu ajouté";
    ?>
        <p><a href="ajoutjeu.php">Ajouter un autre jeu</a></p>
    <?php
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
            <?php
            while ($tab = $Req->fetch()) {
            ?>
                <tr>
                    <td><?php echo $tab["Titre"]; ?></td>
                </tr>
            <?php
            }
            ?>
        </table>
    <?php
    } catch (Exception $e) {
        echo "La base virale VPS n'a pas été mis à jour." . $e->getMessage();
    }
    ?>
    <p><a href="../index.php">Retour</a></p>
</body>

</html>