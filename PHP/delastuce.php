<?php
session_start();
try {
    $MaBase = new PDO('mysql:host=mysql-ogez-riquier.alwaysdata.net;dbname=ogez-riquier_astucesjeux', '257075_test', 'pokemonprovidence');
} catch (Exception $e) {
    echo $e;
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
    <h1>Suppression d'astuces</h1>
    <?php
    if (isset($_POST["supp"])) {
        if (isset($_SESSION["NoUser"])) {
            $Req = $MaBase->query("DELETE FROM Astuce WHERE IDAstuce = '" . $_POST["supp"] . "'");
            $Req = $MaBase->query("DELETE FROM Commentaire WHERE IDAstuce = '" . $_POST["supp"] . "'");
        } else echo "Vous n'êtes pas connecté";
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
        }
    } catch (Exception $e) {
        echo "La base virale VPS n'a pas été mis à jour." . $e->getMessage();
    }
    ?>
    <p><a href="../index.php">Retour</a></p>
</body>

</html>