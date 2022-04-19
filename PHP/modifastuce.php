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
    <h1>Modification d'astuces</h1>
    <?php
    if (isset($_POST["btnJeux"])) {
        if (isset($_SESSION["NoUser"])) {
            $Req = $MaBase->query("UPDATE Astuce SET Astuce = '" . $_POST["txtAstuce"] . "' WHERE IdAstuce = '" . $_POST["nbastuce"] . "'");
        } else echo "Vous n'êtes pas connecté";
        echo '<p><a href="modifastuce.php">Modifier une autre astuce</a></p>';
    } else {
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
    <?php
    }
    ?>
    <p><a href="../index.php">Retour</a></p>
</body>

</html>