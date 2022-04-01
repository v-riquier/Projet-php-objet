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
    <link rel='stylesheet' href='fichier.css'>
</head>

<body class="blur" background="../Image/1204408.jpg">
    <h1>Modification d'astuces</h1>
    <?php
    if (isset($_POST["btJeux"])) {
        $Req = $MaBase->query("UPDATE Astuce SET Astuce = '" . $_POST["txtAstuce"] . "' WHERE IdAstuce = '" . $_POST["btJeux"] . "'");
    }
        ?>
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
        try {
            if (isset($_POST["btnJeux"])) {
                $Req = $MaBase->query("SELECT Astuce.IdAstuce,Astuce.Astuce,User.NomUser FROM Astuce,User WHERE Astuce.IdUser = User.IdUser AND Astuce.IdJeux = '" . $_POST["nbJeu"] . "'");
        ?>
                <table>
                    <?php
                    while ($tab = $Req->fetch()) {
                    ?>
                        <tr>
                            <td><?php echo $tab["Astuce"]; ?></td>
                            <td><?php echo $tab["NomUser"]; ?></td>
                            <form action="" method="post">
                                <td>
                                    <input type="text" name="txtAstuce" id="txtAstuce" required>
                                    <button type="submit">Modifier</button>
                                    <input type="hidden" name="btJeux" value="<?php echo $tab['IdAstuce']; ?>">
                                </td>
                            </form>
                        </tr>
                    <?php
                    }
                    ?>
                </table>
        <?php
            }
        } catch (Exception $e) {
            echo "La base virale VPS n'a pas été mis à jour." . $e->getMessage();
        }
        ?>
        <p><a href="../index.php">Retour</a></p>
</body>

</html>