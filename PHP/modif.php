<?php
session_start();
try {
    $MaBase = new PDO('mysql:host=localhost;dbname=yes', 'root', 'root');
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
    if (isset($_POST["btnJeux"])) {
        $Req = $MaBase->query("UPDATE Astuce SET Astuce = '" . $_POST["txtAstuce"] . "' WHERE IdAstuce = '" . $_POST["nbastuce"] . "'");
    }
    ?>
    <?php
    try {
        $Req = $MaBase->query("SELECT Jeux.Titre,Astuce.IdAstuce,Astuce.Astuce,User.NomUser FROM Jeux,Astuce,User WHERE Jeux.IdJeux = Astuce.IdJeux AND Astuce.IdUser = User.IdUser ORDER BY Jeux.Titre");
    ?>
        <form action="" method="post">
            Astuce : <select name="nbastuce" id="nbastuce" required>
                <option valeur="">---Choisir Astuce---</option>
                <?php $reponse = $MaBase->query("SELECT * FROM Astuce");
                while ($donnees = $reponse->fetch()) {
                ?>
                    <option value="<?php echo $donnees['IdAstuce']; ?>">
                        <?php echo $donnees['Astuce']; ?>
                    </option>
                <?php } ?>
            </select>
            Modif : <input type="text" name="txtAstuce" id="txtAstuce" required>
            <input type="submit" name="btnJeux" value="Modifier une astuce">
        </form>
        <table>
            <tr>
                <th>Titre</th>
                <th>Astuce</th>
                <th>Utilisateur</th>
            </tr>
            <?php
            while ($tab = $Req->fetch()) {
            ?>
                <tr>
                    <td><?php echo $tab["Titre"]; ?></td>
                    <td><?php echo $tab["Astuce"]; ?></td>
                    <td><?php echo $tab["NomUser"]; ?></td>
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