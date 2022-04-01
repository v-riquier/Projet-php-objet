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
    <h1>Insertion d'astuces</h1>
    <?php
    if (isset($_POST["btnJeux"])) {
        $Req = $MaBase->query("INSERT INTO Astuce(IdJeux,IdUser,Astuce) VALUES ('" . $_POST["nbJeu"] . "','" . $_POST["nbId"] . "','" . $_POST["txtAstuce"] . "')");
        echo "Astuce ajoutée";
    ?>
        <p><a href="ajoutastuce2.php">Ajouter une autre astuce</a></p>
    <?php
    } else {
    ?>
        <h2>Formulaire </h2>
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
            Comptes : <select name="nbId" id="nbId" required>
                <option value=""> ---Choisir Comptes--- </option>
                <?php $reponse = $MaBase->query("SELECT * FROM User");
                while ($donnees = $reponse->fetch()) {
                ?>
                    <option value="<?php echo $donnees['IdUser']; ?>">
                        <?php echo $donnees['NomUser']; ?>
                    </option>
                <?php } ?>
            </select>
            Astuce : <input type="text" name="txtAstuce" id="txtAstuce" required>
            <input type="submit" name="btnJeux" value="Ajouter une astuce">
        </form>
    <?php
    }
    try {
        $Req = $MaBase->query("SELECT * FROM Jeux ORDER BY Titre");
    ?>
        <table>
            <tr>
                <th>Titre du Jeu</th>
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