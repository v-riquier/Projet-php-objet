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
    <link rel='stylesheet' href='../CSS/fichier.css'>
</head>

<body>
    <h1>Suppression d'astuces</h1>
    <?php
    if (isset($_POST["btnSupp"])) {
        if (isset($_SESSION["NoUser"])) {
            $Req = $MaBase->query("DELETE FROM Commentaire WHERE IdComm = '" . $_POST["nbComm"] . "'");
            echo "Commentaire supprimé";
        } else echo "Vous n'êtes pas connecté";
    }
    ?>
    <form action="" method="post">
        Astuce : <select name="nbComm" id="nbComm" required>
            <option value=""> ---Choisir Astuce--- </option>
            <?php $reponse = $MaBase->query("SELECT Jeux.Titre,Commentaire.IdComm,Astuce.Astuce,Commentaire.Commentaire FROM Jeux,Astuce,Commentaire WHERE Astuce.IdJeux=Jeux.IdJeux AND Commentaire.IdAstuce = Astuce.IdAstuce ORDER BY Jeux.Titre");
            while ($donnees = $reponse->fetch()) {
            ?>
                <option value="<?php echo $donnees['IdComm']; ?>">
                    <?php echo $donnees["Titre"] . " : " . $donnees["Astuce"] . ":" . $donnees["Commentaire"]; ?>
                </option>
            <?php } ?>
        </select>
        Commentaire : <input type="text" name="txtComm" id="txtComm" required>
        <input type="submit" name="btnSupp" value="Suppression">
    </form>
    <p><a href="../index.php">Retour</a></p>
</body>

</html>